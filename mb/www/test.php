<?php
/** Description du fichier.
 * @package      www
 *
 * @version $Id: test.php,v 1.2 2004/07/15 17:28:22 mbertier Exp $
 */

require_once 'PEAR.php';

// Définition du chemin vers les librairies MicroBuilder
set_include_path( dirname(__FILE__) . '/../phplib:' . ini_get('include_path') );

# ---- CONFIG
ini_set( 'error_reporting', E_ALL );

// Configuration des datatobjects
$config = parse_ini_file( dirname(__FILE__) . '/../conf/dbo.ini', TRUE);

foreach( $config as $class => $values ) {
    $options =& PEAR::getStaticProperty( $class, 'options' );
    $options = $values;
}

# ---- INCLUDES
require_once 'core/MicroBuilder/PageController.php';



# -- Démarrage
$ctrl =& new MicroBuilder_PageController;
$ctrl->start();

//print_r( debug_backtrace() );

?>
