<?php
class Advice_M extends CI_Model
{

    public function Advice_Save($P_ADV_SEQ, $P_TITLE,$P_DESCRIPTION  , $P_USER_ID , $P_IMAGE_ADV)
    {
        
        $params = array(
            array('name' => ':P_ADV_SEQ', 'value' => $P_ADV_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_TITLE', 'value' => $P_TITLE, 'type' => '', 'length' => 500),
            array('name' => ':P_DESCRIPTION', 'value' => $P_DESCRIPTION, 'type' => '', 'length' => 2000),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
			array('name' => ':P_IMAGE_ADV', 'value' => $P_IMAGE_ADV, 'type' => '', 'length' => 500),
			array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('ADVICE_PKG', 'ADVICE_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Advice_Select($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('ADVICE_PKG', 'ADVICE_SELECT', $params);
        return $x;
    }

    public function Advice_Delete($P_ADV_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_ADV_SEQ', 'value' => $P_ADV_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('ADVICE_PKG', 'ADVICE_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Advice_Active($P_ADV_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_ADV_SEQ', 'value'=>$P_ADV_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('ADVICE_PKG', 'ADVICE_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }


}

?>
