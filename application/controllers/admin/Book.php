<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");
class Book extends AdminBase{


    function __construct() {
        parent::__construct();
        $this->load->model('Book_M','book');
        $this->load->model('Setting_M','Set');
		$this->load->model('CatBook_M','CatB');
		$this->load->model('Permission_M', 'permission');

	}
    public function index()
    {
        $data["subview"]="admin/Book";
        $data['CatB'] = $this->CatB->CAT_SELECT();
        $data["js"] = "js/book";
        $this->parser->parse('admin/_layout',$data);
    }


    public function load_Book()
    {
        $data = $this->book->Book_All(1);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Save()
    {
        if ($this->input->is_ajax_request()) {
            $random = $this->do_upload("ATTCHMENT");
            $randomImage = $this->do_upload("IMAGE");
           // print_r($randomImage);
//            return;
            $y = $this->book->book_Save(
                $this->input->post('BOOK_SEQ'),
                $this->input->post('BOOK_NAME'),
                $this->input->post('TYPE'),
                $this->input->post('DESCRIPTION'),
                $random,
                $randomImage,
                $this->input->post('AUTHOR'),
                1 ,
				$this->input->post('PRINT_TIME')
            );

            header('Content-Type: application/json');
            echo json_encode($y);
        }
    }

    public function Delete_Book()
    {
        $data = $this->book->book_Delete($this->input->post('BOOK_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function Active_Book()
    {
        $data = $this->book->book_Active($this->input->post('BOOK_SEQ'),1
        );
        header('Content-Type: application/json');
        echo json_encode($data);
    }



    public function do_upload($ATTCHMENT)
    {
        $randomName="";
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx|png|jpg|jpge|gif';
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
			$this->do_resize($uploadedFileData,150,150,"thumb");
			$this->do_resize($uploadedFileData,450,450,"medium");
			$this->do_resize($uploadedFileData,700,700,"large");
            return $randomName;
        }

    }
	protected function do_resize($uploadedFileData,$width,$height,$folerName)
	{
		$filename = $uploadedFileData["file_name"];
		$source_path = $uploadedFileData["file_path"] . $filename;
		$target_path = $uploadedFileData["file_path"] . "/$folerName/";
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'create_thumb' => TRUE,
			'thumb_marker' => '',
			'width' => $width,
			'height' => $height
		);
		$this->load->library('image_lib', $config_manip);
		$this->image_lib->clear();
		$this->image_lib->initialize($config_manip);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}


	/* public function image_upload($IMAGE)
	 {
		 $randomImage="";
		 $config['upload_path'] = './uploads/image/';
		 $config['allowed_types'] = 'png|jpg|jpge|gif';
		 $config['max_size']	= '8000';
		 $config['overwrite']	= TRUE;
		 $config['max_width']  = '4000';
		 $config['max_height']  = '5000';
		 $this->load->library('upload', $config);

		 if (!$this->upload->do_upload($IMAGE))//ان صار خطأ بالرفع
		 {
			 $this->upload->display_errors('<span>', '</span>');
		 }
		 else
		 {
			 //info about uploaded file (ext, name, path ,size and other)
			 $uploadedFileData=$this->upload->data();
 //            print_r($uploadedFileData);
			 //generate random image name

			 $randomImage=time().$uploadedFileData['file_ext'];
			 //rename uploaded image to our new image name
			 rename($uploadedFileData['full_path']
				 ,$uploadedFileData['file_path'].$randomImage);

			 $uploadedFileData["IMAGE"]=$randomImage;
			 return $randomImage;
		 }

	 }*/





}
?>
