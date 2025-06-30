<?php

/**
 * Plugin Name: UpTabs
 * Plugin URI: https://yourwebsite.com/your-plugin
 * Description: UpTabs  Widget designed to enhance the Elementor page builder experience with additional tab functionality.	
 * Version: 1.0.0
 * Author: Debuggers Studio
 * Author URI: https://yourwebsite.com
 * Text Domain: uptabs
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

// Define plugin constants
define('UPTABS_VERSION', '1.0.0');
define('UPTABS_PATH', plugin_dir_path(__FILE__));
define('UPTABS_URL', plugin_dir_url(__FILE__));
define('UPTABS_BASENAME', plugin_basename(__FILE__));

// Load the main plugin class
require_once UPTABS_PATH . 'includes/class-uptabs-loader.php';

// Initialize the plugin using singleton pattern after all plugins are loaded (after Elementor)
add_action('plugins_loaded', function () {
	UpTabs_Loader::instance();
}, 11);
