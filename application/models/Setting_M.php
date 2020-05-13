<?php
class Setting_M extends CI_Model
{

    public function Setting_Save($P_SEQ, $P_TITLE, $P_FB_URL , $P_INST_URL,$P_TWITTER_URL , $P_GOOGLE_URL , $P_EMAIL , $P_PHONE,
        $P_MOBILE, $P_ADDRESS)
    {
        $params = array(
            array('name' => ':P_SEQ', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':P_TITLE', 'value' => $P_TITLE, 'type' => '', 'length' => 100),
            array('name' => ':P_FB_URL', 'value' => $P_FB_URL, 'type' => '', 'length' => 100),
            array('name' => ':P_INST_URL', 'value' => $P_INST_URL, 'type' => '', 'length' => 100),
            array('name' => ':P_TWITTER_URL', 'value' => $P_TWITTER_URL, 'type' => '', 'length' => 100),
            array('name' => ':P_GOOGLE_URL', 'value' => $P_GOOGLE_URL, 'type' => '', 'length' => 100),
            array('name' => ':P_EMAIL', 'value' => $P_EMAIL, 'type' => '', 'length' => 500),
            array('name' => ':P_PHONE', 'value' => $P_PHONE, 'type' => '', 'length' => 100),
            array('name' => ':P_MOBILE', 'value' => $P_MOBILE, 'type' => '', 'length' => 100),
            array('name' => ':P_ADDRESS', 'value' => $P_ADDRESS, 'type' => '', 'length' => 100),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('SETTING_PKG', 'SETTINGS_SAVE', $params);
        $result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];
        return $result;
    }

    public function Setting_Select($P_user_id)
    {
        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':p_user_id', 'value' => $P_user_id, 'type' => '', 'length' => 100),

        );
        $x = $this->dbconn->excuteProcedures('SETTING_PKG', 'ITEMS_SETTING', $params);
        return $x;
    }

}

?>