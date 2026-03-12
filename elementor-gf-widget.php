<?php

/**
 * Plugin Name: Elementor Gravity Forms Widget
 * Description: Adds an Elementor widget for rendering and styling Gravity Forms using the Theme Framework style settings.
 * Version: 0.1.0
 * Author: 23Web
 * Author URI: https://www.23web.dev
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: elementor-gf-widget
 */

if (! defined('ABSPATH')) {
	exit;
}

define('EGFW_VERSION', '0.1.0');
define('EGFW_PLUGIN_FILE', __FILE__);
define('EGFW_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('EGFW_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once EGFW_PLUGIN_PATH . 'includes/class-egfw-plugin.php';

\EGFW\Plugin::instance();
