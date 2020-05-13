<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class User extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('User_M','user');
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');


    }
    public function index()
    {
        $data["subview"]="admin/User";
        $data ['type'] = $this->user->User_Type();
        $data["js"] = "js/User";
        $this->parser->parse('admin/_layout',$data);
    }

    public function load_User()
    {
        $data = $this->user->User_Select(1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Save()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->user->User_Save(
                $this->input->post('SEQ'),
                $this->input->post('ID_NUM'),
                $this->input->post('FULL_NAME'),
                $this->input->post('EMAIL'),
                $this->input->post('MOBILE'),
                1 ,
                $this->input->post('TYPE_USER')
            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function Delete_User()
    {
        $data = $this->user->User_Delete($this->input->post('SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function change()
    {
        $data = $this->user->CHANGE_TYPE($this->input->post('SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Active_User()
    {
        $data = $this->user->User_Active($this->input->post('SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

   

}
?>
