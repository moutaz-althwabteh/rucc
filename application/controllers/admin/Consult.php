<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class Consult extends AdminBase
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Consult_M','Con');
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');
		$this->load->model('Notification_M', 'notify');

    }

    public function index()
    {
        $data["subview"] = "admin/Consult";
        $data["js"] = "js/Consult";
        $this->parser->parse('admin/_layout', $data);
    }

    public function Edit($ON_SEQ)
    {
        $data["subview"] = "admin/EditConsult";
        $data["GET_CON"] = $this->Con->GET_CON($ON_SEQ,1);
        $data["js"] = "js/Consult";
        $this->parser->parse('admin/_layout', $data);
    }

    public function Reply($ON_SEQ)
    {
        $data["subview"] = "admin/ReplyConsult";
        $data["GET_CON"] = $this->Con->GET_CON($ON_SEQ,1)['records'];
        $data["js"] = "js/Consult";
        $this->parser->parse('admin/_layout', $data);
    }

    public function load_Con()
    {
        $data = $this->Con->Con_Select(1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function GET_CON()
    {
        $data = $this->Con->GET_CON($this->input->post('CON_SEQ'),1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Save()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->Con->Con_Save(
                $this->input->post('CON_SEQ'),
                $this->input->post('CON_NAME'),
                $this->input->post('CON_TYPE'),
                $this->input->post('CON_DESC'),
                $this->input->post('PRIVACY'),
                "",
                1,
                $this->input->post('MOBILE'),
                $this->input->post('EMAIL')
            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }
    public function ReplySave()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->Con->Con_Reply(
                $this->input->post('CON_SEQ'),
                $this->input->post('REPLY'),
                1
            );

			if ($y["status"] > 0) {
				$z = $this->notify->NOTIFY_SAVE(
					1//$this->session->userdata("USER_ID")
					, 111
					, 2
					, "تم الرد على الاستشارة"
					, "admin/Reply/".$y['status']
					, 3
					, 22
					, $y['status']
					, 1
				);
			}

			header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 1000;
        $config['max_width'] = 1300;
        $config['max_height'] = 1024;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ATTCHMENT')) {
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $file_name = $this->upload->file_name;

        }
    }

    public function Con_Delete()
    {
        $data = $this->Con->Con_Delete($this->input->post('CON_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Con_Active()
    {
        $data = $this->Con->Con_Active($this->input->post('CON_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

}

?>
