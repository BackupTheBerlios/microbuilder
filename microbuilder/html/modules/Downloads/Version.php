<?php // $Id: Version.php,v 1.1 2004/03/01 10:09:05 mbertier Exp $ $Name:  $

$modversion['name'] = 'Downloads';
$modversion['version'] = '1.31';
$modversion['description'] = 'Downloads Module';
$modversion['credits'] = 'docs/credits.txt';
$modversion['changelog'] = 'docs/changelog.txt';
$modversion['license'] = 'docs/license.txt';
$modversion['official'] = 1;
$modversion['author'] = 'Francisco Burzi';
$modversion['contact'] = 'http://www.phpnuke.org';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('Downloads::Category' => 'Category name::Category ID',
                                      'Downloads::Item' => 'File name::File ID');

?>