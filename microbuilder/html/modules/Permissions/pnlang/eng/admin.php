<?php // $Id: admin.php,v 1.1 2004/03/01 10:08:58 mbertier Exp $
//
// Original Author of file: Jim McDonald
// Purpose of file: Language defines for NS-Permissions module
//
if (!defined('_DELETE')) {
    define('_DELETE','Delete');
}
if (!defined('_EDIT')) {
    define('_EDIT','Edit');
}
if (!defined('_PERMISSIONS')) {
    define('_PERMISSIONS','Permissions');
}
define('_PERMISSIONSNOAUTH','You are not authorised to carry out that operation');
define('_ALLGROUPS','All Groups');
define('_ALLREALMS','All Realms'); // Realms defines until they get their own home
define('_ALLUSERS','All Users');
define('_REALM','Realm');
define('_INSTANCE','Instance');
define('_COMPONENT','Component');
if (!defined('_DOWN')) {
    define('_DOWN','Down');
}
define('_USERPERMS','User');
define('_GROUPPERMS','Group');
define('_VIEWGROUPPERMS','View Group Permissions');
define('_VIEWUSERPERMS','View User Permissions');
define('_MODIFYPERM','Modify');
define('_MODIFYGROUPPERM','Modify Group Permissions');
define('_MODIFYUSERPERM','Modify User Permissions');
define('_NEWPERM',' Add ');
define('_NEWGROUPPERM','New Group Permission');
define('_NEWUSERPERM','New User Permission');
define('_PERMLEVEL','Permissions level');
define('_PERMOPS','Operations');
define('_SEQUENCE','Seq.');
define('_UNREGISTEREDGROUP','Unregistered');
define('_UNREGISTEREDUSER','Unregistered');
if (!defined('_UP')) {
    define('_UP','Up');
}
define('_PERMISSIONINFO','Permissions Information');
define('_REGISTEREDCOMP','Registered Component');
define('_INSTANCETEMP','Instance template');

// MMaes: Removed some hardcoded text
define('_PERM_INC','Incremented permission-rule');
define('_PERM_DEC','Decremented permission-rule');
define('_PERM_UPD','Updated permission-rule');
define('_PERM_CREATED','Created permission-rule');
define('_PERM_DEL','Removed permission-rule');
define('_PERM_DECINCERR_NOID','No such permissions-ID: ');
define('_PERM_DECERR_NOSWAP','No permission directly below that one');
define('_PERM_INCERR_NOSWAP','No permission directly above that one');
// MMaes: Direct Insert capability
// define('_PERM_THINS','Ins.');
define('_PERMINSBEFORE_ALTTXT','Insert Permission before');
define('_PERM_INSERR','Error updating permission sequences');
define('_PERM_INSNOTIFY','Inserting permission-rule at position ');
// MMaes: Only show permissions applying to a group
define('_SEQ_ADJUST','&nbsp;Shift&nbsp;');
define('_PERM_VWSHOWONLY','Only show permissions applying to: ');
define('_PERM_VWFILTER','Filter');
define('_PERM_WARN_FILTERACTIVE','<b>- PARTIAL VIEW -</b>');
define('_PERM_PARTLY','Partial view of permissionlist!');
define('_PERM_SHOWING','Group: ');
define('_PERM_DECINCERR_NOSWAPPART','Permission-swap in partial view can only be done if both affected permissions are visible. Please use complete view');
// MMaes: ListEdit-function, editing in the mainview
define('_PERM_LISTNONEFOUND','No permissions of this kind found. First add some...');
define('_PERM_COMP_INPUTERR',' [Unallowed input in Component!] ');
define('_PERM_INST_INPUTERR',' [Unallowed input in Instance!] ');
// MMaes: Module-settings
define('_PERM_SETTINGS','Settings');
define('_PERM_MODIFYCONFIG','Change settings of Permission-module');
define('_PERM_ENABLEFILTER','Enable Filtering of GroupPermissions');
define('_PERM_DISPLAYWARNING','Show Warningbar when in Filterlist');
define('_PERM_ROWHEIGHTVIEW','Minimal viewing rowheight (pixels)');
define('_PERM_ROWHEIGHTEDIT','Minimal editing rowheight (pixels)');
define('_PERM_UPDATESETTINGS','Save Settings');
?>