<?php
/** Déclaration de la classe MicroBuilder_ErrorCallback
 * @version    $Id: ErrorCallback.php,v 1.4 2004/07/15 17:28:22 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

/***/
require_once 'PEAR/ErrorStack.php';


/** Description de la classe.
 * @package    core
 */
class MicroBuilder_ErrorCallback  {

# ---- SLOTS
    var $_stack = null;

# ---- PROPRIETES
    /** Verbosity level
     * @var int */
    var $verbosity = 0;
    

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ErrorCallback () {
        $this->_stack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );        
    }


    /** ErrorCallback */
    function errorCallback( $err ) {
        switch  ($err['level'] ) {
        case 'error':
            break;
        case 'fatal':
            die( $err['message'] );
            break;
        }
    }



# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>