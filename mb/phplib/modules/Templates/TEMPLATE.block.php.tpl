<?php
/** Module block (>>>class_name<<<) declaration.
 * @version    $Id: TEMPLATE.block.php.tpl,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Blocks base class */
require_once 'core/MicroBuilder/Module/Block/Base.php';

/** Block description.
 * @package    modules
 * @subpackage blocks
 */
class ModuleBlock_(>>>module_name<<<)_(>>>block_name<<<) extends MicroBuilder_ModuleBlock_Base {

# ---- DESCRIPTION
    /** Block name
     * @var string */
    var $__name = '(>>>block_name<<<)';
    
    /** Block summary
     * @var string */
    var $__summary = '(>>>block_summary<<<)';

    /** Associated module
     * @var string */
    var $__module = '(>>>assoc_module<<<)';

    /** Block args
     * @var array */
    var $__args = array();

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function (>>>class_name<<<) () {
        MicroBuilder_ModuleBlock_Base::MicroBuilder_ModuleBlock_Base();
    }


    /** Returns block's string representation.
     * @return     string */
    function toString() {}


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>

