<?php
class Permission_M extends CI_Model
{
    public function login( $P_USER_ID)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'CHECK_LOGIN', $params);
        return $x;
    }
	public function HasAdminThisPermission($P_USER_TYPE_SEQ ,$P_URL)
	{
		$params = array(
			array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
			array('name' => ':P_USER_TYPE_SEQ', 'value' => $P_USER_TYPE_SEQ, 'type' => '', 'length' => 100),
			array('name' => ':P_URL', 'value' => $P_URL, 'type' => '', 'length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'HasAdminThisPermission', $params);

		return $x;
	}

	public function DISPLAY_NAV($P_USER_TYPE_SEQ ,$P_PARENT)
	{
		$params = array(
			array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
			array('name' => ':P_USER_TYPE_SEQ', 'value' => $P_USER_TYPE_SEQ, 'type' => '', 'length' => 100),
			array('name' => ':P_PARENT', 'value' => $P_PARENT, 'type' => '', 'length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'DISPLAY_NAV', $params);

		return $x;
	}

	public function Get_All_Nav($P_PARENT_ID,$P_ADMIN)
	{
		$params = array(
			array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
			array('name' => ':P_PARENT_ID', 'value' => $P_PARENT_ID, 'type' => '', 'length' => 100),
			array('name' => ':P_ADMIN', 'value' => $P_ADMIN, 'type' => '', 'length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'GET_ALL_NAV', $params);

		return $x;
	}


	public function GET_SUB_NAV($P_PARENT_ID ,$P_ADMIN )
	{
		$params = array(
			array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
			array('name' => ':P_PARENT_ID', 'value' => $P_PARENT_ID, 'type' => '', 'length' => 100),
			array('name' => ':P_ADMIN', 'value' => $P_ADMIN, 'type' => '', 'length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'GET_SUB_NAV', $params);

		return $x;
	}

	public function Get_User_Type()
	{
		$params = array(
			array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),

		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'GET_USER_TYPE', $params);

		return $x;
	}

	public function GET_NAV_PARENT($P_URL)
	{
		$params = array(
			array('name' => ':P_URL', 'value' =>$P_URL, 'type' => '', 'length' => 100),
			array('name' => ':P_OUT_NUM', 'value' => 'P_OUT_NUM', 'type' => '', 'length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'GET_NAV_PARENT', $params);
		$result = array();
		$result["P_OUT_NUM"] = $x["P_OUT_NUM"];
		return $result;
	}

	public function GET_PERMISSION($P_USER_TYPE_SEQ)
	{
		$params = array(
			array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
			array('name' => ':P_USER_TYPE_SEQ', 'value' => $P_USER_TYPE_SEQ, 'type' => '', 'length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'GET_PERMISSION', $params);

		return $x;
	}

	public function User_Permission_Save($P_USER_TYPE_SEQ, $P_NAV_SEQ, $P_ADD_, $P_EDIT, $P_DELETE_,$P_ACTIVE_ )
	{
		$params = array(
			array('name' => ':P_USER_TYPE_SEQ', 'value' => $P_USER_TYPE_SEQ, 'type' => '', 'length' => -1),
			array('name' => ':P_NAV_SEQ', 'value' => $P_NAV_SEQ, 'type' => '', 'length' => 100),
			array('name' => ':P_ADD_', 'value' => $P_ADD_, 'type' => '', 'length' => 100),
			array('name' => ':P_EDIT', 'value' => $P_EDIT, 'type' => '', 'length' => 100),
			array('name' => ':P_DELETE_', 'value' => $P_DELETE_, 'type' => '', 'length' => 100),
			array('name' => ':P_ACTIVE_', 'value' => $P_ACTIVE_, 'type' => '', 'length' => 100),
			array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
			array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100)
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'USER_PERMISSION_SAVE', $params);
		$result = array();
		$result["message"] = $x["message"];
		$result["status"] = $x["status"];
		return $result;
	}
	public function User_Permission_Delete($P_USER_TYPE_SEQ )
	{
		$params = array(
			array('name' => ':P_USER_TYPE_SEQ', 'value' => $P_USER_TYPE_SEQ, 'type' => '', 'length' => -1),
		);
		$x = $this->dbconn->excuteProcedures('PERMISSION_PKG', 'USER_PERMISSION_DELETE', $params);

		return $x;
	}

}

?>
