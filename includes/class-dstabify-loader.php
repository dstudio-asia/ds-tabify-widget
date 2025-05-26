<?php
if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class DsTabify_Loader
{


	/**
	 * widget Version
	 *
	 * @since 1.0.0
	 * @var string The widget version.
	 */

	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the widget.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '3.5.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the widget.
	 */

	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 */

	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function __construct()
	{

		if ($this->is_compatible()) {
			add_action('elementor/init', [$this, 'init']);
		}
	}

	public function deensimc_allowed_tags()
	{
		$allowed_tags = array(
			'strong' => array(),
		);
		return $allowed_tags;
	}

	/**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the widget requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function is_compatible()
	{

		// Check if Elementor installed and activated

		if (! did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return false;
		}

		// Check for required Elementor version

		if (! version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return false;
		}

		// Check for required PHP version

		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return false;
		}

		return true;
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function admin_notice_missing_main_plugin()
	{

		$message = sprintf(
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'dstabify'),
			'<strong>' . esc_html__('DsTabify', 'dstabify') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'dstabify') . '</strong>'

		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, $this->deensimc_allowed_tags()));
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function admin_notice_minimum_elementor_version()
	{

		$message = sprintf(
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'dstabify'),
			'<strong>' . esc_html__('DsTabify', 'dstabify') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'dstabify') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION

		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, $this->deensimc_allowed_tags()));
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function admin_notice_minimum_php_version()
	{

		$message = sprintf(
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'dstabify'),
			'<strong>' . esc_html__('DsTabify', 'dstabify') . '</strong>',
			'<strong>' . esc_html__('PHP', 'dstabify') . '</strong>',
			self::MINIMUM_PHP_VERSION

		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses($message, $this->deensimc_allowed_tags()));
	}

	/**
	 * Initialize
	 *
	 * Load the widgets functionality only after Elementor is initialized.
	 *
	 * Fired by `elementor/init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */

	public function init()
	{

		add_action('elementor/frontend/after_enqueue_styles', [$this, 'tabify_enqueue_frontend_styles']);
		add_action('elementor/frontend/after_register_scripts', [$this, 'tabify_enqueue_frontend_scripts']);
		add_action('elementor/widgets/register', [$this, 'tabify_register_widgets']);
		add_action('elementor/editor/before_enqueue_styles', [$this, 'tabify_enqueue_editor_styles']);
	}



	public function tabify_register_widgets($widgets_manager)
	{
		require_once DSTABIFY_PATH . 'includes/class-dstabify-widget.php';
		$widgets_manager->register(new DsTabify_Widget());
	}

	public function tabify_enqueue_frontend_styles()
	{
		wp_enqueue_style('dstabify-style-frontend', DSTABIFY_URL . 'assets/css/frontend.css', array(), DSTABIFY_VERSION);
	}

	public function tabify_enqueue_frontend_scripts()
	{
		wp_enqueue_script('dstabify-script-frontend', DSTABIFY_URL . 'assets/js/frontend.js', array('jquery'), DSTABIFY_VERSION, true);
	}

	public function tabify_enqueue_editor_styles()
	{
		wp_enqueue_style('dstabify-editor', DSTABIFY_URL . 'assets/css/editor.css', array(), DSTABIFY_VERSION);
	}
}
