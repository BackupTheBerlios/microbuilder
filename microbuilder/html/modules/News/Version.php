<?php // $Id: Version.php,v 1.1 2004/03/01 10:08:58 mbertier Exp $ $Name:  $

$modversion['name'] = 'News';
$modversion['version'] = '1.3';
$modversion['description'] = 'A module to display the news on your index page';
$modversion['credits'] = 'docs/credits.txt';
$modversion['help'] = 'docs/install.txt';
$modversion['changelog'] = 'docs/changelog.txt';
$modversion['license'] = 'docs/license.txt';
$modversion['official'] = 1;
$modversion['author'] = 'Francisco Burzi';
$modversion['contact'] = 'http://phpnuke.org';
$modversion['admin'] = 0;
$modversion['securityschema'] = array('Stories::Story' => 'Author ID:Category name:Story ID',
                                      'Stories::Category' => 'Category name::Category ID');

?>