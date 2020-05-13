<?php
class Notification_M extends CI_Model
{
    public function NOTIFY_SAVE($P_USER_FROM, $P_USER_TO,$P_NOTF_TYPE, $P_DECSRIPTION, $P_URL, $P_NAV_SEQ,$P_NOTIFY_TYPE,$P_PK_FK , $P_USER_TYPE )
    {
        $params = array(
         //   array('name' => ':P_ID', 'value' => $P_ID, 'type' => '', 'length' => -1),
            array('name' => ':P_USER_FROM', 'value' => $P_USER_FROM, 'type' => '', 'length' => 100),
            array('name' => ':P_USER_TO', 'value' => $P_USER_TO, 'type' => '', 'length' => 100),
            array('name' => ':P_NOTF_TYPE', 'value' => $P_NOTF_TYPE, 'type' => '', 'length' => 100),
            array('name' => ':P_DECSRIPTION', 'value' => $P_DECSRIPTION, 'type' => '', 'length' => 100),
            array('name' => ':P_URL', 'value' => $P_URL , 'type' => '', 'length' => 100),
            array('name' => ':P_NAV_SEQ', 'value' => $P_NAV_SEQ, 'type' => '', 'length' => 100),
            array('name' => ':P_NOTIFY_TYPE', 'value' => $P_NOTIFY_TYPE , 'type' => '', 'length' => 100),
            array('name' => ':P_PK', 'value' => $P_PK_FK, 'type' => '', 'length' => 100),
			array('name' => ':P_USER_TO_TYPE', 'value' => $P_USER_TYPE , 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTIFY_SAVE', $params);
        /*$result = array();
        $result["message"] = $x["message"];
        $result["status"] = $x["status"];*/
        return $x;
    }

    public function NOTIFY_SELECT($P_ISREAD)
    {

        $params = array(
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
            array('name' => ':P_ISREAD', 'value' => $P_ISREAD, 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTIFY_SELECT', $params);
        return $x;
    }

    public function NOTIFY_ISREAD($P_SEQ)
    {
        $params = array(
            array('name' => ':P_ID', 'value' => $P_SEQ, 'type' => '', 'length' => -1),
            array('name' => ':p_msg', 'value' => 'message', 'type' => '', 'length' => 100),
            array('name' => ':p_status', 'value' => 'status', 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTIFY_ISREAD', $params);
        return $x;

    }
    public function NOTIFY_COUNT_ALL($P_TYPE)
    {
        $params = array(
            array('name' => ':COUNT_NUM', 'value' => 'COUNT_NUM', 'type' => '', 'length' => 100),
         //   array('name' => ':P_URL', 'value' => $P_URL, 'type' => '', 'length' => 100),
            array('name' => ':P_TYPE', 'value' => $P_TYPE, 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTIFY_COUNT_ALL', $params);
        $result = array();
        $result["COUNT_NUM"] = $x["COUNT_NUM"];
        return $result;
    }

    public function NOTIFY_COUNT($P_USER_TYPE)
    {
        $params = array(
            array('name' => ':P_USER_TYPE', 'value' => $P_USER_TYPE, 'type' => '', 'length' => 100),
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTIFY_COUNT', $params);
        return $x;
    }
    public function NOTFIY_USER_ALL($P_USER_TO)
    {
        $params = array(
            array('name' => ':P_USER_TO', 'value' => $P_USER_TO, 'type' => '', 'length' => 100),
            array('name' => ':P_CUR', 'value' => 'records', 'type' => 'cur', 'length' => -1),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTFIY_USER_ALL', $params);
        return $x['records'];
    }

    public function NOTFY_ISREAD_PK_FK($P_NAV_SEQ,$P_PK_FK)
    {
        $params = array(
            array('name' => ':P_NAV_SEQ', 'value' => $P_NAV_SEQ, 'type' => '', 'length' => 100),
            array('name' => ':P_PK_FK', 'value' => $P_PK_FK, 'type' => '', 'length' => 100),
        );
        $x = $this->dbconn->excuteProcedures('NOTIFICATION_PKG', 'NOTFY_ISREAD_PK_FK', $params);
        return $x['records'];
    }


}

?>
