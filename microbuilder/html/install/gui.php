<?php
/** Provide gui rendering functions for the installer.
 * @version      $Id: gui.php,v 1.4 2004/03/19 10:23:24 mbertier Exp $ $Name:  $
 * @package      Install
 * @license      GPL
 * @author       Gregor J. Rothfuss
 */


/** Prints HMTL page header. */
function print_header() {
  
  // Random banner
  $bn_num = mt_rand (1, 5);

  echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n\n
          <html><head><title>" . _INSTALLATION . "</title>
<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=" . _CHARSET . "\">
<META NAME=\"AUTHOR\" CONTENT=\"PostNuke Crew\">
<META NAME=\"GENERATOR\" CONTENT=\"PostNuke -- http://www.postnuke.com\">
<link rel=\"StyleSheet\" href=\"install/style/styleNN.css\" type=\"text/css\">
<style type=\"text/css\">@import url(\"install/style/style.css\");</style>
</head><body leftmargin=\"0\" rightmargin=\"0\" topmargin=\"0\" bottommargin=\"0\"><table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\"><tr><td valign=\"top\"><table cellspacing=\"0\" cellpadding=\"0\" width=\"100%\" bgcolor=\"#264CB7\" background=\"install/style/bg.gif\"><tr><td align=\"left\"><img src='install/style/top1.jpg'  alt='' border='0' align='middle'></td><td align=\"right\"><a href=\"http://www.postnuke.com\" target=\"_blank\" title=\"Visit the postnuke community !\"><img src='install/style/top2.jpg'  alt='' border='0' align='middle'></a></td></tr><tr bgcolor=\"#000000\" height=\"3\"><td colspan=\"2\"></td></tr></table><br>
<table bgcolor=\"#000000\" cellspacing=\"0\" align=center><tr bgcolor=\"#ffffff\"><td><img src='install/banners/banner.$bn_num.gif' width='468' height='60' alt='' border='0' align='middle'></td></tr></table><br>
<table width=\"80%\" align=\"center\"><tr><td>";
}

/** This function prints the "This is your setting" area (read-only confirmation form)
 * @param     bool      $border      toggles html border
 */
function print_form_text( $border = 0 ) {
  global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $intranet, $dbtabletype;

  echo "<br>
<table border=$border>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBHOST . "</font></td>
<td><font class=\"pn-normal\">$dbhost</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBUNAME . "</font></td>
<td><font class=\"pn-normal\">$dbuname</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPASS . "</font></td>
<td><font class=\"pn-normal\">&middot;&middot;&middot;&middot;&middot;</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBNAME . "</font></td>
<td><font class=\"pn-normal\">$dbname</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPREFIX . "</font></td>
<td><font class=\"pn-normal\">$prefix</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTYPE . "</font></td>
<td><font class=\"pn-normal\">$dbtype</font></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTABLETYPE . "</font></td>
<td><font class=\"pn-normal\">$dbtabletype</font></td></tr>
</tr></table>";
} 


/** Prints form used to set settings. 
 * @param      bool      $border   */
function print_form_editabletext($border = 0) {
  global $dbhost, $dbuname, $dbpass, $dbname, $intranet, $prefix;

  echo "<br>
<table border=$border>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBHOST . "</font></td>
<td><input type=\"text\" NAME=\"dbhost\" SIZE=30 maxlength=80 value=\"$dbhost\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBUNAME . "</font></td>
<td><input type=\"text\" NAME=\"dbuname\" SIZE=30 maxlength=80 value=\"$dbuname\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPASS . "</font></td>
<td><input type=\"password\" NAME=\"dbpass\" SIZE=30 maxlength=80 value=\"$dbpass\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBNAME . "</font></td>
<td><input type=\"text\" NAME=\"dbname\" SIZE=30 maxlength=80 value=\"$dbname\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBPREFIX . "</font></td>
<td><input type=\"text\" NAME=\"prefix\" SIZE=30 maxlength=80 value=\"$prefix\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTYPE . "</font></td>
<td><select name=\"dbtype\"><option value=\"mysql\" selected>&nbsp;MySQL&nbsp;</option>
</select></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _DBTABLETYPE . "</font></td>
<td><select name=\"dbtabletype\"><option value=\"myisam\" selected>&nbsp;MyISAM&nbsp;</option>
<option value=\"innodb\">&nbsp;INNODB&nbsp;</option>
</select></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ISINTRANET . "</font></td>
<td><input type=\"checkbox\" NAME=\"intranet\" VALUE=\"1\"></td></tr>
<tr><td colspan=\"2\" align=\"left\"><font class=\"pn-normal\">" . _INTRANETINFO . "</font></td></tr>
</table>";
} 

/** This function prints the <input type=hidden> area
 */
function print_form_hidden() {

  // Language selection
  global $currentlang;

  global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $intranet, $dbtabletype;

  if (empty($intranet)) {
    $intranet = 0;
  } 

  echo "
<input type=\"hidden\" NAME=\"currentlang\" value=\"$currentlang\">
<input type=\"hidden\" NAME=\"dbhost\" value=\"$dbhost\">
<input type=\"hidden\" NAME=\"dbuname\" value=\"$dbuname\">
<input type=\"hidden\" NAME=\"dbpass\" value=\"$dbpass\">
<input type=\"hidden\" NAME=\"dbname\" value=\"$dbname\">
<input type=\"hidden\" NAME=\"prefix\" value=\"$prefix\">
<input type=\"hidden\" NAME=\"dbtype\" value=\"$dbtype\">
<input type=\"hidden\" NAME=\"dbtabletype\" value=\"$dbtabletype\">
<input type=\"hidden\" NAME=\"intranet\" value=\"$intranet\">";
} 

/***/
function print_CHM_check() {
  global $currentlang;
  progress(40);
  echo "<br>
<font class=\"pn-title\">" . _DBINFO . "</font><font class=\"pn-normal\"> " . _CHM_CHECK_1 . "<br><br>
<form action=\"install.php\" method=\"post\"><center>";

  print_form_editabletext(0);

  echo "<input type=\"hidden\" NAME=\"currentlang\" value=\"$currentlang\">
<input type=\"hidden\" name=\"op\" value=\"Submit\">
<input type=\"submit\" value=\"" . _BTN_SUBMIT . "\"></table></center></form></font>";
} 

/***/
function print_submit() {
  progress(50);
  echo "<br><center>
<font class=\"pn-title\">" . _DBINFO . "</font><br><font class=\"pn-normal\"> " . _SUBMIT_1 . "</font><br><br><center>
<font class=\"pn-normal\">" . _SUBMIT_2 . "</font><br>";

  print_form_text();

  echo "
</font>
<form action=\"install.php\" method=\"post\">
<input type=\"submit\" name=\"op\" value=\"" . _BTN_CHANGEINFO . "\"><br>
<font class=\"pn-normal\">" . _SUBMIT_3 . "</font><br><br>
<table width=\"50%\"><tr align=\"center\"><td>";

  print_form_hidden();

  echo "
<input type=\"submit\" name=\"op\" value=\"" . _BTN_NEWINSTALL . "\">
</td></tr></table></form></center>";
} 

/***/
function print_change_info() {
  echo "
<font class=\"pn-title\">Change Info</font><font class=\"pn-normal\">" . _CHANGE_INFO_1 . "<br><br>
<form action=\"install.php\" method=\"post\"><center>";

  print_form_editabletext(0);

  echo "
<input type=\"hidden\" name=\"op\" value=\"Submit\">
<input type=\"submit\" value=\"" . _BTN_SUBMIT . "\"></center></form></font>";
} 

/***/
function print_new_install() {
  progress(60);
  echo "<center><br><font class=\"pn-title\">" . _NEWINSTALL . "</font><br><font class=\"pn-normal\"> " . _NEW_INSTALL_1 . "</font><br><br><center>";

  print_form_text(0);

  echo "
<br><br><font class=\"pn-normal\">" . _NEW_INSTALL_2 . "</font>
<form action=\"install.php\" method=\"post\"><table width=\"50%\"><tr>
<td align=center><font class=\"pn-normal\">" . _NEW_INSTALL_3 . "</font><br><input type=checkbox name=\"dbmake\"><br></td><td>";

  print_form_hidden();

  echo "
<input type=\"hidden\" name=\"op\" value=\"Start\">
<input type=\"submit\" value=\"" . _BTN_START . "\"></td></tr></table></form></font></center>";
} 

/***/
function print_start() {
  echo "<br>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center>
<tr><td align=center>";

  print_form_hidden();

  echo "
<input type=\"hidden\" name=\"op\" value=\"Continue\">
<input type=\"submit\" value=\"" . _BTN_CONTINUE . "\"></td></tr></table></center></form>";
} 

/***/
function print_continue() {
  progress(80);
  echo "<br>
<font class=\"pn-title\">" . _CONTINUE_1 . "</font>
<font class=\"pn-normal\">" . _CONTINUE_2 . "</font><br><br>
<center><form action=\"install.php\" method=\"post\"><table width=\"50%\" border=1>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_LOGIN . "</font></td>
<td><input type=\"text\" NAME=\"aid\" SIZE=30 maxlength=80 value=\"Admin\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_NAME . "</font></td>
<td><input type=\"text\" NAME=\"name\" SIZE=30 maxlength=80 value=\"Admin\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_PASS . "</font></td>
<td><input type=\"password\" NAME=\"pwd\" SIZE=30 maxlength=80 value=\"Password\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_REPEATPASS . "</font></td>
<td><input type=\"password\" NAME=\"repeatpwd\" SIZE=30 maxlength=80 value=\"Password\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_EMAIL . "</font></td>
<td><input type=\"text\" NAME=\"email\" SIZE=30 maxlength=80 value=\"none@none.com\"></td></tr>
<tr><td align=\"left\"><font class=\"pn-normal\">" . _ADMIN_URL . "</font></td>
<td><input type=\"text\" NAME=\"url\" SIZE=30 maxlength=80 value=\"http://www.postnuke.com\"></td></tr>";

  print_form_hidden();

  echo "
</td></tr></table><br><br><input type=\"hidden\" name=\"op\" value=\"Set Login\">
<input type=\"submit\" value=\"" . _BTN_SET_LOGIN . "\"></form></font></center>";
} 

/***/
function print_set_login() {
  echo "
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\">";

  print_form_hidden();

  echo "
<tr><td align=center><input type=\"hidden\" name=\"op\" value=\"Finish\">
<input type=\"submit\" value=\"" . _BTN_FINISH . "\"></td></tr></table></center></form>";
} 


/***/
function print_finish() {
  progress(100);
  echo "
<font class=\"pn-title\">" . _FINISH_1 . "</font>
<font class=\"pn-normal\">" . _FINISH_2 . "<br><br><form action=\"install.php\" method=\"post\">
<center><textarea name=\"license\" cols=80 rows=10>";

  include("docs/CREDITS.txt");

  echo "
</textarea><br><br>" . _FINISH_3 . "</center></form></font>
<br><br><center><b><a href=\"index.php\">" . _FINISH_4 . "</a></b></center><br><br>";
} 



/** "Installation succesful" screen. */
function print_success() {
  echo "
<font class=\"pn-title\">" . _SUCCESS_1 . "</font>
<font class=\"pn-normal\">" . _SUCCESS_2 . "<br><br>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\">";

  print_form_hidden();

  echo "
<tr><td align=center><input type=\"hidden\" name=\"op\" value=\"Finish\">
<input type=\"submit\" value=\"" . _BTN_FINISH . "\"></td>
</tr></table></center></form></font><br><br>";
} 


function print_default() {
  progress(20);
  echo "<br>
<font class=\"pn-normal\">" . _DEFAULT_1 . "</font><br><br>
<font class=\"pn-title\">" . _DEFAULT_2 . "</font>
<font class=\"pn-normal\">" . _DEFAULT_3 . "<br><br>
<form action=\"install.php\" method=\"post\"><center>
<textarea name=\"license\" cols=80 rows=10>";

  include("docs/COPYING.txt");

  echo "</textarea><br><br>";

  print_form_hidden();

  echo "
<input type=\"hidden\" name=\"op\" value=\"Check\">
<input type=\"submit\" value=\"" . _BTN_NEXT . "\"></center>
</form></font><br><br>";
} 

/***/
function print_select_language() {
  progress(10);
  echo "<br><center>
	<font class=\"pn-title\">" . _VERSION_WARNING . "</font><br><br>
<font class=\"pn-title\">" . _SELECT_LANGUAGE_1 . "</font></center>
<form action=\"install.php\" method=\"post\"><center><table width=\"50%\" align=center><tr>
<td align=center><font class=\"pn-normal\">" . _SELECT_LANGUAGE_2;

  lang_dropdown();

  echo "<input type=\"hidden\" name=\"op\" value=\"Set Language\">
<input type=\"submit\" value=\"" . _BTN_SET_LANGUAGE . "\"></font></td></tr>
</table></center></form>";
} 

/***/
function print_footer() {
  echo "
</td></tr></table></td></tr><tr bgcolor=\"#000000\" height=\"3\"><td></td></tr><tr  bgcolor=\"#264CB7\" height=\"80\"><td><table width=\"100%\" ><tr><td height=\"20\"><center><font color=\"#ffffff\" size=\"2\"><a href=\"http://support.postnuke.com\" target=\"_blank\"><font color=\"#ffffff\" size=\"2\">Postnuke Support</font></a> - <a href=\"http://forums.postnuke.com\" target=\"_blank\"><font color=\"#ffffff\" size=\"2\">Support Forums</font></a><br><br><b>" . _FOOTER_1 . "</b></font></center></td></tr></table></td></tr></table></body></html>";
} 

?>
