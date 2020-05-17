<?php
class Contact_M extends CI_Model
{

    public function Contact_Save($P_CONTACT_ID,$P_USER_ID, $P_USERNAME,$P_EMAIL , $P_PHONE , $P_MSG_TEXT , $P_ADD_BY)
    {
        $params = array(
            array('name' => ':P_CONTACT_ID', 'value' => $P_CONTACT_ID, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':P_USERNAME', 'value' => $P_USERNAME, 'type' => '', 'length' => 100),
            array('name' => ':P_EMAIL', 'value' => $P_EMAIL, 'type' => '', 'length' => 100),
            array('name' => ':P_PHONE', 'value' => $P_PHONE, 'type' => '', 'length' => 100),
			array('name' => ':P_MSG_TEXT', 'value' => $P_MSG_TEXT, 'type' => '', 'length' => 500),
			array('name' => ':P_ADD_BY', 'value' => $P_ADD_BY, 'type' => '', 'length' => 500),
			array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CONTACT_BKG', 'CONTACT_INSERT', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Contact_Select()
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
        );
        $x = $this->dbconn->excuteProcedures('CONTACT_BKG', 'CONT_SELECT', $params);
        return $x;
    }

    public function CONT_DELETE($P_CONTACT_ID)
    {

        $params = array(
            array('name' => ':P_CONTACT_ID', 'value' => $P_CONTACT_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('CONTACT_BKG', 'CONT_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function GET_ONE($P_ID)
    {
        $params = array(
            array('name' => ':P_ID', 'value' => $P_ID, 'type' => '', 'length' => -1),
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
        );
        $x = $this->dbconn->excuteProcedures('CONTACT_BKG', 'GET_ONE', $params);
        return $x['records'];
    }
}

?>
