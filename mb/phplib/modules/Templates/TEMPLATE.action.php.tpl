<?php
/** Module action (>>>class_name<<<) declaration.
 * @version    $Id: TEMPLATE.action.php.tpl,v 1.1 2004/07/13 02:00:40 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/** Actions base class */
require_once 'core/MicroBuilder/Module/Action/Base.php';

/** Action description.
 * @package    modules
 * @subpackage actions
 */
class ModuleAction_(>>>assoc_module<<<)_(>>>action_name<<<) extends MicroBuidler_ModuleAction_Base {

# ---- DESCRIPTION
    /** Action name
     * @var string */
    var $__name = '(>>>action_name<<<)';
    
    /** Action summary
     * @var string */
    var $__summary = '(>>>action_summary<<<)';

    /** Associated module
     * @var string */
    var $__module = '(>>>assoc_module<<<)';

    /** Action args
     * @var array */
    var $__args = array();

# ---- PROPRIETES



# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function ModuleAction_(>>>assoc_module<<<)_(>>>action_name<<<) () {
        MicroBuidler_ModuleAction_Base::MicroBuidler_ModuleAction_Base();
    }


    /** Execute action */
    function execute( $params = null ) {
        if ( $this->_checkParams( $params ) ) {
            (>>>POINT<<<)
        }

        else return;
    }

    
    /** Returns action's string representation.
     * @return     string */
    function toString() {}


# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>

