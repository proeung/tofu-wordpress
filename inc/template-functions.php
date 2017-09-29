<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package tofu
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tofu_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'tofu_body_classes' );

/****************************
** Add a pingback url auto-discovery header for singularly identifiable articles.
*****************************/

function tofu_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'tofu_pingback_header' );

/****************************
** Register Nav Menus
*****************************/

function tofu_register_nav_menus() {
	register_nav_menus( array(
		'header_menu_main' => __( 'Header Menu Main', 'tofu' ),
		'footer_menu_main' => __('Footer Menu Main', 'tofu'),
	));
}
add_action( 'after_setup_theme', 'tofu_register_nav_menus' );


/****************************
** Render fucntion: Header Menu - Main
*****************************/

function tofu_header_menu_main() {
	wp_nav_menu(
    array(
      'theme_location' => 'header_menu_main', 
			'menu' => 'Header Menu Main',
			'container'  => '',
			'menu_id'    => 'header-menu-main',
			'menu_class'  => 'menu header-menu-main menu-ajax',
			'after' => '<span class="expand-menu-toggle"></span>'
      )
    );
}

/****************************
** Render fucntion: Footer Menu - Main
*****************************/

function tofu_footer_menu_main() {
	wp_nav_menu(
    array(
    	'theme_location' => 'footer_menu_main',
    	'menu' => 'Footer Menu Main',
			'container'       => '',
			'menu_id'    => 'footer-menu-main',
			'menu_class'  => 'menu footer-menu-main menu-ajax'
      )
    );
}

/****************************
** Render Normal Image
*****************************/

function tofu_img($image_id, $image_size='thumbnail'){
  $image=wp_get_attachment_image_src( $image_id, $image_size,0 );
  $value='';
  if(!empty($image)){
      $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
      $image_title = get_the_title($image_id);
      $image_width = $image[1];
      $image_height = $image[2];
      $value='<img src="'.$image[0].'" alt="'.$image_alt.'" title="'.$image_title.'" width="'.$image_width.'" height="'.$image_height.'" />';
  }
  echo $value;
}


/****************************
** Render bLazyload Markup
*****************************/

function tofu_img_lazy($image_id, $image_size='thumbnail'){
  $image=wp_get_attachment_image_src( $image_id, $image_size,0 );
  $value='';
  if(!empty($image)){
      $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
      $image_title = get_the_title($image_id);
      $image_width = $image[1];
      $image_height = $image[2];
      $value='<noscript><img src="'.$image[0].'" alt="'.$image_alt.'" title="'.$image_title.'" width="'.$image_width.'" height="'.$image_height.'"/></noscript>';
      $value.= '<img class="b-lazy" src="'.tofu_get_img_placeholder().'" data-src="'.$image[0].'" alt="'.$image_alt.'" title="'.$image_title.'" width="'.$image_width.'" height="'.$image_height.'"/>';
  }
  echo $value;
}

function tofu_get_img_placeholder(){
  return get_stylesheet_directory_uri().'/images/loaders/placeholder.gif';
}