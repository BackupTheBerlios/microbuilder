<?php 
/** Function dedicated to editing the config.php file in order to reflect user choices.
 * @version      $Id: modify_config.php,v 1.2 2004/03/13 03:00:25 mbertier Exp $
 * @package      Installer
 * @license      GPL
 * @todo         Use XML instead !
 */


# -- GLOBALS
$reg_src = array();
$reg_rep = array();


/** Applies regex substitution to source file and outputs result to dest_file.
 * @param     string      $src      Source file path
 * @param     string      $dest     Destination file path
 * @param     array       $reg_src  Array of PCRE patterns to match
 * @param     array       $reg_rep  Array of substitutions to apply to matched patterns
 *
 * @return    string      A string starting with Err_ in case of problem
 */
function modify_file($src, $dest, $reg_src, $reg_rep) {
    $in = @fopen($src, "r");
    if (! $in) {
        return _MODIFY_FILE_1 . " $src";
    } 
    $i = 0;
    while (!feof($in)) {
        $file_buff1[$i++] = fgets($in, 4096);
    } 
    fclose($in);

    $lines = 0; // Keep track of the number of lines changed
    
    while (list ($bline_num, $buffer) = each ($file_buff1)) {
        $new = preg_replace($reg_src, $reg_rep, $buffer);
        if ($new != $buffer) {
            $lines++;
        } 
        $file_buff2[$bline_num] = $new;
    } 

    if ($lines == 0) {
        // Skip the rest - no lines changed
        return _MODIFY_FILE_3;
    } 

    reset($file_buff1);
    $out_backup = @fopen($dest, "w");

    if (! $out_backup) {
        return _MODIFY_FILE_2 . " $dest";
    } while (list ($bline_num, $buffer) = each ($file_buff1)) {
        fputs($out_backup, $buffer);
    } 

    fclose($out_backup);

    reset($file_buff2);
    $out_original = fopen($src, "w");
    if (! $out_original) {
        return _MODIFY_FILE_2 . " $src";
    } while (list ($bline_num, $buffer) = each ($file_buff2)) {
        fputs($out_original, $buffer);
    } 

    fclose($out_original); 
    // Success!
    return "$src updated with $lines lines of changes, backup is called $dest";
} 


/** Add search / replace patterns used to modify file.
 * @param      string     $key       Key to search for (variable)
 * @param      string     $rep       Replacement (value)
 * @author     Scott Kirkwood  */
function add_src_rep($key, $rep) {
    global $reg_src, $reg_rep; 

    // Note: /x is to permit spaces in regular expressions
    // Great for making the reg expressions easier to read

    // Ex: $pnconfig['sitename'] = stripslashes("Your Site Name");
    $reg_src[] = "/ \['$key'\] \s* = \s* stripslashes\( (\' | \") (.*) \\1 \); /x";
    $reg_rep[] = "['$key'] = stripslashes(\\1$rep\\1);"; 
    // Ex. $pnconfig['site_logo'] = "logo.gif";
    $reg_src[] = "/ \['$key'\] \s* = \s* (\' | \") (.*) \\1 ; /x";
    $reg_rep[] = "['$key'] = '$rep';"; 
    // Ex. $pnconfig['pollcomm'] = 1;
    $reg_src[] = "/ \['$key'\] \s* = \s* (\d*\.?\d*) ; /x";
    $reg_rep[] = "['$key'] = $rep;";
} 


/** Displays error info. */
function show_error_info()
{
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $dbtabletype;

    echo "<br/><br/><b>" . _SHOW_ERROR_INFO_1 . "<br/>";
	echo <<< EOT
        <tt>
        \$pnconfig['dbtype'] = '$dbtype';<br/>
        \$pnconfig['dbtabletype'] = '$dbtabletype';<br/>
        \$pnconfig['dbhost']  = '$dbhost';<br/>
        \$pnconfig['dbuname'] = '$dbuname';<br/>
        \$pnconfig['dbpass'] = '$dbpass';<br/>
        \$pnconfig['dbname'] = '$dbname';<br/>
        \$pnconfig['prefix'] = '$prefix';<br/>
        </tt>
EOT;
} 


/** Update the config.php file with the database information. (master function) */
function update_config_php($db_prefs = false) {

    global $reg_src, $reg_rep;
    global $dbhost, $dbuname, $dbpass, $dbname, $prefix, $dbtype, $dbtabletype;
    global $email, $url, $HTTP_ENV_VARS;

    add_src_rep("dbhost", $dbhost);
    add_src_rep("dbuname", base64_encode($dbuname));
    add_src_rep("dbpass", base64_encode($dbpass));
    add_src_rep("dbname", $dbname);
    add_src_rep("prefix", $prefix);
    add_src_rep("dbtype", $dbtype);
    add_src_rep("dbtabletype", $dbtabletype);

    if (@strstr($HTTP_ENV_VARS["OS"], "Win")) {
        add_src_rep("system" , '1');
    } else {
        add_src_rep("system", '0');
    } 
    add_src_rep("encoded", '1');

    if ($email) {
        add_src_rep("adminmail", $email);
    } 

    $ret = modify_file("config.php", "config-old.php", $reg_src, $reg_rep);

    if (preg_match("/Error/", $ret)) {
        show_error_info();
    } 
} 

?>