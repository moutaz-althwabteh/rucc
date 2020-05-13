<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Consult_M','Con');
        $this->load->model('Model_M','Mod');
        $this->load->model('Book_M','book');
        $this->load->model('Setting_M','Set');
        $this->load->model('Advice_M','Adv');
		$this->load->model('Permission_M', 'permission');
		///$this->load->library("pagination");

    }
	public function index()
	{
		$start=$this->input->get("per_page");
		if($start<0) $start=0;
		$totalCount= 15 ;//$this->ArticleCategory_M->GetSearchCount($q);
		$rowsPerPage = 5;
		if($start>$totalCount)
			$start=(ceil($totalCount/$rowsPerPage)-1)*$rowsPerPage;
		$this->pagerSetting['base_url'] =base_url(). "Home/Show_templates";
		$this->pagerSetting['total_rows'] = $totalCount;
		$this->pagerSetting['per_page'] = $rowsPerPage;
		$this->pagerSetting['page_query_string'] = TRUE;
		$this->pagination->initialize($this->pagerSetting);
		$data["subview"]="site/Home";
        $data["All_Mod"] = $this->Mod->MODEL_SELECT(1,$start,$rowsPerPage);
        $data["All_Book"] = $this->book->book_Select(1 ,$start,$rowsPerPage);
		$data["All_Con"] = $this->Con->Con_Select(1)['records'];
		
		$data["All_Adv"] = $this->Adv->Advice_Select(1)['records'];
		// print_r($data["All_Adv"]);
		// die();
        $this->parser->parse('_Layout',$data);
		//$this->load->view('welcome_message');
	}
	public function form()
	{
        $data["subview"]="site/form";
		$data['js']="/js/site/Consult";
		$data['type']=$this->Set->GET_CODE_BY_PARENT("18978");
		
        $this->parser->parse('_Layout2',$data);
	}

    public function Consult()
    {
        $data["subview"] = "site/consult";
        $data["All_Con"] = $this->Con->Con_Select(1)['records'];;
        $this->parser->parse('_Layout', $data);
    }
    public function Details()
    {
        $data["subview"] = "site/consult-details";
        $data["All_Con"] = $this->Con->Con_Select(1);
        $this->parser->parse('_Layout', $data);
    }

    public function Details_by()
    {
        $data["subview"] = "site/details-by";
        $data["All_Con_By"] = $this->Con->Con_Select_BY(2);
        $this->parser->parse('_Layout', $data);
    }

    public function Show_templates()
    {

		$start= $this->input->get("per_page");
		if($start<0) $start=0;
		$totalCount= $this->Mod->MODEL_COUNT('COUNT_MODEL'); 
		$rowsPerPage = 5;
		if($start>$totalCount['COUNT_MODEL'])
			$start=(ceil($totalCount/$rowsPerPage)-1)*$rowsPerPage;
		$this->pagerSetting['base_url'] =base_url(). "Home/Show_templates";
		$this->pagerSetting['total_rows'] = $totalCount['COUNT_MODEL'];
		$this->pagerSetting['per_page'] = $rowsPerPage;
		$this->pagerSetting['page_query_string'] = TRUE;
		$this->pagination->initialize($this->pagerSetting);
        $data["All_Mod"] = $this->Mod->MODEL_SELECT(1,$start,$rowsPerPage);
        $data["subview"] = "site/Show_templates";
        $this->parser->parse('_Layout', $data);
    }

    public function Book()
    {
		$start=$this->input->get("per_page");
		if($start<0) $start=0;
		$totalCount= $this->Con->CONSULT_COUNT();
		$rowsPerPage = 5;
		if($start>$totalCount)
			$start=(ceil($totalCount/$rowsPerPage)-1)*$rowsPerPage;
		$this->pagerSetting['base_url'] =base_url(). "Home/Book";
		$this->pagerSetting['total_rows'] = $totalCount;
		$this->pagerSetting['per_page'] = $rowsPerPage;
		$this->pagerSetting['page_query_string'] = TRUE;
		$this->pagination->initialize($this->pagerSetting);
        $data["subview"] = "site/books";
        $data["All_Book"] = $this->book->book_Select(1,$start,$rowsPerPage);
        $this->parser->parse('_Layout', $data);
    }

}
