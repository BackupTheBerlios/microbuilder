<?php
/** Déclaration de la classe MicroBuilder_PageController
 * @version    $Id: PageController.php,v 1.1 2004/07/13 02:09:48 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */


/***/
require_once 'PEAR/ErrorStack.php';
require_once 'Log.php';
require_once 'Config.php';
require_once 'core/MicroBuilder/Module/Factory.php';
require_once 'core/MicroBuilder/Theme/Factory.php';

/** Front controller des sites MicroBuilder
 * @package    core
 * @uses       MicroBuilder_Page
 * @uses       ModuleAction_Factory
 * @uses       ModuleAction_Renderer_Factory
 */
class MicroBuilder_PageController  {

# ---- PROPRIETES

    /** URI appelée par le client.
     * @var string */
    var $_request_uri = null;
    
    /** Stockage des données envoyées par le client.
     * @var array */
    var $_request_data = array();

    /** Instance de la page à constituer
     * @var object MicroBuilder_Page */
    var $_page = null;


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Microbuilder_PageController () {
        $this->__init();
        if ( $this->_errstack->hasErrors() ) {
            $err = $this->_errstack->pop();
            die( $err['message'] );
        }
    }


    /** Exécution du contrôleur. 
     */
    function start() {
        // Initialisation
        //        $this->__init();

        // Exécution de l'action demandée
        $module =& MicroBuilder_Module_Factory::make( $_GET['module'] );
        $module->executeAction( $_GET['action'], $_GET );

        if ( $module->hasErrors() ) {
            $err =& $module->_errstack->pop();
            $this->_page->addContent( $err['message'] );
        }
        
        else {
            $this->_page->addContent( $module->toString() );
        }
        $this->_page->build();

        $this->_page->display();
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }


    /** Initialisation.
     */
    function __init() {

        // Error Handling
        $this->_errstack =& PEAR_ErrorStack::singleton( 'MicroBuilder' );
        $logpath = '/var/www/localhost/mb/logs/error.log';
        $log =& Log::singleton( 'file',$logpath, 'MicroBuilder error log' );
        PEAR_ErrorStack::setDefaultLogger( $log );
           

        // Load config
        $this->conf =& new Config;
        $this->conf->parseConfig( '/var/www/localhost/mb/conf/microbuilder-conf.ini', 'GenericConf' );
        //        print_r( $this->conf );

        // Theme
        $this->_page =& MicroBuilder_Theme_Factory::make( 'Default' );


        // Request data
        $this->_request_uri = $_SERVER['REQUEST_URI'];
        $this->_request_data['GET'] = $_GET;
    }
    
}
?>