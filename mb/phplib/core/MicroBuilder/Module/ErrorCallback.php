<?php
/** Déclaration de la classe MicroBuilder__Module_ErrorCallback
 * @version    $Id: ErrorCallback.php,v 1.1 2004/07/15 17:35:47 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */



/***/
require_once 'PEAR/ErrorStack.php';


/** Description de la classe.
 * @package    core
 */
class MicroBuilder_Module_ErrorCallback  {

# ---- SLOTS
    var $_stack = null;

# ---- PROPRIETES
    /** Verbosity level
     * @var int */
    var $verbosity = 1;

    var $__module = '';

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_Module_ErrorCallback () {
        $this->_stack =& PEAR_ErrorStack::singleton( $this->__module );        
    }


    /** ErrorCallback */
    function errorCallback( $err ) {
        switch  ($err['level'] ) {
        case 'error':
            break;
        case 'fatal':
            $mbstack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
            $mbstack->push( 5, 'error', array(), "Fatal error during module execution" );
            break;
        }
    }

    



# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>