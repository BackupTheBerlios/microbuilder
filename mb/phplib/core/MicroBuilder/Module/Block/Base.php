<?php
/** MicroBuilder_ModuleBlock_Base declaration.
 * @version    $Id: Base.php,v 1.1 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */


/** ModuleBlock base.
 * @package    core
 */
class MicroBuilder_ModuleBlock_Base {

# ---- DESCRIPTION

    /** Action name
     * @var string */
    var $__name = '';
    
    /** Action summary
     * @var string */
    var $__summary = '';

    /** Associated module
     * @var string */
    var $__module = '';

   
# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ModuleBlock_Base () {}


    /** Returns block's string representation 
     * @abstract
     * @return     string */
    function toString() {}


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>