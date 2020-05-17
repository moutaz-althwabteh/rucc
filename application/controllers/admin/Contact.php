<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");
class Contact extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('Contact_M','cont');
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');


	}
    public function index()
    {
        $data["subview"]="admin/ContactAdmin";
		$data["js"] = "js/Contact";
		$this->parser->parse('admin/_layout',$data);
    }

    public function view()
    {
        $data["contact"]=$this->cont->GET_ONE( $this->uri->segment(3))[0];
        $data["subview"]="admin/Contact";
        // die();
        $this->parser->parse('admin/_layout',$data);
    }
	public function show_all()
	{
		$data["subview"]="admin/show";
		$data["js"] = "js/Contact"[0];
		$this->parser->parse('admin/_layout',$data);
	}


    public function Save()
    {
         die($this->input->post('CONTACT_ID'));
        if ($this->input->is_ajax_request()) {
            $y = $this->cont->Contact_Save(
                $this->input->post('CONTACT_ID'),
                $this->input->post('USER_ID'),
                $this->input->post('USERNAME'),
                $this->input->post('EMAIL'),
                $this->input->post('PHONE'),
                $this->input->post('MSG_TEXT')
                ,1
            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function CONT_DELETE()
    {
        $data = $this->cont->CONT_DELETE($this->input->post('CONTACT_ID'));
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Contact_Select()
    {
        $data = $this->cont->Contact_Select();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>
