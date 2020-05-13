<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class CatBook extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('CatBook_M','CatB');
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');

    }
    public function index()
    {
        $data["subview"]="admin/CatBook";
        $data["js"] = "js/Book";
        $this->parser->parse('admin/_layout',$data);
    }
    public function load_CatBook()
    {
        $data = $this->CatB->CAT_SELECT();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function Save()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->CatB->CAT_SAVE(
                $this->input->post('SEQ'),
                $this->input->post('BOOK_CAT'),
                1
            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }
    public function Delete_Cat()
    {
        $data = $this->CatB->CAT_DELETE($this->input->post('SEQ'),1
);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Active_Cat()
    {
        $data = $this->CatB->CAT_ACTIVE($this->input->post('SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>
