<?php
/**
 * Widget Base Class.
 *
 *
 * @package Widget_Base
 * @version 1..0.0
 */

/**
 * Core class for widget base.
 *
 * @since 1.0.0
 */
class Bazzinga_Widget_Base extends WP_Widget {

	/**
	 * Fields.
	 *
	 * @since 1.0.0
	 * @access private
	 * @var array
	 */
	private $fields;

	/**
	 * PHP5 constructor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $id_base         Optional Base ID for the widget.
	 * @param string $name            Name for the widget.
	 * @param array  $widget_options  Optional. Widget options.
	 * @param array  $control_options Optional. Widget control options.
	 * @param array  $fields Fields.
	 */
	function __construct( $id_base, $name, $widget_options = array(), $control_options = array(), $fields = array() ) {

		$this->fields = $fields;

		parent::__construct( $id_base, $name, $widget_options, $control_options );

	}

	/**
	 * This method should be implemented in the extended class.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args     Display arguments.
	 * @param array $instance Settings for the current widget instance.
	 */
	function widget( $args, $instance ) {

	}

	/**
	 * Updates a particular instance of a widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance.
	 * @param array $old_instance Old settings for this instance.
	 * @return array Settings to save or bool false to cancel saving.
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		foreach ( $this->fields as $key => $field ) {

			$instance[ $key ] = $this->sanitize( $key, $field, $new_instance[ $key ] );

		}

		return $instance;

	}

	/**
	 * Sanitize field value.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param string $key   Field key.
	 * @param array  $field Field.
	 * @param mixed  $value Raw value.
	 * @return mixed Sanitized value.
	 */
	private function sanitize( $key, $field, $value ) {

		$field_type = 'text';
		if ( isset( $field['type'] ) ) {
			$field_type = esc_attr( $field['type'] );
		}
		if ( ! isset( $field['default'] ) ) {
			$field['default'] = null;
		}

		$output  = null;

		if ( isset( $field['sanitize_callback'] ) && is_callable( $field['sanitize_callback'] ) ) {
			$output = call_user_func( $field['sanitize_callback'], $key, $field, $value );
			return $output;
		}

		switch ( $field_type ) {
			case 'text':
				$output = sanitize_text_field( $value );
				break;
			case 'image':
			case 'url':
				$output = esc_url_raw( $value );
				break;
			case 'email':
				$output = sanitize_email( $value );
				break;
			case 'number':
				if ( isset( $field['absolute'] ) && true === $field['absolute'] ) {
					$number = absint( $value );
				} else {
					$number = intval( $value );
				}
				$min    = ( isset( $field['min'] ) ? $field['min'] : $number );
				$max    = ( isset( $field['max'] ) ? $field['max'] : $number );
				$step   = ( isset( $field['step'] ) ? $field['step'] : 1 );
				if ( $min === $max ) {
					// Simple number.
					$output = ( $number ) ? $number : $field['default'];
				} else {
					// Number range.
					$output = $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $field['default'];
				}
				break;
			case 'select':
			case 'checkbox':
				$output = ! empty( $value );
				break;
			case 'dropdown-taxonomies':
				$output = absint( $value );
				break;
			default:
				$output = esc_attr( $value );
				break;
		}
		return $output;

	}

	/**
	 * Sanitize field value.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param string $key   Field key.
	 * @param array  $field Field.
	 * @param array  $instance Widget instance.
	 * @return void
	 */
	private function render_field( $key, $field, $instance ) {

		$value = null;
		if ( isset( $instance[ $key ] ) ) {
			$value = $instance[ $key ];
		}
		$field_type = 'text';
		if ( isset( $field['type'] ) ) {
			$field_type = esc_attr( $field['type'] );
		}
		if ( ! isset( $field['class'] ) ) {
			$field['class'] = '';
		}
		if ( ! isset( $field['placeholder'] ) ) {
			$field['placeholder'] = '';
		}
		if ( ! isset( $field['css'] ) ) {
			$field['css'] = '';
		}
		if ( ! isset( $field['description'] ) ) {
			$field['description'] = '';
		}
		if ( ! isset( $field['readonly'] ) ) {
			$field['readonly'] = false;
		}
		if ( ! isset( $field['options'] ) ) {
			$field['options'] = array();
		}
		if ( ! isset( $field['rows'] ) || absint( $field['rows'] ) < 1 ) {
			$field['rows'] = 4;
		}
		switch ( $field_type ) {
			case 'text':
			case 'url':
			case 'number':
			case 'email':
				?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>">
	                    <span class="field-label"><strong><?php echo esc_html( $field['label'] ); ?></strong></span>
                    </label>
                    <input
                    type="<?php echo esc_attr( $field_type ); ?>"
                    id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>"
                    value="<?php echo esc_attr( $value ); ?>"
                    class="<?php echo esc_attr( $field['class'] ); ?>"
                    style="<?php echo esc_attr( $field['css'] ); ?>"
                    placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>"
                    <?php echo ( isset( $field['min'] ) ) ? ' min="' . esc_attr( $field['min'] ). '" ' : '' ; ?>
                    <?php echo ( isset( $field['max'] ) ) ? ' max="' . esc_attr( $field['max'] ). '" ' : '' ; ?>
                    <?php echo ( isset( $field['step'] ) ) ? ' step="' . esc_attr( $field['step'] ). '" ' : '' ; ?>
                    <?php echo ( true === $field['readonly'] ) ? ' readonly ' : '' ; ?>
                    />

                    <?php $this->render_description( $field, $this->get_field_id( $key ) ); ?>

                </p>
                <?php
				break;

			case 'checkbox':
				?>
                <p>
                    <input
                    type="checkbox"
                    id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>"
                    class="<?php echo esc_attr( $field['class'] ); ?>"
                    style="<?php echo esc_attr( $field['css'] ); ?>"
                    <?php checked( ! empty( $value ) ); ?>
                    />
                    <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>">
                    	<span class="field-label"><?php echo esc_html( $field['label'] ); ?></span>
                    </label>
                    <?php $this->render_description( $field, $this->get_field_id( $key ) ); ?>
                </p>
                <?php
				break;

			case 'select':
				?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>">
	                    <span class="field-label"><strong><?php echo esc_html( $field['label'] ); ?></strong></span>
                    </label>
                    <select
                    type="text"
                    id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
                    name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>"
                    class="<?php echo esc_attr( $field['class'] ); ?>"
                    style="<?php echo esc_attr( $field['css'] ); ?>"
                    >
                    <?php if ( ! empty( $field['options'] ) ) : ?>
                    	<?php foreach ( $field['options'] as $option_key => $label ) : ?>
		                    <option value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?>><?php echo esc_html( $label ); ?></option>
                    	<?php endforeach; ?>
                    <?php endif; ?>

                    </select>
                    <?php $this->render_description( $field, $this->get_field_id( $key ) ); ?>
                </p>
                <?php
				break;

			case 'dropdown-taxonomies':
				$args                    = array();
				$args['selected']        = esc_attr( $value );
				$args['taxonomy']        = ( isset( $field['taxonomy'] ) ) ? esc_attr( $field['taxonomy'] ) : 'category' ;
				$args['name']            = esc_attr( $this->get_field_name( $key ) );
				$args['id']              = esc_attr( $this->get_field_id( $key ) );
				$args['show_option_all'] = ( isset( $field['show_option_all'] ) ) ? esc_html( $field['show_option_all'] ) : '' ;
				$args['class']           = ( isset( $field['class'] ) ) ? esc_attr( $field['class'] ) : '' ;
				?>
                <p>
                    <label for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>">
	                    <span class="field-label"><strong><?php echo esc_html( $field['label'] ); ?></strong></span>
                    </label>
                    <?php wp_dropdown_categories( $args ); ?>
                    <?php $this->render_description( $field, $this->get_field_id( $key ) ); ?>
                </p>
                <?php
				break;

			default:
				break;
		}
	}

	/**
	 * Outputs the settings update form.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 * @return void
	 */
	public function form( $instance ) {

		$instance = $this->add_defaults( $instance );

		foreach ( $this->fields as $key => $field ) {

			$this->render_field( $key, $field, $instance );

		}

	}

	/**
	 * Outputs the field description.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param array  $field Field.
	 * @param string $id ID of the field.
	 * @return void
	 */
	private function render_description( $field, $id = '' ) {

		if ( ! isset( $field['description'] ) && empty( $field['description'] ) ) {
			return;
		}
		$custom_style = 'clear:both;display:block;';
		if ( isset( $field['adjacent'] ) && true === $field['adjacent'] ) {
			$custom_style = 'margin-left:5px;';
		}

		?>
		<label for="<?php echo esc_attr( $id ); ?>" style="<?php echo esc_attr( $custom_style ); ?>">
			<span class="field-description"><em><?php echo esc_html( $field['description'] ); ?></em></span>
		</label>
		<?php

	}

	/**
	 * Return updated instance with defaults.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @param array $instance Widget instance.
	 * @return array Updated instance.
	 */
	private function add_defaults( $instance ) {

		$default_arr = array();
		if ( ! empty( $this->fields ) ) {
			foreach ( $this->fields as $key => $field ) {
				$default_arr[ $key ] = null;
				if ( ! isset( $instance[ $key ] ) && isset( $field['default'] ) ) {
					$default_arr[ $key ] = $field['default'];
				}
			}
		}
		$instance = array_merge( $default_arr, $instance );

		return $instance;

	}

	/**
	 * Returns widget parameters.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $instance Widget instance.
	 * @return array Parameters.
	 */
	public function get_params( $instance ) {

		$output = array();
		if ( ! empty( $this->fields ) ) {
			if ( isset( $instance['title'] ) ) {
				$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			}
			$output = $this->add_defaults( $instance );
		}
		return $output;

	}

}
