<?php

namespace EGFW;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin {

	/**
	 * @var Plugin|null
	 */
	private static $instance = null;

	/**
	 * @return Plugin
	 */
	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function init() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'elementor_missing_notice' ) );
			return;
		}

		if ( ! $this->is_gravity_forms_loaded() ) {
			add_action( 'admin_notices', array( $this, 'gravity_forms_missing_notice' ) );
		}

		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_styles' ) );
		add_action( 'elementor/editor/before_enqueue_styles', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
	}

	/**
	 * @return bool
	 */
	private function is_gravity_forms_loaded() {
		return class_exists( '\GFAPI' ) && function_exists( 'gravity_form' );
	}

	/**
	 * @param \Elementor\Widgets_Manager $widgets_manager Widget manager.
	 */
	public function register_widgets( $widgets_manager ) {
		require_once EGFW_PLUGIN_PATH . 'includes/widgets/class-egfw-gravity-form-widget.php';

		$widgets_manager->register( new Widgets\Gravity_Form_Widget() );
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			'egfw-widget',
			EGFW_PLUGIN_URL . 'assets/css/widget.css',
			array(),
			EGFW_VERSION
		);
	}

	public function elementor_missing_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		printf(
			'<div class="notice notice-warning"><p>%s</p></div>',
			esc_html__( 'Elementor Gravity Forms Widget requires Elementor to be installed and activated.', 'elementor-gf-widget' )
		);
	}

	public function gravity_forms_missing_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		printf(
			'<div class="notice notice-warning"><p>%s</p></div>',
			esc_html__( 'Elementor Gravity Forms Widget requires Gravity Forms to render forms.', 'elementor-gf-widget' )
		);
	}
}
