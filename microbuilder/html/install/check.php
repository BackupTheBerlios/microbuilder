<?php 
/** Declaration of various function used to check if installation is possible on target web server.
 * @version     $Id: check.php,v 1.3 2004/03/13 16:31:19 mbertier Exp $ $Name:  $
 * @package     Install
 * @license     GPL
 * @author      Gregor J. Rothfuss
 */


/** Checks various php settings
 * @author      Bob Herald
 */
function do_check_php() {
  if (phpversion() < "4.0.1") {
    $phpver = phpversion();
    echo "<br><font class=\"pn-title\">" . _PHP_CHECK_1 . $phpver . "<br>
             " . _PHP_CHECK_2 . "</font><br>";
  } 

  if (get_magic_quotes_gpc() == 0) {
    echo "<br><font class=\"pn-title\">" . _PHP_CHECK_3 . "</font><br>";
  } 

  if (get_magic_quotes_runtime() == 1) {
    echo "<br><font class=\"pn-title\">" . _PHP_CHECK_4 . "</font><br>";
  } 
} 



/** Checks if config.php has the correct permissions set
 * @warning   And many other things apparently
 * @todo      What is $sideblock ?
 * @todo      Why is $dircheck test based on modules/NS-Quotes ?
 */
function do_check_chmod() {
  
  // Language used for installation
  global $currentlang;

  // User feedback
  echo "<font class=\"pn-title\">" . _CHMOD_CHECK_1 . "</font><br><br>
        <font class=\"pn-normal\">" . _CHMOD_CHECK_2 . "</font>";

  // Checking 'config.php' modes 
  $file = 'config.php';

  // ??
  $sideblock = "chmod";

  // File has to be writable
  if ( is_writable($file) ) {
    echo "<br><br><img src='install/style/green_check.gif'  alt='' border='0' align='absmiddle'><font class=\"pn-title\">" . _CHMOD_CHECK_3 . "</font><br>";
    $chmod = 0;

  } else {

    echo "<br><br><img src='install/style/red_check.gif'  alt='' border='0' align='absmiddle'><font class=\"pn-title\">" . _CHMOD_CHECK_4 . "</font><br>";
    $chmod = 1;
  } 

  // Checking 'config-old.php' modes
  $file = 'config-old.php'; 

  // File has to be writable
  if ( is_writable($file) ) {
    echo "<p><img src='install/style/green_check.gif'  alt='' border='0' align='absmiddle'><font class=\"pn-title\">" . _CHMOD_CHECK_5 . "</font></p>
             <p><form action=\"install.php\" method=\"post\">
             <input type=\"hidden\" name=\"currentlang\" value=\"$currentlang\">
             ";
    $chmod = 0;

  } else {

    echo "<img src='install/style/red_check.gif'  alt='' border='0' align='middle'><font class=\"pn-title\">" . _CHMOD_CHECK_6 . "</font>
             <p><form action=\"install.php\" method=\"post\">
             <input type=\"hidden\" name=\"currentlang\" value=\"$currentlang\">
             ";
    $chmod = 1;
  } 
  
 
  // Restart check
  if ( $chmod == 1 ) {
    echo "<center><input type=\"hidden\" name=\"op\" value=\"Check\"><input type=\"submit\" value=\"" . _BTN_RECHECK . "\"></center></form></p>";

  } 

  // Continue installation
  elseif ($chmod == 0 or $dircheck == 0) {
    echo "<center><input type=\"hidden\" name=\"op\" value=\"CHM_check\"><input type=\"submit\" value=\"" . _BTN_CONTINUE . "\"></center></form></p>";
  } 
} 

/** Generates and prints installation progress bar html code. 
 */
function progress( $percent ) {
  echo "<table align=\"center\" width=\"400\" bgcolor=\"#000000\" cellspacing=\"1\" cellpadding=\"0\"><tr bgcolor=\"#cccccc\"><td><table cellspacing=\"0\" cellpadding=\"0\" width=\"$percent%\"><tr><td align=\"center\" bgcolor=\"#264CB7\"><font size=\"1\" color=\"white\">$percent%</font></td></tr></table></td></tr></table>";
} 

?>