<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class Settings extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');

	}
    public function index()
    {
        $data["subview"]="admin/Settings";
        $data['setting'] = $this->Set->Setting_Select(1)[0];

        $this->parser->parse('admin/_layout',$data);
    }

    public function load_Setting()
    {
            $data = $this->Set->Setting_Select(1);
            header('Content-Type: application/json');
            echo json_encode($data);
    }

    public function Save()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->Set->Setting_Save(
                $this->input->post('SEQ'),
                $this->input->post('TITLE'),
                $this->input->post('FB_URL'),
                $this->input->post('INST_URL'),
                $this->input->post('TWITTER_URL'),
                $this->input->post('GOOGLE_URL'),
                $this->input->post('EMAIL'),
                $this->input->post('PHONE'),
                $this->input->post('MOBILE'),
                $this->input->post('ADDRESS')

            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }
}
?>
