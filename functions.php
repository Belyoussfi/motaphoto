<?php
function my_css() {
     wp_enqueue_style( 
        'mon-css', get_template_directory_uri() . '/css/styles.css', array(), '1.0'
    );
}

add_action( 'wp_enqueue_scripts', 'my_css' );  

// echo get_template_directory_uri() . '/css/styles.css';