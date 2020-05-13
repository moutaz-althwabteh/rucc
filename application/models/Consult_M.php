<?php
class Consult_M extends CI_Model
{

    public function Con_Save($P_CON_SEQ, $P_CON_NAME,$P_CON_TYPE,$P_SUB_TYPE , $P_CON_DESC , $P_PRIVACY
        , $P_ATTCHMENT , $P_USER_ID)
    {
        $params = array(
            array('name' => ':P_CON_SEQ', 'value' => $P_CON_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_CON_NAME', 'value' => $P_CON_NAME, 'type' => '', 'length' => 100),
            array('name' => ':P_CON_TYPE', 'value' => $P_CON_TYPE, 'type' => '', 'length' => 100),
            array('name' => ':P_SUB_TYPE', 'value' => $P_SUB_TYPE, 'type' => '', 'length' => 100),
            array('name' => ':P_CON_DESC', 'value' => $P_CON_DESC, 'type' => '', 'length' => 100),
            array('name' => ':P_PRIVACY', 'value' => $P_PRIVACY, 'type' => '', 'length' => 100),
            array('name' => ':P_ATTCHMENT', 'value' => $P_ATTCHMENT, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Con_Select($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_SELECT', $params);
        return $x;
    }

    public function Con_Select_BY($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_SELECT_BY', $params);
        return $x['records'];
    }

    public function Con_Delete($P_CON_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_CON_SEQ', 'value' => $P_CON_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Con_Active($P_CON_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_CON_SEQ', 'value'=>$P_CON_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Con_Reply($P_CON_SEQ ,$P_REPLY ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_CON_SEQ', 'value'=>$P_CON_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_REPLY', 'value'=>$P_REPLY, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_REPLY', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function GET_CON($P_CON_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':P_CON_SEQ', 'value'=>$P_CON_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'GET_CON', $params);
        return $x["records"];
    }

	public function CONSULT_COUNT(){

		$params = array(
			array('name' => ':P_COUNT_CON', 'value'=>'COUNT_CON', 'type'=>'','length' => 100),
		);
		$x = $this->dbconn->excuteProcedures('CONSULT_PKG', 'CONSULT_COUNT', $params);
		$result = array();
		$result["COUNT_CON"] = $x["COUNT_CON"];
		return $result;
	}

}

?>
