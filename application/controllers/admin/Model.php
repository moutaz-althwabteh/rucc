<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class Model extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('Model_M','Mod');
        $this->load->model('Category_M','Cat');
        $this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');


    }
    public function index()
    {
        $data["subview"]="admin/Model";
        $data["js"] = "js/model";
        $data['categories']=$this->Cat->categories_by_parent(42);
        $this->parser->parse('admin/_layout',$data);
    }
    public function load_Model()
    {

        $data = $this->Mod->MODEL_ALL(1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }


    public function Save()
    {

        if ($this->input->is_ajax_request()) {
            $random = $this->do_upload("ATTCHMENT");
            if ($random == -1) {
                $data["msg"] = "حدث خطأ في رفع الملف";
            }
            $y = $this->Mod->MODEL_SAVE(

                $this->input->post('MODEL_SEQ'),
                $this->input->post('MODEL_TITLE'),
                $this->input->post('CAT_SEQ'),
                $this->input->post('DESCRIPTION'),
                $random,
                1
            );

            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function Delete_MODEL()
    {
        $data = $this->Mod->MODEL_DELETE($this->input->post('MODEL_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Active_MODEL()
    {
        $data = $this->Mod->MODEL_ACTIVE($this->input->post('MODEL_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

//    public function do_upload()
//    {
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'pdf|doc|docx';
//        $config['max_size'] = 1000;
//        $config['max_width'] = 1300;
//        $config['max_height'] = 1024;
//        $this->load->library('upload', $config);
//
//        $randomName = basename($_FILES['file']['name']);
//        $fileName =time().$randomName;
//
//
//        if (!$this->upload->do_upload('ATTCHMENT')) {
//
//
//            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
//
//            $error = array('error' => $this->upload->display_errors());
//
//        } else {
//            $data = array('upload_data' => $this->upload->data());
//            $file_name = $this->upload->file_name;
//
//        }
//
//
//    }

    public function do_upload($ATTCHMENT)
    {
        $randomName="";
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx|gif|jpg|jpeg|png';
        $config['max_size']	= '8000';
        $config['overwrite']	= TRUE;
        $config['max_width']  = '4000';
        $config['max_height']  = '5000';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($ATTCHMENT))//ان صار خطأ بالرفع
        {
            $this->upload->display_errors('<span>', '</span>');
        }
        else
        {
            //info about uploaded file (ext, name, path ,size and other)
            $uploadedFileData=$this->upload->data();
            //print_r($uploadedFileData);
            //generate random image name

            $randomName=time().$uploadedFileData['file_ext'];
            //rename uploaded image to our new image name
            rename($uploadedFileData['full_path']
                ,$uploadedFileData['file_path'].$randomName);

            $uploadedFileData["ATTCHMENT"]=$randomName;
            return $randomName;
        }

    }


}
?>
