<?php // $Id: admin.php,v 1.1 2004/03/01 10:08:59 mbertier Exp $
// ----------------------------------------------------------------------
// Original Author of file: Jim McDonald
// Purpose of file:  Language defines for pnadmin.php
// ----------------------------------------------------------------------
//
define('_EDITCENSOR', 'Configure Censorship Options');
if (!defined('_LOADFAILED')) {
	define('_LOADFAILED', 'Load of module failed');
}
define('_CENSORUPDATE', 'Update');
define('_CENSORUPDATED', 'Censorship Options Updated');
define('_CENSORMODE', 'Censor Mode On');
define('_CENSORLIST', 'List of Censored Words');
define('_CENSORREPLACE', 'Replace Censored Words with');
define('_CENSORMODEFAIL', 'Update of Censor Mode Failed');
define('_CENSORLISTFAIL', 'Update of Censor List Failed');
define('_CENSORREPLACEFAIL', 'Replace of Censor List Failed');

if (!defined('_CONFIRM')) {
	define('_CONFIRM', 'Confirm');
}
if (!defined('_CENSORNOAUTH')) {
	define('_CENSORNOAUTH','Not authorised to access the Censor Module');
}
?>