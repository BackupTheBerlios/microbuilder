<?php
/** Déclaration de la classe MicroBuilder_ModuleAction_Base
 * @version    $Id: Base.php,v 1.3 2004/07/15 17:28:22 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */


/** Action de module.
 * @package    core
 * @abstract
 */
class MicroBuilder_ModuleAction_Base  {

# ---- PROPRIETES

    /** Action name. (case sensitive)
     * @var string
     * @access public */
    var $__name;

    /** Action summary.
     * @var string
     * @access public */
    var $__summary;

    /** Module on which depends the action.
     * @var string
     * @access public */
    var $__module;

    /** Action parameters.
     * array should look like this:
     * <code>
     * array( 'required_param' => '',
     *        'opt_param' => array('DEFAULT' => 'defaultval',
     *                              // In order to match param value against a regex
     *                             'REGEX'   => '/regex/' ) )
     *        
     * </code>
     *
     * @var array
     * @access public */
    var $__args;


# ---- METHODES PUBLIQUES

    /** Constructor. */
    function MicroBuilder_ModuleAction_Base () {}

    /** Executes action.
     * @param      array      $params
     * @abstract   This method HAS to be overriden by child classes.
     */
    function execute( $params = null ) {}

       

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /** Check params.
     * @var     array     $params */
    function _checkParams( &$params ) {
        foreach( $this->__args as $name => $val ) {

            // Deal with unfilled parameters
            if ( ! isset($params[$name]) || empty($params[$name]) ) {
            
                // Set default val if available
                if ( ! empty($this->__args[$name]['DEFAULT']) )
                    $params[$name] = $this->__args[$name]['DEFAULT'];

                // if no default val: error
                else {
                    $errstack =& PEAR_ErrorStack::singleton( $this->__module );
                    $errstack->push( MB_MISSING_ACTION_ARG,
                                     'error',
                                     array( 'name' => $name )
                                      );
                    return null;
                }
            }

            // Check parameters that should match a REGEX
            else {
                if ( isset($this->__args[$name]['REGEX']) ) {
                    if ( ! preg_match($this->__args[$name]['REGEX'], $params[$name]) ) {
                        $errstack =& PEAR_ErrorStack::singleton( $this->__module );
                        $errstack->push( MB_INVALID_ACTION_ARG,
                                         'error',
                                         array( 'module' => $this->__module,
                                                'action' => $this->__name,
                                                'name' => $name,
                                                'val' => $params[$name], 
                                                'regex' => $this->__args[$name]['REGEX'],
                                                'default' => $this->__args[$name]['DEFAULT'] )
                                         );
                        return null;
                    }
                }
            }
        }
        
        return true;
        
    }
    

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }

        
    
}
?>