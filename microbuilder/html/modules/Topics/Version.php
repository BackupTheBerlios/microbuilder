<?php // $Id: Version.php,v 1.1 2004/03/01 10:09:01 mbertier Exp $ $Name:  $

$modversion['name'] = 'Topics';
$modversion['version'] = '1.0';
$modversion['description'] = 'Display site topics';
$modversion['credits'] = 'docs/credits.txt';
$modversion['help'] = 'docs/install.txt';
$modversion['changelog'] = 'docs/changelog.txt';
$modversion['license'] = 'docs/license.txt';
$modversion['official'] = 1;
$modversion['author'] = 'Francisco Burzi';
$modversion['contact'] = 'http://www.phpnuke.org';
$modversion['admin'] = 0;
$modversion['securityschema'] = array('Topics::Topic' => 'Topic name::Topic ID',
                                      'Topics::Related' => 'Related name:Topic name:Topic ID');

?>