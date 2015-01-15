<?php
/**
* Plugin Name: Reddit Links Shortcake
*/

add_action( 'init', function() {

	/**
	* Register your shortcode as you would normally.
	* This is a simple example for a Reddit Links widget with some options.
	*/
	add_shortcode( 'redditlinks', function( $attr, $content = '' ) {

		$attr = wp_parse_args( $attr, array(
			'count' => 5,
			'range' => 'week',
			'domain' => 'fusion.net'
		) );

		$reddit_url = 'http://www.reddit.com/domain/' . $attr['domain'] . '/hot/.embed?limit=' . $attr['count'] . '&t=' . $attr['range'];

		ob_start();

		?>

		<script src="<?php echo esc_url( $reddit_url  ); ?>" type="text/javascript"></script>

		<?php

		return ob_get_clean();
	} );

	/**
	* Register a UI for the Shortcode.
	* Pass the shortcode tag (string)
	* and an array or args.
	*/
	shortcode_ui_register_for_shortcode(
		'redditlinks',
		array(

			// Display label. String. Required.
			'label' => 'Reddit Links',

			// Icon/image for shortcode. Optional. src or dashicons-$icon. Defaults to carrot.
			'listItemImage' => 'dashicons-admin-links',

			// Available shortcode attributes and default values. Required. Array.
			// Attribute model expects 'attr', 'type' and 'label'
			// Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
			'attrs' => array(
				array(
					'label' => 'Domain',
					'attr'  => 'domain',
					'type'  => 'url',
				),
				array(
					'label'		=> 'Range',
					'attr'		=> 'range',
					'type'		=> 'select',
					'options' => array(
							'hour'	=> 'This Hour',
							'day'	=> 'This Day',
							'week'	=> 'This Week'
					)
				),
				array(
					'label'		=> 'Number of Links to Show',
					'attr'		=> 'count',
					'type'		=> 'select',
					'options'	=> array(
							5 	=> '5',
							10 	=> '10',
							20 	=> '20'
					)
				),
			),
		)
	);

} );
