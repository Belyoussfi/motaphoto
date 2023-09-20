<?php

function my_css() {
    wp_enqueue_style( 'mon-css', get_template_directory_uri() . '/css/styles.css'  , array(), '1.0');
    wp_enqueue_script('mon-js', get_template_directory_uri() . '/js/script.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'my_css' );  

// CREATION DES MENUS
register_nav_menus( array(
	'main' => 'Header Menu',
	'footer' => 'Footer Menu',
) );


//echo get_template_directory_uri() . '/css/styles.css';

//echo get_template_directory_uri() . '/js/script.js';
