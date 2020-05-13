<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Consult_M','Con');
        $this->load->model('Model_M','Mod');
        $this->load->model('Book_M','book');
        $this->load->model('Setting_M','Set');
        $this->load->model('Advice_M','Adv');
		$this->load->model('Permission_M', 'permission');
		///$this->load->library("pagination");

    }
    public function index(){

    }

    public function Consult()
    {
        $data["subview"] = "user/consult";
        $data["All_Con"] = $this->Con->Con_Select_BY(1);
        $this->parser->parse('_Layout3', $data);
    }
}