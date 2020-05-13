<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
		$this->load->model('Permission_M', 'permission');
    }

    public function index()
    {
        $data["msg"] = "";
        if ($_POST) {
            if ($this->input->post("USER_ID") != null && $this->input->post("USER_ID") != "" && $this->input->post("password") == "123456") {
             echo "ff";

                $aa = $this->permission->login($this->input->post("USER_ID"));
                print_r(count($aa));
                if (count($aa) > 0) {
                    $userData["TYPE_USER"] = $aa['0']['TYPE_USER'];
                    $userData["ID_NUM"] = $aa['0']['ID_NUM'];
                    $userData["FULL_NAME"] = $aa['0']['FULL_NAME'];
                    $this->session->set_userdata($userData);
                    return redirect("Home");
                }
            } else {
                $data["msg"] = "عذراً اسم المستخدم خاطئ";
            }
        } else {
            $data["msg"] = "اسم المستخدم وكلمة المرور خاطئة";
        }
        $this->load->view("site/Login", $data);
    }
}

?>
