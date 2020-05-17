<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");
class Category extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('Category_M','Cat');
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');

    }
    public function index()
    {
        $data["subview"]="admin/Category";
        $data["js"] = "js/category";
        $data['categories']=$this->Cat->categories_by_parent(0);
        $this->parser->parse('admin/_layout',$data);
    }
    public function load_Category()
    {
        $data = $this->Cat->CATEGORY_SELECT(1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }


    public function Save()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->Cat->CATEGORY_SAVE(
                $this->input->post('CAT_SEQ'),
                $this->input->post('CAT_NAME'),
                $this->input->post('CAT_DESC'),
                $this->input->post('PARENT'),
                1
            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function Delete_Category()
    {
        $data = $this->Cat->CATEGORY_DELETE($this->input->post('CAT_SEQ'),1
);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Active_Category()
    {
        $data = $this->Cat->CATEGORY_ACTIVE($this->input->post('CAT_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }


}
?>
