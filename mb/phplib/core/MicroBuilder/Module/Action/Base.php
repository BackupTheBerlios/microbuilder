<?php
/** Déclaration de la classe MicroBuilder_ModuleAction_Base
 * @version    $Id: Base.php,v 1.2 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

define( "MB_MISSING_ACTION_ARG", 1 );

/** Action de module.
 * @package    core
 * @abstract
 */
class MicroBuilder_ModuleAction_Base  {

# ---- PROPRIETES
    var $__name;
    var $__summary;
    var $__args;
    var $__module;

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ModuleAction_Base () {}

    /** Exécution de l'action. */
    function execute( $params = null ) {}

       

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Check params 
     * @var     array     $params */
    function _checkParams( &$params ) {
        foreach( $this->__args as $name => $val ) {
            // Deal with unfilled parameters
            if ( ! isset($params[$name]) || empty($params[$name]) ) {
                // Set default val if available
                if ( ! empty($this->__args[$name]) ) 
                    $params[$name] = $this->__args[$name];

                // if no default val: error
                else {
                    $errstack =& PEAR_ErrorStack::singleton( $this->__module );
                    $errstack->push( MB_MISSING_ACTION_ARG,
                                     'error',
                                     array( 'arg' => $name ),
                                     "Missing required parameter '$name'." );
                    return null;
                }
            }
        }
        
        return true;
        
    }
    

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>