<?php
/** Déclaration de la classe MicroBuilder_Module_Base
 * @version    $Id: Base.php,v 1.3 2004/07/14 23:56:12 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

require_once 'core/MicroBuilder/Module/Action/Factory.php';
require_once 'core/MicroBuilder/Module/ErrorCallback.php';

/** Module compatible MicroBuilder
 * @package    core
 */
class MicroBuilder_Module_Base  {

    /** @access public */
    var $__name = null;

    /** @access public */
    var $__summary = null;

    /** @access public */
    var $__default_action = null;


# ---- SLOTS
    /** Error stack
     * @var object PEAR_ErrorStack */
    var $err = null;

# ---- PROPRIETES
    /** Représentation littérale du module.
     * @var string */
    var $_string;


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Module_Base () {
        $this->__init();
    }


    /** Exécution d'une action. 
     * @param      string      $action_name      Le nom de l'action à exécuter.
     * @param      array       $params           Tableau de paramètres nommés. 
     */
    function executeAction( $action_name, $params = null ) {
        
        // Execute default action if no action requested
        if ( empty($action_name) ) $action_name = $this->__default_action;

        // Exécution de l'action
        $action =& $this->_makeAction( $action_name );

        // Check if action creation was ok
        if ( $this->err->hasErrors() ) return;

        $action->execute( $params );

        $this->_addExecutedAction( $action );
        
        return;
    }

    /** Retourne la représentation littérale du module.
     * @return      string
     */
    function toString() {
        $this->render();
        return $this->_string;
    }
    

    /** Constitution de la représentation littérale du module.
     */
    function render() {
        foreach ( $this->_executedActions as $action ) {
            $this->_string .= $action->toString();
        }
    }


    /** Returns module URI 
     * @return       string 
     */
    function getURI() {
        return "/mb/www/test.php?module=$this->__name";
    }

    /** Installation du module. */
    function install() {}


    /** Désinstallation du module. */
    function unInstall() {}


    /** Raccourci
     */
    function hasErrors() {
        return $this->err->hasErrors();
    }

# ---- ACCESSEURS / MUTATEURS


# ---- METHODES PRIVEES

    /** Fabrique d'Actions */
    function _makeAction( $action_name, $params = null ) {
        $a =& MicroBuilder_ModuleAction_Factory::make( $this->__name, $action_name, $params );
        return $a;
    }


    /** */
    function _addExecutedAction( &$action ) {
        $this->_executedActions[$action->__name] = $action;
    }


    function _getActionsOutput() {
        $str = '';
        foreach ($this->_executedActions as $a ) {
            $str .= $a->toString();
        }
        return $str;
    }


    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

    /** Initialisation */
    function __init() {
        // Error Handling
        // Modules use their own ErrorStack and ErrorCallback
        $this->err =& PEAR_ErrorStack::singleton( $this->__name );
        $callback =& new MicroBuilder_Module_ErrorCallback;
        $callback->_module_name = $this->__name;
        $this->err->setDefaultCallback( array(&$callback, 'errorCallback') );
        
        $log =& Log::singleton( 'file' );
    }

    
    
}
?>