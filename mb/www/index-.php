<?php
/** Description du fichier.
 * D�tails.
 * @package       www
 * @version $Id: index-.php,v 1.1 2004/07/13 02:00:39 mbertier Exp $
 */

// D�finition du chemin vers les librairies MicroBuilder
set_include_path( dirname(__FILE__) . '/../phplib:' . ini_get('include_path') );

# ---- CONFIG
ini_set( 'error_reporting', E_ALL );

# ---- INCLUDES
require_once 'MicroBuilder/PageController.php';

# -- D�marrage
$ctrl =& new MicroBuilder_PageController;
$ctrl->start();

?>