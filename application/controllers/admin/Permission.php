<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("AdminBase.php");

class Permission extends AdminBase
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Permission_M', 'permission');

	}

	public function index()
	{
		$data["subview"] = "admin/permission";
		$data["js"] = "js/Permission";
		$this->parser->parse('admin/_layout', $data);
	}

	public function Get_All_Nav($P_PERANT_ID, $P_ADMIN)
	{
		$data = $this->permission->Get_All_Nav($P_PERANT_ID, $P_ADMIN
		);
		//!= NULL ? 0 : 1;
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function Get_User_Type()
	{
		$data = $this->permission->Get_User_Type();

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function GET_PERMISSION()
	{
		$data = $this->permission->GET_PERMISSION($this->input->post('USER_TYPE_SEQ')
		);
		//!= NULL ? 0 : 1;
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function user_per_Save()
	{
		if ($this->input->is_ajax_request()) {
			$a [] = "";
			$Add1 [] = "";
			$Edit1 [] = "";
			$Delete1 [] = "";
			$Active1 [] = "";
			$i = 0;
			$y = $this->permission->User_Permission_Delete($this->input->post('USER_TYPE_SEQ'));

			$str = $this->input->post('NAV_SEQ');
			$str = rtrim($str, ",");
			$a = explode(",", $str);

			$add = $this->input->post('ADD_');
			$add = rtrim($add, ",");
			$Add1 = explode(",", $add);

			$edit = $this->input->post('EDIT');
			$edit = rtrim($edit, ",");
			$Edit1 = explode(",", $edit);

			$delete = $this->input->post('DELETE_');
			$delete = rtrim($delete, ",");
			$Delete1 = explode(",", $delete);

			$active = $this->input->post('ACTIVE_');
			$active = rtrim($active, ",");
			$Active1 = explode(",", $active);


			foreach ($a as $v => $r) {
				// for ($i=0 ; $i<5 ; $i++){
				$v[$Add1][$i];
				$v[$Edit1][$i];
				$v[$Delete1][$i];
				$v[$Active1][$i];
				$x = $this->permission->User_Permission_Save(
					$this->input->post('USER_TYPE_SEQ')
					, $r
					, $Add1[$i] != 1 ? 0 : 1
					// , $this->input->post('ADD_') != NULL ? 2 : 0
					, $Edit1[$i] != 1 ? 0 : 1
					, $Delete1[$i] != 1 ? 0 : 1
					, $Active1[$i] != 1 ? 0 : 1
				);
				$i++;
			}
		}
		header('Content-Type: application/json');
		echo json_encode($x);
	}


}

?>
