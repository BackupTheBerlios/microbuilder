<?php
/**
 * Table Definition for MB_Users
 */
require_once 'DB/DataObject.php';

class DBO_MB_Users extends DB_DataObject 
{

    # -- SLOTS
    /** Perms policy */
    var $may = null;

    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'MB_Users';                        // table name
    var $id;                              // int(10)  not_null primary_key unsigned auto_increment
    var $login;                           // string(255)  not_null unique_key
    var $pass_md5;                        // string(255)  not_null

    /* ZE2 compatibility trick*/
    function __clone() { return $this;}

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DBO_MB_Users',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    
    /** Constructor */
    function DBO_MB_Users() {
        $this->__init();
    }


    # ---- PRIVATE METHODS
    function __init() {}
}
