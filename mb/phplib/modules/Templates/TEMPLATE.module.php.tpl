<?php
/** Module (>>>class_name<<<) declaration
 * @version    $Id: TEMPLATE.module.php.tpl,v 1.2 2004/07/14 23:56:12 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Module base */
require_once 'core/MicroBuilder/Module/Base.php';

/** (>>>module_summary<<<)
 * @package    modules
 */
class Module_(>>>module_name<<<) extends MicroBuilder_Module_Base {

# ---- DESCRIPTION

    /** Module name 
     * @var string */
    var $__name = '(>>>module_name<<<)';

    /** Module summary 
     * @var string */
    var $__summary  ='(>>>module_summary<<<)';

    

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Module_(>>>module_name<<<) () {
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

