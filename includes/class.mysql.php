<?
/*
class.mysql.php
?                ??? MySQL
�                    ? ?
?                    webmaster@mocyc.com
*/
if (eregi("class.mysql.php", $_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}
class DB
{
    //??
    //var $host_th = "103.13.30.65" ;
    var $host_th = "localhost";
    //var $host_cn = "192.168.0.130" ;
    //// var $host_cn = "223.223.218.85" ;
    //var $host_cn = "192.168.0.222" ;
    var $database;
    var $connect_db;
    var $selectdb;
    var $db;
    var $sql;
    var $table;
    var $where;
    ////////////////////// ??? //////////////////////
    function connectdb($db_name = "database", $user = "username", $pwd = "password")
    {
        ////// loop 1
        $this->database = $db_name;
        $this->username = $user;
        $this->password = $pwd;
        $this->connect_db = mysql_connect($this->host_th, $this->username, $this->password) or $this->_error();
        //$this->connect_db = mysql_pconnect ( $this->host, $this->username, $this->password ) or $this->_error();
        $this->db = mysql_select_db($this->database, $this->connect_db) or $this->_error();
        mysql_query("SET NAMES UFT8");
        mysql_query("SET character_set_results=utf-8");
        return true;
        /////////////
    }
    /// utf8
    function connectdb_utf($db_name = "database", $user = "username", $pwd = "password")
    {
        ////// loop 1
        $this->database = $db_name;
        $this->username = $user;
        $this->password = $pwd;
        $this->connect_db = mysql_connect($this->host_th, $this->username, $this->password) or $this->_error();
        //$this->connect_db = mysql_pconnect ( $this->host, $this->username, $this->password ) or $this->_error();
        $this->db = mysql_select_db($this->database, $this->connect_db) or $this->_error();
        mysql_query("SET NAMES UTF8");
        mysql_query("SET character_set_results=utf-8");
        return true;
        /////////////
    }
    //??
    function connectdb_th($db_name = "database", $user = "username", $pwd = "password")
    {
        ////// loop 1
        $this->database = $db_name;
        $this->username = $user;
        $this->password = $pwd;
        $this->connect_db = mysql_connect($this->host_th, $this->username, $this->password) or $this->_error();
        //$this->connect_db = mysql_pconnect ( $this->host, $this->username, $this->password ) or $this->_error();
        $this->db = mysql_select_db($this->database, $this->connect_db) or $this->_error();
        mysql_query("SET NAMES UFT8");
        mysql_query("SET character_set_results=utf-8");
        return true;
        /////////////
    }
    function connectdb_cn($db_name = "database", $user = "username", $pwd = "password")
    {
        ////// loop 1
        $this->database = $db_name;
        $this->username = $user;
        $this->password = $pwd;
        $this->connect_db = mysql_connect($this->host_cn, $this->username, $this->password) or $this->_error();
        //$this->connect_db = mysql_pconnect ( $this->host, $this->username, $this->password ) or $this->_error();
        $this->db = mysql_select_db($this->database, $this->connect_db) or $this->_error();
        mysql_query("SET NAMES UFT8");
        mysql_query("SET character_set_results=utf-8");
        return true;
        /////////////
    }
    //???
    function closedb()
    {
        mysql_close($this->connect_db) or $this->_error();
    }
    //
    //$db->add_db("table",array("field"=>"value")); 
    function add_db($table = "table", $data = "data")
    {
        global $insert_last_id;
        $key     = array_keys($data);
        $value   = array_values($data);
        $sumdata = count($key);
        for ($i = 0; $i < $sumdata; $i++) {
            if (empty($add)) {
                $add = "(";
            } else {
                $add = $add . ",";
            }
            if (empty($val)) {
                $val = "(";
            } else {
                $val = $val . ",";
            }
            $add = $add . $key[$i];
            $val = $val . "'" . $value[$i] . "'";
        }
        $add = $add . ")";
        $val = $val . ")";
        $sql = "INSERT INTO " . $table . " " . $add . " VALUES " . $val;
        if (mysql_query($sql)) {
            $insert_last_id = mysql_insert_id();
            return true;
        } else {
            $this->_error();
            return false;
        }
    }
    //??� 
    //$db->update_db("tabel",array("field"=>"value"),"where"); 
    function update_db($table = "table", $data = "data", $where = "where")
    {
        ////// loop 1
        $key     = array_keys($data);
        $value   = array_values($data);
        $sumdata = count($key);
        $set     = "";
        for ($i = 0; $i < $sumdata; $i++) {
            if (!empty($set)) {
                $set = $set . ",";
            }
            $set = $set . $key[$i] . "='" . $value[$i] . "'";
        }
        $sql = "UPDATE " . $table . " SET " . $set . " WHERE " . $where;
        if (mysql_query($sql)) {
            return true;
        } else {
            $this->_error();
            return false;
        }
        ////// loop 2
        $db->connectdb_th(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $key     = array_keys($data);
        $value   = array_values($data);
        $sumdata = count($key);
        $set     = "";
        for ($i = 0; $i < $sumdata; $i++) {
            if (!empty($set)) {
                $set = $set . ",";
            }
            $set = $set . $key[$i] . "='" . $value[$i] . "'";
        }
        $sql = "UPDATE " . $table . " SET " . $set . " WHERE " . $where;
        if (mysql_query($sql)) {
            return true;
        } else {
            $this->_error();
            return false;
        }
    }
    //??
    //$db->update("table","set","where");
    function update($table = "table", $set = "set", $where = "where")
    {
        $sql = "UPDATE " . $table . " SET " . $set . " WHERE " . $where;
        if (mysql_query($sql)) {
            return true;
        } else {
            $this->_error();
            return false;
        }
    }
    //z
    //$db->del("table","where"); 
    function del($table = "table", $where = "where")
    {
        $sql = "DELETE FROM " . $table . " WHERE " . $where;
        if (mysql_query($sql)) {
            return true;
        } else {
            $this->_error();
            return false;
        }
    }
    //????
    //$db->num_rows("table","field","where"); 
    function num_rows($table = "table", $field = "field", $where = "where")
    {
        if ($where == "") {
            $where = "";
        } else {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT " . $field . " FROM " . $table . $where;
        if ($res = mysql_query($sql)) {
            return mysql_num_rows($res);
        } else {
            $this->_error();
            return false;
        }
    }
    //Query 
    //$res = $db->select_query('SELECT field FROM table WHERE where'); 
    function select_query($sql = "sql")
    {
        if ($res = mysql_query($sql)) {
            return $res;
        } else {
            $this->_error();
            return false;
        }
    }
    //????
    //$res = $db->select_query('SELECT field FROM table WHERE where'); 
    //$rows = $db->rows($res); 
    function rows($sql = "sql")
    {
        if ($res = mysql_num_rows($sql)) {
            return $res;
        } else {
            $this->_error();
            return false;
        }
    }
    //? array
    //$res = $db->select_query('SELECT field FROM table WHERE where'); 
    //while ($arr = $db->fetch($res)) { 
    //        echo $arr['a']." - ".$arr['c']."<br>\n"; 
    //}
    function fetch($sql = "sql")
    {
        if ($res = mysql_fetch_assoc($sql)) {
            return $res;
        } else {
            $this->_error();
            return false;
        }
    }
    //????
    function _error()
    {
        $this->error[] = mysql_errno();
    }
}
?>