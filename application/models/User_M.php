<?php
class User_M extends CI_Model
{

    public function User_Save($P_SEQ,$P_ID_NUM, $P_FULL_NAME, $P_EMAIL, $P_MOBILE, $P_USER_ID , $P_TYPE_USER,$P_JOB)
    {
        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_ID_NUM', 'value' => $P_ID_NUM, 'type' => '', 'length' => -1),
            array('name' => ':P_FULL_NAME', 'value' => $P_FULL_NAME, 'type' => '', 'length' => 500),
            array('name' => ':P_EMAIL', 'value' => $P_EMAIL, 'type' => '', 'length' => 200),
            array('name' => ':P_MOBILE', 'value' => $P_MOBILE, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':P_TYPE_USER', 'value' => $P_TYPE_USER, 'type' => '', 'length' => 100),
            array('name' => ':P_JOB', 'value' => $P_JOB, 'type' => '', 'length' => 500),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('USER_PKG', 'USER_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function User_Select($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('USER_PKG', 'USER_SELECT', $params);
        return $x;
    }

    public function User_Type()
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1)
        );
        $x = $this->dbconn->excuteProcedures('USER_PKG', 'TYPE_USER', $params);
        return $x['records'];
    }

    public function User_Delete($P_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('USER_PKG', 'USER_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function CHANGE_TYPE($P_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('USER_PKG', 'CHANGE_TYPE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function User_Active($P_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('USER_PKG', 'USER_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }


}

?>
