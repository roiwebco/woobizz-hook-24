<?php
/*
Plugin Name: Woobizz Hook 24
Plugin URI: http://woobizz.com
Description: Hide title and add any widget content on top of any page
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.0
Text Domain: woobizzhook24
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook24_load_textdomain' );
function woobizzhook24_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook24', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Add Hook 24
add_action( 'widgets_init', 'woobizzhook24_widget',124);
function woobizzhook24_widget() {
	$args = array(
				'id'            => 'woobizzhook24_id',
				'name'          => __( 'Woobizz Hook 24', 'woobizzhook24' ),
				'description'   => __( 'Hide title and add any widget content on top of any page','woobizzhook24' ),
				'before_title'  => '<h2 class="widgettitle">',
				'before_title'   => '</h2>',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'before_widget'  => '</li>',
	);
	register_sidebar( $args );
	add_action( 'storefront_content_top', 'woobizzhook24_display',100);
	function woobizzhook24_display(){
		?>
		<div class="woobizzhook24-widget-div">
			<div class="woobizzhook24-widget-content">
				<?php dynamic_sidebar( 'Woobizz Hook 24' ); ?>
			</div>
		</div>
		<?php
	}
}