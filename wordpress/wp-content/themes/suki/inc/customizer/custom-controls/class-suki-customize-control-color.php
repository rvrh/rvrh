<?php
/**
 * Customizer custom control: Color
 *
 * @package Suki
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Suki_Customize_Control_Color' ) ) :
/**
 * Custom color control class
 */
class Suki_Customize_Control_Color extends Suki_Customize_Control {
	/**
	 * @var string
	 */
	public $type = 'suki-color';

	/**
	 * @var array
	 */
	public $palette = array();

	/**
	 * Setup parameters for content rendering by Underscore JS template.
	 */
	public function to_json() {
		parent::to_json();

		$this->json['name'] = $this->id;
		$this->json['default'] = $this->setting->default;
		$this->json['value'] = $this->value();

		$this->json['__link'] = $this->get_link();
	}

	/**
	 * Enqueue additional control's CSS or JS scripts.
	 */
	public function enqueue() {
		wp_enqueue_script( 'wp-color-picker-alpha' );
	}

	/**
	 * Render Underscore JS template for this control's content.
	 */
	protected function content_template() {
		?>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
		<div class="customize-control-content">
			<input value="{{ data.value }}" type="text" maxlength="30" class="color-picker-hex" placeholder="<?php esc_attr_e( 'Hex / RGBA', 'suki' ); ?>" data-default-color="{{ data.default }}"" data-alpha="true"  data-custom-width="false" {{{ data.__link }}}>
		</div>
		<?php
	}
}

// Register control type.
$wp_customize->register_control_type( 'Suki_Customize_Control_Color' );
endif;