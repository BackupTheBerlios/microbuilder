<?php
/** Déclaration de la classe MicroBuilder_Module_Base
 * @version    $Id: Base.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

require_once 'core/MicroBuilder/Module/Action/Factory.php';

/** Module compatible MicroBuilder
 * @package    core
 */
class MicroBuilder_Module_Base  {

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
        define( 'MICROBUILDER_UNREGISTERED_ACTION', 1 );
        if ( ! $this->isRegisteredAction($action_name) ) { 
            $this->_errstack->push( MICROBUILDER_UNREGISTERED_ACTION, 
                                    'error',
                                    array( 'action' => $action_name ),
                                    "Requested action '$action_name' is not registered with module.");
            return false; 
        }

        // Exécution de l'action
        $action =& $this->_makeAction( $action_name );

        if ( $this->_errstack->hasErrors() ) return;

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

    /** Permet de savoir si une action est enregistrée. 
     * @param      string      $action_name
     * @return     bool 
     */
    function isRegisteredAction( $action_name ) { return true; }
    
    /** Mise à disposition d'une nouvelle action. */
    function registerAction( $action_name, $action_class, $action_classpath ) {}


    /** Déréférencement d'une action de module. */
    function unRegisterAction( $action_name ) {}


    /** Installation du module. */
    function install() {}


    /** Désinstallation du module. */
    function unInstall() {}


    /** Raccourci
     */
    function hasErrors() {
        return $this->_errstack->hasErrors();
    }

# ---- ACCESSEURS / MUTATEURS


# ---- METHODES PRIVEES

    /** Fabrique d'Actions */
    function _makeAction( $action_name, $params = null ) {
        $a =& Module_Action_Factory::make( $this->name, $action_name, $params );
        return $a;
    }


    /** */
    function _addExecutedAction( &$action ) {
        $this->_executedActions[] = $action;
    }

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

    /** Initialisation */
    function __init() {
        // Error Handling
        // Modules use their own ErrorStack
        $this->_errstack =& PEAR_ErrorStack::singleton( $this->name );
        $log =& Log::singleton( 'file' );
    }

    
    
}
?>