<?php
/** Déclaration de la classe MicroBuilder_ErrorCallback
 * @version    $Id: ErrorCallback.php,v 1.3 2004/07/14 23:56:12 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */

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
    var $verbosity = 1;
    

# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function MicroBuilder_ErrorCallback () {
        $this->_stack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );        
    }


    /** ErrorCallback */
    function errorCallback( $err ) {
        switch  ($err['level'] ) {
        case 'err':
            echo "kkk";
            if ( $this->verbosity == 1 ) print_r($err);
            break;
        case 'fatal':
            if ( $this->verbosity == 1 ) print_r($err);
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