#!/usr/local/bin/php

<?php
/** G�n�ration du package PEAR
 * @version      $Id: make_pkg.php,v 1.1 2004/07/14 23:56:12 mbertier Exp $
 * @todo         Comprendre pourquoi le tableau que retourne getopt est aussi tarbiscot� ou �tendre getopt
 */

require_once 'Console/Getopt.php';
require_once 'PEAR/PackageFileManager.php';

# -- D�finition des param�tres accept�s / obligatoires
$short_opts = 'p:r';
$long_opts  = array( 'packagedir=' );
$mandatory_opts = array(  );                        

# -- Traitement des param�tres pass�s au script
$getopts =& new Console_Getopt();

# -- R�cup�ration de param�tre (on ne peut pas d�finir de param�tre oblifgatoire!)
$opts = $getopts->getopt( $getopts->readPHPArgv(), $short_opts, $long_opts );
if ( PEAR::isError($opts) ) die( "!!" . $opts->getMessage() . "\n" );

// Aucun param�tre pass� alors qu'il y en a d'obligatoires..
if ( is_array($opts[0]) && ! count($opts[0]) && count($mandatory_opts) )  die( "!! Param�tre obligatoire non renseign�.\n" );

// Contr�le de la pr�sence des paramt�re obligatoires dans les param�tres pass�s au script
if ( is_array($opts[0]) && count($opts[0]) ) {
    # -- Constitution d'un tableau de param�tres plus clair (pour mon cerveau)
    for ( $i = 0; $i < count($opts[0]); $i++ ) {
        $opts_h[ $opts[0][$i][0] ] = ( isset($opts[0][$i][1]) ? $opts[0][$i][1] : $opts[1][$i] );
    }

    # -- Contr�le des param�tres obligatoires
    foreach ( $mandatory_opts as $short => $long ) {
        if ( ! in_array($short, $opts_h) && ! in_array("--$long", $opts_h) ) {
            die( "!! Param�tre obligatoire non renseign�.\n" );
        }
    }
}


// Par d�faut, on consid�re que le package se situe dans le r�peroire courant
$pkg_dir = ( isset($opts_h['--packagedir']) ? $opts_h['--packagedir'] : $opts_h['p'] );
$pkg_dir = ( isset($pkg_dir) ? $pkg_dir : getcwd() );

echo "Looking for files in $pkg_dir...\n";

$pkgxml = new PEAR_PackageFileManager;

# -- Options
$e = $pkgxml->setOptions( array( 'baseinstalldir'       => '/',
                                 'package'              => 'MicroBuilder',
                                 'version'              => '0.1',
                                 'summary'              => 'MicroBuilder',
                                 'description'          => 'Soon to come...',
                                 'license'              => 'GPL',
                                 'packagedirectory'     => $pkg_dir,
                                 'filelistgenerator'    => 'cvs',
                                 'state'                => 'beta',
                                 'notes'                => 'first try',
                                 'ignore'               => array('make_pkg.php'),
                                 'installexceptions'    => array(),
                                 'dir_roles'            => array(),
                                 'exceptions'           => array()   ) );

# -- Roles
$pkgxml->addRole( 'ini', 'php' );
$pkgxml->addRole( 'dist', 'php' );

# -- Maintainers
$pkgxml->addMaintainer( 'mbertier', 
                        'lead', 
                        'Tristan Rivoallan', 
                        'mbertier@parishq.net' );


# -- D�pendances
$pkgxml->addDependency( 'DB_DataObject', '1.5.3', 'ge', 'pkg' );
$pkgxml->addDependency( 'HTTP_Request',  '1.2',   'ge', 'pkg' );


if ( PEAR::isError($e) ) {
    echo "*** Erreur: ". $e->getMessage() . "\n";
    exit;
}

/*
$e = $pkgxml->debugPackageFile( false );

if ( PEAR::isError($e) ) {
    echo "*** Erreur: ". $e->getMessage() . "\n";
    exit;
}
*/

$e = $pkgxml->writePackageFile( );

if ( PEAR::isError($e) ) {
    echo "*** Erreur: ". $e->getMessage() . "\n";
    exit;
}

echo ">>> $pkg_dir/package.xml a �t� g�n�r� :)\n";
echo ">>> Il reste � valider package.xml et � cr�er le package :\n";
echo ">>> pear package-validate && pear package\n"

?>