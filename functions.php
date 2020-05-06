<?php 

/* --------------------------------------------------------------
    GET CURRENT CHILD STYLE
-------------------------------------------------------------- */

function PREFIJO_custom_front_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

    /*- MAIN FUNCTIONS -*/
    wp_register_script('main-functions', get_stylesheet_directory_uri() . '/functions.js', array('jquery'), $version_remove, true);
    wp_enqueue_script('main-functions');

    /* LOCALIZE MAIN SHORTCODE SCRIPT */
    wp_localize_script( 'main-functions', 'PREFIJO_admin_url', array(
        'PREFIJO_ajax_url' => admin_url('admin-ajax.php')
    ));
} 

add_action( 'wp_enqueue_scripts', 'PREFIJO_custom_front_styles' ); 

/* --------------------------------------------------------------
    ADD CUSTOM ADMIN STYLES
-------------------------------------------------------------- */

function PREFIJO_custom_admin_styles() {
    $version_remove = NULL;
    wp_register_style('wp-admin-style', get_stylesheet_directory_uri() . '/custom-wordpress-admin-style.css', false, $version_remove, 'all');
    wp_enqueue_style('wp-admin-style');
}

add_action('login_head', 'PREFIJO_custom_admin_styles');
add_action('admin_init', 'PREFIJO_custom_admin_styles');

/* --------------------------------------------------------------
    CUSTOM ADMIN LOGIN
-------------------------------------------------------------- */

function PREFIJO_dashboard_footer() {
    echo '<span id="footer-thankyou">';
    _e ('Gracias por crear con ', 'PROYECTO' );
    echo '<a href="http://wordpress.org/" target="_blank">WordPress.</a> - ';
    _e ('Tema desarrollado por ', 'PROYECTO' );
    echo '<a href="http://robertochoa.com.ve/?utm_source=footer_admin&utm_medium=link&utm_content=PROYECTO" target="_blank">Robert Ochoa</a>.</span>';
}

add_filter('admin_footer_text', 'PREFIJO_dashboard_footer');
