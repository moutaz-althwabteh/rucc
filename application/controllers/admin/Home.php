<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once ("AdminBase.php");

class Home extends AdminBase {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Consult_M','Con');
		$this->load->model('Setting_M','Set');
		$this->load->model('Permission_M', 'permission');

	}
	public function index()
	{
        $data["subview"]="admin/Home";

        $this->parser->parse('admin/_layout',$data);
		//$this->load->view('welcome_message');
	}
}
