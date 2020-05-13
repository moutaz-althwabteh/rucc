<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("AdminBase.php");
class Notificaition extends AdminBase {

    function __construct() {
        parent::__construct();
        $this->load->model('Notification_M','notify');

    }

    public function index()
    {
        $data["subview"] = "admin/NotifyAdmin";
        $data["PageTitle"] = "عرض الإشعارات";
        $data["js"] = "js/Notify";
        $this->parser->parse('admin/_layout', $data);
    }
    public function Save_Notify()
    {
        if ($this->input->is_ajax_request()) {
                $x = $this->notify->NOTIFY_SAVE(
                   // $this->input->post('ID')
                     $this->input->post('USER_FROM')
                    , $this->input->post('USER_TO')
                    , $this->input->post('NOTF_TYPE')
                    , $this->input->post('DECSRIPTION')
                    , $this->input->post('URL')
					, $this->input->post('NAV_SEQ')
					, $this->input->post('NOTITY_TYPE')
					, $this->input->post('PK_FK')
					, $this->input->post('USER_TYPE')

                );
                header('Content-Type: application/json');
                echo json_encode($x);

        }
    }

    public function load_notify(){
        $data = $this->notify->NOTIFY_SELECT(0
        );

        header('Content-Type: application/json');
        echo json_encode($data);
    }


    public function NOTIFY_ISREAD()
    {
        if ($this->input->is_ajax_request()) {
                $x = $this->notify->NOTIFY_ISREAD(
                    $this->input->post('SEQ')
                );
                header('Content-Type: application/json');
                echo json_encode($x);
        }
    }

    public function NOTIFY_COUNT()
    {
        $x = $this->notify->NOTIFY_COUNT(1);
          header('Content-Type: application/json');
          echo json_encode($x);
    }
}
?>
