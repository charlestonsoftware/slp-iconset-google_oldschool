<?php
/**
 * Plugin Name: Store Locator Plus : Icon Set Google Old School
 * Plugin URI: http://www.charlestonsw.com/products/store-locator-plus-icon-set/
 * Description: A premium add-on pack for Store Locator Plus that adds more icons to the icon pickers.
 * Version: 0.1
 * Author: Charleston Software Associates
 * Author URI: http://charlestonsw.com/
 * Requires at least: 3.3
 * Test up to : 3.5
 *
 * Text Domain: csl-slplus
 * Domain Path: /languages/
 *
 * @package StoreLocatorPlus
 * @category UserInterfaces
 * @author Charleston Software Associates
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// No SLP? Get out...
//
if ( !in_array( 'store-locator-le/store-locator-le.php', apply_filters( 'active_plugins', get_option('active_plugins')))) {
    return;
}

// If we have not been here before, let's get started...
//
if ( ! class_exists( 'SLPIconSet_GoogleOldSchool' ) ) {
    class SLPIconSet_GoogleOldSchool {
        public  $plugin = null;
        function __construct() {
            add_filter('slp_icon_directories'          ,array($this,'add_icon_directory')        ,10);
        }

        /**
         * Set the plugin property to point to the primary plugin object.
         *
         * Returns false if we can't get to the main plugin object.
         *
         * @global wpCSL_plugin__slplus $slplus_plugin
         * @return boolean true if plugin property is valid
         */
        function setPlugin() {
            if (!isset($this->plugin) || ($this->plugin == null)) {
                global $slplus_plugin;
                $this->plugin = $slplus_plugin;
            }
            return (isset($this->plugin) && ($this->plugin != null));
        }

        /**
         * Add our icon directory to the list used by SLP.
         *
         * @param array $directories - array of directories.
         */
        function addIconDirectory($directories) {
            $directories = array_merge($directories,array(plugin_dir_path(__FILE__)));
            return $directories;
        }
    }

   global $slplus_plugin;
   $slplus_plugin->IconSet['google_oldschool'] = new SLPIconSet_GoogleOldSchool();
}