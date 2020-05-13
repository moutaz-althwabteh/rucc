<?php
class Elist_M extends CI_Model
{

    public function Send_Email( $P_TO_  , $P_USER_ID)
    {
        $params = array(
            array('name' => ':P_TO_', 'value' => $P_TO_, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('EMAIL_PKG', 'SEND_EMAIL', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }


    public function List_Select($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('EMAIL_PKG', 'LIST_SELECT', $params);
        return $x;
    }

    public function List_Delete($P_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('EMAIL_PKG', 'LIST_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }
}

?>