<?php
/** Description du fichier.
 * @package      www
 *
 * @version $Id: test.php,v 1.1 2004/07/13 02:00:39 mbertier Exp $
 */

// Définition du chemin vers les librairies MicroBuilder
set_include_path( dirname(__FILE__) . '/../phplib:' . ini_get('include_path') );

# ---- CONFIG
ini_set( 'error_reporting', E_ALL );

# ---- INCLUDES
require_once 'core/MicroBuilder/PageController.php';



# -- Démarrage
$ctrl =& new MicroBuilder_PageController;
$ctrl->start();

//print_r( debug_backtrace() );

?>
