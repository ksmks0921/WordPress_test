<?php
/**
 * @package Kid Toys Store
 * @subpackage kid-toys-store
 * @since kid-toys-store 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses kid_toys_store_header_style()
*/

function kid_toys_store_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'kid_toys_store_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'kid_toys_store_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'kid_toys_store_custom_header_setup' );

if ( ! function_exists( 'kid_toys_store_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see kid_toys_store_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'kid_toys_store_header_style' );
function kid_toys_store_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'kid-toys-store-basic-style', $custom_css );
	endif;
}
endif; // kid_toys_store_header_style
