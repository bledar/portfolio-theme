<?php

//ky funksion shton ne stilet e faqeve dhe scriptet ne fund te faqes
function sitbej_script_enqueue(){
    wp_enqueue_style( "bootstrap", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",array(), "3.3.6", "all" );
    wp_enqueue_style( "main_style", get_template_directory_uri()."/css/main_style.css",array(), "1.0", "all" );
    wp_enqueue_script("jQuery","https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js",array(),"2.2.0",true);
    wp_enqueue_script("bootstrap","https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js",array(),"3.3.6",true);
    wp_enqueue_script("main_script", get_template_directory_uri()."/js/script.js",array(),"1.0",true);
	wp_enqueue_script("parallax", get_template_directory_uri()."/js/parallax.min.js",array(),"1.0",true);
}

//kjo komande regjistron funksionin e mesiperm dhe ben ate aktv
	add_action("wp_enqueue_scripts","sitbej_script_enqueue");

//ben aktive menute ne wordpress dhe krijon dy tipe menushe te reja
function sitebej_theme_setup(){
	add_theme_support("menus" );
	register_nav_menu( "primary","header navigations");
	register_nav_menu( "secondary","footer navigations");
}
	//inicializon menute nga fuksioni i mesiperm
add_action( "init", "sitebej_theme_setup");

//ben qe per cdo post te kemi ospionin e future images
add_theme_support("post-thumbnails");
//funksion qe heq gjithe linket e pa nevojshme
function clean_setup () {
    remove_action('wp_head', 'wp_generator');                // #1
    remove_action('wp_head', 'wlwmanifest_link');            // #2
    remove_action('wp_head', 'rsd_link');                    // #3
    remove_action('wp_head', 'wp_shortlink_wp_head');        // #4
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);    // #5
    add_filter('the_generator', '__return_false');            // #6
    add_filter('show_admin_bar','__return_false');            // #7
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // #8
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action('after_setup_theme', 'clean_setup');
function expert_more_str($more){
    $str='</p><div class="readMore"><a href="%1$s">%2$s</a> </div>';

	return sprintf( $str,
        get_permalink( get_the_ID() ),
        __( 'Read More', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'expert_more_str' );
