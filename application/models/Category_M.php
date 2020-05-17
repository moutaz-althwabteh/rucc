<?php
class Category_M extends CI_Model
{

    public function CATEGORY_SAVE($P_CAT_SEQ, $P_CAT_NAME, $P_CAT_DESC, $P_PARENT, $P_USER_ID)
    {
        $params = array(
            array('name' => ':P_CAT_SEQ', 'value' => $P_CAT_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_CAT_NAME', 'value' => $P_CAT_NAME, 'type' => '', 'length' => 100),
            array('name' => ':P_CAT_DESC', 'value' => $P_CAT_DESC, 'type' => '', 'length' => 100),
            array('name' => ':P_PARENT', 'value' => $P_PARENT, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('CATEGORIES_PKG', 'CATEGORIES_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function CATEGORY_SELECT($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('CATEGORIES_PKG', 'CATEGORIES_SELECT', $params);
        return $x;
    }

    public function CATEGORY_DELETE($P_CAT_SEQ ,$P_USER_ID)
    {

        $params = array(
            array('name' => ':P_CAT_SEQ', 'value' => $P_CAT_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_ID', 'value' => $P_USER_ID, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );

        $x = $this->dbconn->excuteProcedures('CATEGORIES_PKG', 'CATEGORIES_DELETE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function CATEGORY_ACTIVE($P_CAT_SEQ ,$P_USER_ID ){

        $params = array(
            array('name' => ':P_CAT_SEQ', 'value'=>$P_CAT_SEQ, 'type'=>'','length' => -1),
            array('name' => ':P_USER_ID', 'value'=>$P_USER_ID, 'type'=>'','length' => 100),
            array('name' => ':p_msg', 'value'=>'message', 'type'=>'','length' => 100),
            array('name' => ':p_status', 'value'=>'status', 'type'=>'','length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('CATEGORIES_PKG', 'CATEGORIES_ACTIVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function categories_by_parent($p_parent)
    {
        $params = array(
            array('name' => ':p_parent', 'value' => $p_parent, 'type' => '', 'length' => 100),
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),

        );
        $x = $this->dbconn->excuteProcedures('CATEGORIES_PKG', 'CATEGORIES_BY_PARENT', $params);
        return $x['records'];
    }


}

?>