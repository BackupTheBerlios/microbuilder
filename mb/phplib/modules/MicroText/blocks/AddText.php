<?php
/** Module block ModuleBlock_MicroText_AddText declaration.
 * @version    $Id: AddText.php,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Blocks base class */
require_once 'core/MicroBuilder/Module/Block/Base.php';

/** Block description.
 * @package    modules
 * @subpackage blocks
 */
class ModuleBlock_MicroText_AddText extends MicroBuilder_ModuleBlock_Base {

# ---- DESCRIPTION
    /** Block name
     * @var string */
    var $__name = 'AddText';
    
    /** Block summary
     * @var string */
    var $__summary = 'Form to add microtexts';

    /** Associated module
     * @var string */
    var $__module = 'MicroText';

    /** Block args
     * @var array */
    var $__args = array();

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function ModuleBlock_MicroText_AddText () {
        MicroBuilder_ModuleBlock_Base::MicroBuilder_ModuleBlock_Base();
    }


    /** Returns block's string representation.
     * @return     string */
    function toString() {
        $html = '<form name="block-'. $this->__module.'-'.$this->__name. '">
                  <label for="text">add microliner</label>
                  <input type="text" name="text" />
                  <input type="hidden" name="module" value="MicroText" />
                  <input type="hidden" name="action" value="AddText" />
                  <input type="submit" value="submit" />
                 </form>';

        return $html;
    }


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>