<?php
/** Module (>>>class_name<<<) declaration
 * @version    $Id: TEMPLATE.module.php.tpl,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Module base */
require_once 'core/MicroBuilder/Module/Base.php';

/** 
 * @package    modules
 */
class (>>>class_name<<<) extends MicroBuilder_Module_Base {

# ---- DESCRIPTION

    /** Module name 
     * @var string */
    var $__name = '';

    /** Module summary 
     * @var string */
    var $__summary;

    

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function (>>>class_name<<<) () {
        MicroBuilder_Module_Base::MicroBuilder_Module_Base();
    }


    /** Returns module's string representation 
     * @return      string 
     */
    function toString() {}


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>

