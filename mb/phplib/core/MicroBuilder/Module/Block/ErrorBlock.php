<?php
/** Module block MicroBuidler_ErrorBlock declaration.
 * @version    $Id: ErrorBlock.php,v 1.1 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Blocks base class */
require_once 'core/MicroBuilder/Module/Block/Base.php';

/** Block description.
 * @package    core
 * @subpackage blocks
 */
class MicroBuilder_ErrorBlock extends MicroBuilder_ModuleBlock_Base {

# ---- DESCRIPTION
    /** Block name
     * @var string */
    var $__name = null;
    
    /** Block summary
     * @var string */
    var $__summary = 'This block is displayed instead of non working blocks';

    /** Associated module
     * @var string */
    var $__module = 'core';

# ---- PROPRIETES

    var $_err;

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuidler_ErrorBlock () {
        MicroBuilder_ModuleBlock_Base::MicroBuilder_ModuleBlock_Base();
    }

    /** Define error
     * @var     array      $err
     */
    function setError( $err ) {
        $this->_err = $err;
    }

    /** Returns block's string representation.
     * @return     string */
    function toString() {
        $html = '<p class="error">'.$this->_err['message'].'</p>';
        return $html;
    }


# ---- ACCESSEURS / MUTATEURS

    /** Sets Block name
     * @param      string    $name
     */
    function setName( $name ) {
        $this->__name = $name;
    }

# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>