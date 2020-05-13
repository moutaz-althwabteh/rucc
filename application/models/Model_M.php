<?php
class Model_M extends CI_Model
{

    public function MODEL_SAVE($P_MODEL_SEQ, $P_MODEL_TITLE, $P_CAT_SEQ, $P_DESCRIPTION,$P_ATTCHMENT ,$P_USER_ID)
    {
        $params = array(
            array('name' => ':P_MODEL_SEQ', 'value' => $P_MODEL_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_MODEL_TITLE', 'value' => $P_MODEL_TITLE, 'type' => '', 'length' => 100),
            array('name' => ':P_CAT_SEQ', 'value' => $P_CAT_SEQ, 'type' => '', 'length' => 100),
            array('name' => ':P_DESCRIPTION', 'value' => $P_DESCRIPTION, 'type' => '', 'length' => 100),
            array('name' => ':P_ATTCHMENT', 'value' => $P_ATTCHMENT, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('MODEL_PKG', 'MODEL_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function MODEL_SELECT($P_user_id ,$P_START,$P_ROWSPERPAGE)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),
           /// array('name' => ':P_NUM', 'value' => $P_NUM, 'type' => '', 'length' => 100),
            array('name' => ':P_START', 'value' => $P_START, 'type' => '', 'length' => 100),
            array('name' => ':P_ROWSPERPAGE', 'value' => $P_ROWSPERPAGE, 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('MODEL_PKG', 'MODEL_SELECT', $params);
        return $x;
    }

    public function MODEL_ALL($P_user_id )
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100)
        );
        $x = $this->dbconn->excuteProcedures('MODEL_PKG', 'MODEL_ALL', $params);
        return $x;
    }

    public function MODEL_DELETE($P_MODEL_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_MODEL_SEQ', 'value' => $P_MODEL_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('MODEL_PKG', 'MODEL_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function MODEL_ACTIVE($P_MODEL_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_MODEL_SEQ', 'value'=>$P_MODEL_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('MODEL_PKG', 'MODEL_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }
	public function MODEL_COUNT(){

		$params = array(
			array('name' => ':P_COUNT_MODEL', 'value'=>'COUNT_MODEL', 'type'=>'','length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('MODEL_PKG', 'MODEL_COUNT', $params);
		$result = array();
		$result["COUNT_MODEL"] = $x["COUNT_MODEL"];
		return $result;
	}

}

?>
