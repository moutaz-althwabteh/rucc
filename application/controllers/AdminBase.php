<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//session_start();

class AdminBase extends CI_Controller
{
    var $add;
    var $edit;
    var  $delete;
    var  $active;
    var $cont;
    var $action;
    var $PermPage;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permission_M', 'permission');
        //$this->load->model('Notification_M','notify');
        $area = $this->uri->segment(1);
        $cont = $this->uri->segment(2);
        $action = $this->uri->segment(3);

        if (strtolower($action) == "index")
            $action = "";

        $type = $this->session->userdata("type");
//       $this->Get_Page_Perm( "$cont/index");
        if( $cont=="Login"){
            return redirect("site/LoginCheck");
        }
        if (isset($type)) {
            $hasPermission = $this->permission->HasAdminThisPermission(5,"$cont/$action");
            if(count($hasPermission['records'])>0) {
                foreach ($hasPermission as $hp)
                    $cntsub = count($hp);
                for ($x = 0; $x < $cntsub; $x++) {
                    if ($hp[0]['NUM'] == 0) {
                        $this->session->set_flashdata("msg", "e:غير مصرح لك بالدخول على الصفحة المطلوبة");
                        return redirect("Admin/Home1/index");
                    }
                }
            }

        } else if (strtolower($cont )!= "login") {
            return redirect("admin/login");
        }

    }

}
?>
