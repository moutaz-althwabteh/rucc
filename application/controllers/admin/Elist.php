<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class Elist extends AdminBase
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Elist_M', 'list');
        $this->load->model('Setting_M', 'Set');
		$this->load->model('Permission_M', 'permission');
		$this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.mailtrap.io';
        $config['smtp_user'] = '11ab9071934ea5';
        $config['smtp_pass'] = '2842e1654444b0';
        $config['smtp_port'] = 2525;
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

    }

    /*  public function index()
      {
          $data["subview"]="admin/Advice";
          $data["js"] = "js/Advice";
          $this->parser->parse('admin/_layout',$data);
      }*/

    public function load_list()
    {
        $data = $this->list->List_Select(1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function send1()
    {
        if ($this->input->is_ajax_request()) {
            $y = $this->list->Send_Email(
                $this->input->post('TO_'),
                1
            );
            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function send_mail()
    {
        $from_email = " rucc-2efc52@inbox.mailtrap.io";
        $to_email = 'rita.hassan1993@gmail.com' ;//$this->input->post('TO_');
        //Load email library
        $this->load->library('email');
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if ($this->email->send())
            echo "send mail";
//            $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
        else
            echo "Error";
           // $this->session->set_flashdata("email_sent", "You have encountered an error");
       //redirect('Home/index');


    }
}
?>
