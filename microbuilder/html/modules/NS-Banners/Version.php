<?php
// $Id: Version.php,v 1.1 2004/03/01 10:09:03 mbertier Exp $ $Name:  $
$modversion['name'] = 'Banners Admin';
$modversion['version'] = '1.0';
$modversion['description'] = 'Administer Banners on your site';
$modversion['credits'] = '';
$modversion['help'] = '';
$modversion['changelog'] = '';
$modversion['license'] = '';
$modversion['official'] = 1;
$modversion['author'] = 'Francisco Burzi';
$modversion['contact'] = 'http://www.phpnuke.org';
$modversion['admin'] = 1;
$modversion['securityschema'] = array('Banners::Client' => 'Client name::Client ID',
                                      'Banners::Banner' => 'Client name::Banner ID');

?>