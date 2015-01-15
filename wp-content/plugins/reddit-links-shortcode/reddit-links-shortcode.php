<?php
/**
* Plugin Name: Reddit Links Shortcode
*/

function redditlinks_func() {
	return 'this is my awesome shortcode content';
}

add_shortcode( 'redditlinks', 'redditlinks_func' );
