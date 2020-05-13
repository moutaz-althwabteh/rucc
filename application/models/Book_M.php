<?php
class Book_M extends CI_Model
{

    public function Book_Save($P_BOOK_SEQ, $P_BOOK_NAME, $P_TYPE, $P_DESCRIPTION, $P_ATTCHMENT ,$P_IMAGE, $P_AUTHOR, $P_USER_ID ,$P_PRINT_TIME)
    {
//         echo $P_ATTCHMENT;
//        echo $P_IMAGE;

        $params = array(
            array('name' => ':P_BOOK_SEQ', 'value' => $P_BOOK_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_BOOK_NAME', 'value' => $P_BOOK_NAME, 'type' => '', 'length' => 100),
            array('name' => ':P_TYPE', 'value' => $P_TYPE, 'type' => '', 'length' => 100),
            array('name' => ':P_DESCRIPTION', 'value' => $P_DESCRIPTION, 'type' => '', 'length' => 100),
            array('name' => ':P_ATTCHMENT', 'value' => $P_ATTCHMENT, 'type' => '', 'length' => 100),
            array('name' => ':P_IMAGE', 'value' => $P_IMAGE, 'type' => '', 'length' => 500),
            array('name' => ':P_AUTHOR', 'value' => $P_AUTHOR, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':P_PRINT_TIME', 'value' => $P_PRINT_TIME, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('BOOKS_PKG', 'BOOK_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Book_Select($P_user_id ,$P_START,$P_ROWSPERPAGE)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),
			array('name' => ':P_START', 'value' => $P_START, 'type' => '', 'length' => 100),
			array('name' => ':P_ROWSPERPAGE', 'value' => $P_ROWSPERPAGE, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('BOOKS_PKG', 'BOOK_SELECT', $params);
        return $x;
    }


    public function Book_All($P_user_id )
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100)
        );
        $x = $this->dbconn->excuteProcedures('BOOKS_PKG', 'BOOK_ALL', $params);
        return $x;
    }

    public function Book_Delete($P_BOOK_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_BOOK_SEQ', 'value' => $P_BOOK_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('BOOKS_PKG', 'BOOK_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Book_Active($P_BOOK_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_BOOK_SEQ', 'value'=>$P_BOOK_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('BOOKS_PKG', 'BOOK_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }


}

?>
