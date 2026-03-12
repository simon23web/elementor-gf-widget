<?php

namespace EGFW\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gravity_Form_Widget extends Widget_Base {

	public function get_name() {
		return 'egfw_gravity_form';
	}

	public function get_title() {
		return esc_html__( 'Gravity Form Styler', 'elementor-gf-widget' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_keywords() {
		return array( 'gravity forms', 'form', 'gf' );
	}

	public function get_categories() {
		return array( 'general' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_form',
			array(
				'label' => esc_html__( 'Form', 'elementor-gf-widget' ),
			)
		);

		$this->add_control(
			'form_id',
			array(
				'label'       => esc_html__( 'Select Form', 'elementor-gf-widget' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => $this->get_form_options(),
				'default'     => '',
				'description' => esc_html__( 'Forms are loaded from Gravity Forms.', 'elementor-gf-widget' ),
			)
		);

		$this->add_control(
			'show_title',
			array(
				'label'        => esc_html__( 'Show Title', 'elementor-gf-widget' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-gf-widget' ),
				'label_off'    => esc_html__( 'No', 'elementor-gf-widget' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'show_description',
			array(
				'label'        => esc_html__( 'Show Description', 'elementor-gf-widget' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-gf-widget' ),
				'label_off'    => esc_html__( 'No', 'elementor-gf-widget' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'ajax',
			array(
				'label'        => esc_html__( 'Enable Ajax', 'elementor-gf-widget' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'elementor-gf-widget' ),
				'label_off'    => esc_html__( 'No', 'elementor-gf-widget' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'submission_method',
			array(
				'label'       => esc_html__( 'Submission Method', 'elementor-gf-widget' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => '',
				'options'     => array(
					''         => esc_html__( 'Default', 'elementor-gf-widget' ),
					'postback' => esc_html__( 'Postback', 'elementor-gf-widget' ),
					'iframe'   => esc_html__( 'Iframe', 'elementor-gf-widget' ),
					'ajax'     => esc_html__( 'Ajax', 'elementor-gf-widget' ),
				),
				'description' => esc_html__( 'Requires Gravity Forms 2.9+ to apply.', 'elementor-gf-widget' ),
			)
		);

		$this->add_control(
			'tabindex',
			array(
				'label'   => esc_html__( 'Tab Index Start', 'elementor-gf-widget' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 0,
				'min'     => 0,
				'step'    => 1,
			)
		);

		$this->add_control(
			'field_values',
			array(
				'label'       => esc_html__( 'Dynamic Field Values', 'elementor-gf-widget' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => '',
				'placeholder' => 'first_name=Simon&last_name=Piggott',
				'description' => esc_html__( 'Query string format used for dynamic population.', 'elementor-gf-widget' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_theme',
			array(
				'label' => esc_html__( 'Theme Framework', 'elementor-gf-widget' ),
			)
		);

		$this->add_control(
			'theme',
			array(
				'label'   => esc_html__( 'Theme', 'elementor-gf-widget' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'orbital',
				'options' => array(
					'orbital' => esc_html__( 'Orbital', 'elementor-gf-widget' ),
					'gravity' => esc_html__( 'Gravity (Legacy)', 'elementor-gf-widget' ),
				),
			)
		);

		$this->add_control(
			'input_size',
			array(
				'label'     => esc_html__( 'Input Size', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'md',
				'options'   => array(
					'sm' => esc_html__( 'Small', 'elementor-gf-widget' ),
					'md' => esc_html__( 'Medium', 'elementor-gf-widget' ),
					'lg' => esc_html__( 'Large', 'elementor-gf-widget' ),
				),
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'input_border_radius',
			array(
				'label'     => esc_html__( 'Input Border Radius', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'min'       => 0,
				'step'      => 1,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'input_border_color',
			array(
				'label'     => esc_html__( 'Input Border Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'input_background_color',
			array(
				'label'     => esc_html__( 'Input Background Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'input_color',
			array(
				'label'     => esc_html__( 'Input Text Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'input_primary_color',
			array(
				'label'     => esc_html__( 'Input Primary Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'label_font_size',
			array(
				'label'     => esc_html__( 'Label Font Size', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'min'       => 8,
				'step'      => 1,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'label_color',
			array(
				'label'     => esc_html__( 'Label Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'description_font_size',
			array(
				'label'     => esc_html__( 'Description Font Size', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'min'       => 8,
				'step'      => 1,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'description_color',
			array(
				'label'     => esc_html__( 'Description Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'button_primary_background_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'button_primary_color',
			array(
				'label'     => esc_html__( 'Button Text Color', 'elementor-gf-widget' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->add_control(
			'custom_styles_json',
			array(
				'label'       => esc_html__( 'Custom Styles JSON', 'elementor-gf-widget' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => '',
				'description' => esc_html__( 'Optional JSON object merged into Gravity Forms style settings.', 'elementor-gf-widget' ),
				'condition'   => array(
					'theme' => 'orbital',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * @return array<string, string>
	 */
	private function get_form_options() {
		if ( ! class_exists( '\GFAPI' ) ) {
			return array(
				'' => esc_html__( 'Gravity Forms not active', 'elementor-gf-widget' ),
			);
		}

		$options = array(
			'' => esc_html__( 'Select a form', 'elementor-gf-widget' ),
		);

		try {
			$forms = \GFAPI::get_forms();
		} catch ( \Throwable $e ) {
			return $options;
		}

		if ( ! is_array( $forms ) ) {
			return $options;
		}

		foreach ( $forms as $form ) {
			$form_id    = isset( $form['id'] ) ? (string) $form['id'] : '';
			$form_title = isset( $form['title'] ) ? (string) $form['title'] : '';
			if ( '' === $form_id || '' === $form_title ) {
				continue;
			}

			$options[ $form_id ] = sprintf(
				/* translators: %1$s: form title, %2$d: form ID */
				esc_html__( '%1$s (ID: %2$d)', 'elementor-gf-widget' ),
				$form_title,
				(int) $form_id
			);
		}

		return $options;
	}

	/**
	 * @param string $raw Field values query string.
	 * @return array<string, string>
	 */
	private function parse_field_values( $raw ) {
		$raw = trim( (string) $raw );
		if ( '' === $raw ) {
			return array();
		}

		$decoded = html_entity_decode( $raw, ENT_QUOTES, 'UTF-8' );
		parse_str( $decoded, $parsed );

		if ( ! is_array( $parsed ) ) {
			return array();
		}

		$values = array();

		foreach ( $parsed as $key => $value ) {
			if ( is_array( $value ) ) {
				continue;
			}

			$sanitized_key = preg_replace( '/[^A-Za-z0-9_-]/', '', (string) $key );
			if ( '' === $sanitized_key ) {
				continue;
			}

			$values[ $sanitized_key ] = sanitize_text_field( wp_unslash( (string) $value ) );
		}

		return $values;
	}

	/**
	 * @param array<string, mixed> $settings Elementor settings.
	 * @return array<string, mixed>
	 */
	private function build_style_settings( $settings ) {
		$style_settings = array();

		if ( ! empty( $settings['input_size'] ) && in_array( $settings['input_size'], array( 'sm', 'md', 'lg' ), true ) ) {
			$style_settings['inputSize'] = $settings['input_size'];
		}

		if ( isset( $settings['input_border_radius'] ) && '' !== (string) $settings['input_border_radius'] ) {
			$style_settings['inputBorderRadius'] = max( 0, (int) $settings['input_border_radius'] );
		}

		$color_map = array(
			'input_border_color'              => 'inputBorderColor',
			'input_background_color'          => 'inputBackgroundColor',
			'input_color'                     => 'inputColor',
			'input_primary_color'             => 'inputPrimaryColor',
			'label_color'                     => 'labelColor',
			'description_color'               => 'descriptionColor',
			'button_primary_background_color' => 'buttonPrimaryBackgroundColor',
			'button_primary_color'            => 'buttonPrimaryColor',
		);

		foreach ( $color_map as $setting_key => $style_key ) {
			if ( empty( $settings[ $setting_key ] ) ) {
				continue;
			}

			$sanitized_color = sanitize_hex_color( (string) $settings[ $setting_key ] );
			if ( $sanitized_color ) {
				$style_settings[ $style_key ] = $sanitized_color;
			}
		}

		if ( isset( $settings['label_font_size'] ) && '' !== (string) $settings['label_font_size'] ) {
			$style_settings['labelFontSize'] = max( 8, (int) $settings['label_font_size'] );
		}

		if ( isset( $settings['description_font_size'] ) && '' !== (string) $settings['description_font_size'] ) {
			$style_settings['descriptionFontSize'] = max( 8, (int) $settings['description_font_size'] );
		}

		if ( ! empty( $settings['custom_styles_json'] ) ) {
			$custom_styles = json_decode( (string) $settings['custom_styles_json'], true );

			if ( is_array( $custom_styles ) ) {
				foreach ( $custom_styles as $custom_key => $custom_value ) {
					if ( ! is_scalar( $custom_value ) ) {
						continue;
					}

					$sanitized_key = preg_replace( '/[^a-zA-Z0-9_]/', '', (string) $custom_key );
					if ( '' === $sanitized_key ) {
						continue;
					}

					if ( is_string( $custom_value ) ) {
						$style_settings[ $sanitized_key ] = sanitize_text_field( $custom_value );
						continue;
					}

					if ( is_bool( $custom_value ) || is_int( $custom_value ) || is_float( $custom_value ) ) {
						$style_settings[ $sanitized_key ] = $custom_value;
					}
				}
			}
		}

		return $style_settings;
	}

	/**
	 * @param string $value Requested submission method.
	 * @return string
	 */
	private function sanitize_submission_method( $value ) {
		$allowed = array( 'postback', 'iframe', 'ajax' );
		return in_array( $value, $allowed, true ) ? $value : '';
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$form_id  = isset( $settings['form_id'] ) ? absint( $settings['form_id'] ) : 0;

		if ( ! function_exists( 'gravity_form' ) ) {
			echo '<div class="egfw-widget-notice">' . esc_html__( 'Gravity Forms is not active. Activate Gravity Forms to render this widget.', 'elementor-gf-widget' ) . '</div>';
			return;
		}

		if ( $form_id <= 0 ) {
			echo '<div class="egfw-widget-notice">' . esc_html__( 'Select a Gravity Form in the widget settings.', 'elementor-gf-widget' ) . '</div>';
			return;
		}

		$show_title       = ! empty( $settings['show_title'] ) && 'yes' === $settings['show_title'];
		$show_description = ! empty( $settings['show_description'] ) && 'yes' === $settings['show_description'];
		$ajax             = ! empty( $settings['ajax'] ) && 'yes' === $settings['ajax'];
		$tabindex         = isset( $settings['tabindex'] ) ? max( 0, (int) $settings['tabindex'] ) : 0;
		$theme            = ! empty( $settings['theme'] ) ? sanitize_key( (string) $settings['theme'] ) : 'orbital';
		$field_values     = $this->parse_field_values( isset( $settings['field_values'] ) ? (string) $settings['field_values'] : '' );
		$style_settings   = 'orbital' === $theme ? $this->build_style_settings( $settings ) : array();
		$style_json       = ! empty( $style_settings ) ? wp_json_encode( $style_settings ) : null;

		$submission_method = $this->sanitize_submission_method( isset( $settings['submission_method'] ) ? (string) $settings['submission_method'] : '' );
		$submission_filter = null;

		if ( '' !== $submission_method ) {
			$submission_filter = static function( $form_args ) use ( $form_id, $submission_method ) {
				$target_id = isset( $form_args['form_id'] ) ? absint( $form_args['form_id'] ) : 0;

				if ( $target_id === $form_id ) {
					$form_args['submission_method'] = $submission_method;
				}

				return $form_args;
			};

			add_filter( 'gform_form_args', $submission_filter, 1000 );
		}

		echo '<div class="egfw-widget">';

		gravity_form(
			$form_id,
			$show_title,
			$show_description,
			false,
			$field_values,
			$ajax,
			$tabindex,
			true,
			$theme,
			$style_json
		);

		echo '</div>';

		if ( null !== $submission_filter ) {
			remove_filter( 'gform_form_args', $submission_filter, 1000 );
		}
	}
}
