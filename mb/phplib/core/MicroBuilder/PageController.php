<?php
/** Déclaration de la classe MicroBuilder_PageController
 * @version    $Id: PageController.php,v 1.2 2004/07/13 02:17:53 mbertier Exp $
 * @author     Tristan Rivoallan <mbertier@parishq.net>
 * @license    GPL
 */


/***/
require_once 'PEAR/ErrorStack.php';
require_once 'Log.php';
require_once 'Config.php';
require_once 'core/MicroBuilder/ErrorCallback.php';
require_once 'core/MicroBuilder/Module/Factory.php';
require_once 'core/MicroBuilder/Module/Block/Factory.php';
require_once 'core/MicroBuilder/Theme/Factory.php';
require_once 'core/MicroBuilder/UI.php';

/** Front controller des sites MicroBuilder
 * @package    core
 * @uses       PEAR_ErrorStack
 * @uses       Log
 * @uses       Config
 * @uses       MicroBuilder_Module_Factory
 * @uses       MicroBuilder_Theme_Factory
 */
class MicroBuilder_PageController  {

# ---- SLOTS

    /** Error stack 
     * @var object PEAR_ErrorStack */
    var $err = null;

    /** Config 
     * @var object Config */
    var $conf = null;

    /** Theme 
     * @var object MicroBuilder_Theme */
    var $theme = null;

# ---- PROPRIETES


# ---- METHODES PUBLIQUES

    /** Constructeur. */
    function Microbuilder_PageController () {
        $this->__init();
    }


    /** Exécution du contrôleur. 
     */
    function start() {

        // Parse request data
        $req_data = $this->_parseRequestData( $_GET );

        // Instanciate requested module
        $module =& MicroBuilder_Module_Factory::make( $req_data['module'] );

        // Check if anything went wrong during module creation
        if ( $this->err->hasErrors() ) {
            $err = $this->err->pop();
            $msg = '<p class="error">Error while loading module \''. $req_data['module'].'\': ' . $err['message'] . '</p>';
            $this->theme->addToMain( $msg );
        } else {
            
            // Execute requested action
            $module->executeAction( $req_data['action'], $req_data );

            // If something went wrong, display error message.
            if ( $module->hasErrors() ) {
                $err =& $module->err->pop();
                $this->theme->addToMain( '<p class="error">' .$err['message']. '</p>' );
            }
        
            // Else add module to theme
            else {
                $this->theme->addToMain( $module );
            }
        }

        // Navigation menu
        // DIRTY -- use accessor
        $this->theme->_navItems = $this->ui->getNavItems();
        
        // Blocks
        foreach ( $this->ui->getBlocks() as $module => $blocks ) {
            foreach ( $blocks as $block ) {
                $b_obj =& MicroBuilder_ModuleBlock_Factory::make( $module, $block );
                
                // Check for errors and display error in place of block if any
                if ( $this->err->hasErrors() ) {
                    $err_block =& MicroBuilder_ModuleBlock_Factory::makeCoreBlock( 'ErrorBlock' );
                    $err_block->setError( $this->err->pop() );
                    $err_block->setName( $block );
                    $this->theme->addBlock( $err_block );
                }
                
                // If no error: add block to page
                else 
                    $this->theme->addBlock( $b_obj );
            }
        }
        
        // Build & display page
        $this->theme->build();
        $this->theme->display();
    }

# ---- ACCESSEURS / MUTATEURS



# ---- METHODES PRIVEES

    /* ZE2 compatibility trick*/
    function __clone() { return $this; }


    /** Parses request data */
    function _parseRequestData( $data ) {
        // Set default module if none requested
        if ( ! isset($data['module']) ) 
            $data['module'] = $this->conf['root']['default_module'];
        
        if ( ! isset($data['action']) ) $data['action'] = null;

        return $data;
    }

    /** Initialisation.
     *   - setup error handling
     *   - load configuration data
     *   - set up theme
     */
    function __init() {

        // Load config
        $conf =& new Config;
        //        $conf->parseConfig( '/home/mbertier/dev/htdocs/mb/conf/microbuilder-conf.ini', 'GenericConf' );
        $conf->parseConfig( '/var/www/localhost/mb/conf/microbuilder-conf.ini', 'GenericConf' );
        $confroot =& $conf->getRoot();
        $this->conf =& $confroot->toArray();


        // Error Handling
        $this->err =& PEAR_ErrorStack::singleton( 'MicroBuilder' );

        // -- Callback
        $errcallback =& new MicroBuilder_ErrorCallback;
        $this->err->setDefaultCallback( array(&$errcallback, 'errorCallback') );

        // -- Logger
        $logpath = $this->conf['root']['log_file'];
        $log =& Log::singleton( 'file',$logpath, 'MicroBuilder error log' );
        PEAR_ErrorStack::setDefaultLogger( $log );
           

        // Theme
        // -- UI description
        $this->ui =& new MicroBuilder_UI;

        // -- Theme object
        $this->theme =& MicroBuilder_Theme_Factory::make( $this->conf['root']['default_theme'] );
        $this->theme->setTitle( $this->conf['root']['site_name']);

    }
    
}
?>