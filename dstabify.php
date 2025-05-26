<?php

/**
 * Plugin Name: DsTabify
 * Plugin URI: https://yourwebsite.com/your-plugin
 * Description: DsTabify  Widget designed to enhance the Elementor page builder experience with additional tab functionality.	
 * Version: 1.0.0
 * Author: Debuggers Studio
 * Author URI: https://yourwebsite.com
 * Text Domain: dstabify
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

// Define plugin constants
define('DSTABIFY_VERSION', '1.0.0');
define('DSTABIFY_PATH', plugin_dir_path(__FILE__));
define('DSTABIFY_URL', plugin_dir_url(__FILE__));
define('DSTABIFY_BASENAME', plugin_basename(__FILE__));

// Load the main plugin class
require_once DSTABIFY_PATH . 'includes/class-dstabify-loader.php';

// Initialize the plugin using singleton pattern after all plugins are loaded (after Elementor)
add_action('plugins_loaded', function () {
	DsTabify_Loader::instance();
}, 11);
