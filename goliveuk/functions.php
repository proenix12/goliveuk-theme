<?php

//Load css and js scripts
function load_css_and_javascript () {
    //load css files
    wp_enqueue_style( 'goliveuk', get_template_directory_uri() . '/assets/css/style.css' );
    //add font fontawesome
    //wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css' );
    //Compiled materialize minified CSS
    //wp_enqueue_style( 'materializecss', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize
    //.min.css' );

    //load javascript files
    wp_enqueue_script( 'jquery' );
    // Compiled materialize minified JavaScript
    // wp_enqueue_scripts( 'materializejs', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js' );
    wp_enqueue_script( 'goliveukjs', get_template_directory_uri() . '/assets/js/functions.js' );
    wp_enqueue_script( 'custom-ajax-request', get_template_directory_uri() . '/assets/js/ajax.js');
    wp_localize_script( 'custom-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'load_css_and_javascript' );

// register navigation menu
function register_my_menus () {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu'  => __( 'Footer Menu' ),
            'fallback_cb' => false,
        )
    );
}

add_action( 'init', 'register_my_menus' );

//thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 360, 270, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 360, 9999 ); //300 pixels wide (and unlimited height)
}


//Option Page
//if( function_exists('acf_add_options_page') ) {
//    acf_add_options_page(array(
//        'page_title' => 'Theme Header Settings',
//        'menu_title' => 'Header Settings',
//        'menu_slug' => 'theme-header-settings',
//        'capability' => 'edit_posts',
//        'redirect' => false
//    ));
//}


// Register Custom Post Type
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
//add_action( 'init', 'project' );
//function project() {
//    $labels = array(
//        'name'               => _x( 'New Project', 'post type general name', 'your-plugin-textdomain' ),
//        'singular_name'      => _x( 'Project', 'post type singular name', 'your-plugin-textdomain' ),
//        'menu_name'          => _x( 'Project', 'admin menu', 'your-plugin-textdomain' ),
//        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'your-plugin-textdomain' ),
//        'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
//        'add_new_item'       => __( 'Add New Project', 'your-plugin-textdomain' ),
//        'new_item'           => __( 'New Project', 'your-plugin-textdomain' ),
//        'edit_item'          => __( 'Edit Project', 'your-plugin-textdomain' ),
//        'view_item'          => __( 'View Project', 'your-plugin-textdomain' ),
//        'all_items'          => __( 'All Project', 'your-plugin-textdomain' ),
//        'search_items'       => __( 'Search Project', 'your-plugin-textdomain' ),
//        'parent_item_colon'  => __( 'Parent Project:', 'your-plugin-textdomain' ),
//        'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
//        'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
//    );
//
//    $args = array(
//        'labels'             => $labels,
//        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
//        'public'             => true,
//        'publicly_queryable' => true,
//        'taxonomies'          => array( 'category', 'Project' ),
//        'show_ui'            => true,
//        'show_in_menu'       => true,
//        'query_var'          => true,
//        'rewrite'            => array( 'slug' => 'project' ),
//        'capability_type'    => 'post',
//        'has_archive'        => true,
//        'hierarchical'       => false,
//        'menu_position'      => null,
//        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
//    );
//
//    register_post_type( 'Project', $args );
//}

//validation function
function filterContactData($data = '') {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" class="read-more">...Read More</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );