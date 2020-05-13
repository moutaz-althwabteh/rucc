<?php
class CatBook_M extends CI_Model
{

    public function CAT_SAVE($P_SEQ, $P_BOOK_CAT, $P_USER_ID)
    {
        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_BOOK_CAT', 'value' => $P_BOOK_CAT, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('CAT_BOOK_PKG', 'CATBOOK_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function CAT_SELECT()
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),

        );
        $x = $this->dbconn->excuteProcedures('CAT_BOOK_PKG', 'CATBOOK_SELECT', $params);
        return $x;
    }

    public function CAT_DELETE($P_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('CAT_BOOK_PKG', 'CATBOOK_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function CAT_ACTIVE($P_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_SEQ', 'value'=>$P_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CAT_BOOK_PKG', 'CATBOOK_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }


}

?>
