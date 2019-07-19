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

function mytheme_customize_register($wp_customize)
{
    $wp_customize->add_section('copyright_extras_section', [
        'title' => 'Copyright Text Section'
    ]);

    //adding setting for copyright text
    $wp_customize->add_setting('text_setting', [
        'default' => 'Default Text For copyright Section',
    ]);


    $wp_customize->add_control('text_setting', [
        'label'   => 'Copyright text',
        'section' => 'copyright_extras_section',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'mytheme_customize_register');
//get_theme_mod = echo get_theme_mod('text_setting');


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


//register post texonomy
// add_action('init', 'crunchify_create_deals_custom_taxonomy', 0);
// function crunchify_create_deals_custom_taxonomy()
// {

//     $labels = [
//         'name'              => _x('Types', 'taxonomy general name'),
//         'singular_name'     => _x('Type', 'taxonomy singular name'),
//         'search_items'      => __('Search Types'),
//         'all_items'         => __('All Types'),
//         'parent_item'       => __('Parent Type'),
//         'parent_item_colon' => __('Parent Type:'),
//         'edit_item'         => __('Edit Type'),
//         'update_item'       => __('Update Type'),
//         'add_new_item'      => __('Add New Type'),
//         'new_item_name'     => __('New Type Name'),
//         'menu_name'         => __('Types'),
//     ];

//     register_taxonomy('types', ['faq'], [
//         'hierarchical'      => TRUE,
//         'labels'            => $labels,
//         'show_ui'           => TRUE,
//         'show_admin_column' => TRUE,
//         'query_var'         => TRUE,
//         'rewrite'           => ['slug' => 'type'],
//     ]);
// }

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


//function change_submenu_class($menu) {
//    $menu = preg_replace('/ class="sub-menu"/','/ class="myclass" /',$menu);
//    return $menu;
//}
//add_filter('wp_nav_menu','change_submenu_class');


//class My_Walker_Nav_Menu extends Walker_Nav_Menu {
//		function display_element ( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
//				$GLOBALS['dd_children'] = ( isset( $children_elements[ $element->ID ] ) ) ? 1 : 0;
//				$GLOBALS['dd_depth']    = (int) $depth;
//				parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
//		}
//
//		function start_lvl ( &$output, $depth = 0, $args = [] ) {
//				$indent = str_repeat( "\t", $depth );
//				$output .= "\n$indent<div class=\"sub-menu\"><ul class=\"dropdown-menu\">\n";
//		}
//
//		function start_el ( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
//				global $wp_query, $wpdb;
//				$indent        = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//				$li_attributes = '';
//				$class_names   = $value = '';
//				$classes       = empty( $item->classes ) ? [] : (array) $item->classes;
//
//				//Add class and attribute to LI element that contains a submenu UL.
//				if ( isset( $args->has_children ) ) {
//						$classes[]     = 'dropdown';
//						$li_attributes .= 'data-dropdown="dropdown"';
//				}
//				$classes[] = 'menu-item-' . $item->ID;
//				//If we are on the current page, add the active class to that menu item.
//				$classes[] = ( $item->current ) ? 'active' : '';
//				//Make sure you still add all of the WordPress classes.
//				$class_names  = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
//				$class_names  = ' class="' . esc_attr( $class_names ) . '"';
//				$id           = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
//				$id           = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
//				$has_children = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %d", '_menu_item_menu_item_parent', $item->ID ) );
//				$output       .= $indent . '<li' . $id . $value . $class_names . '>';
//				$output       .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
//				//Add attributes to link element.
//				$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
//				$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
//				$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
//				$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
//				// Check if menu item is in main menu
//
//				if ( $depth == 0 && $has_children > 0 ) {
//						// These lines adds your custom class and attribute
//						$attributes .= ' class="dropdown-toggle"';
//						$attributes .= ' data-toggle="dropdown"';
//				}
//				$item_output = $args->before;
//				$item_output .= '<a' . $attributes . '>';
//				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//				// Add the caret if menu level is 0
//				if ( $depth == 0 && $has_children > 0 ) {
//						$item_output .= ' <b class="caret"></b>';
//				}
//				$item_output .= '</a>';
//				$item_output .= $args->after;
//				$output      .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//		}
//
//		function end_lvl ( &$output, $depth = 0, $args = [] ) {
//				$indent = str_repeat( "\t", $depth );
//				$output .= "$indent</ul></div>\n";
//		}
//}
//
//
//if ( function_exists( 'register_sidebars' ) ) {
//		register_sidebar( [
//				'name'         => 'Left Sidebar',
//				'before_title' => '<h2 class="label">',
//				'after_title'  => '</h2>',
//				'description'  => 'Items placed here will be shown in the left sidebar.'
//		] );
//}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
		function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
				if ( array_search( 'menu-item-has-children', $item->classes ) ) {
						$output .= sprintf( "\n<li class='item haschild  %s'>
<a href='#' class=\"\" data-toggle=\"dropdown\" >$item->title</a>\n",
								( array_search( 'current-menu-item', $item->classes ) ||
								  array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title );
				} else {
						$output .= sprintf( "\n<li class='item' %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title );
				}
		}
		
		function start_lvl( &$output, $depth = 0, $args = [] ) {
				$indent = str_repeat( "\t", $depth );
				$output .= "\n$indent<div class=\"sub-menu\"><ul class=\"dropdown-menu\" role=\"menu\">\n";
		}
		
		function end_lvl ( &$output, $depth = 0, $args = [] ) {
				$indent = str_repeat( "\t", $depth );
				$output .= "\n$indent</ul></div>\n";
		}
}
function print_r2($val){
    
    return '<pre>'.print_r($val).'</pre>';
}

//Static front pages uses get_query_var( 'page' ) and not get_query_var( 'paged' ).
function custom_pagination($loop)
{

    $total_pages = $loop->max_num_pages;

    if ($total_pages > 1) {

        $current_page = max(1, get_query_var('paged'));

        echo "<nav class='footer-pagination'>" . paginate_links([
                'base'      => get_pagenum_link(1) . '%_%',
                'format'    => '/page/%#%',
                'current'   => $current_page,
                'total'     => $total_pages,
                'show_all'  => FALSE,
                'end_size'  => 1,
                'mid_size'  => 2,
                'prev_next' => TRUE,
                'prev_text' => __('« prev'),
                'next_text' => __('next »'),
            ]) . "</nav>";
    }
}
//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
/* 
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 6,
    'paged'          => $paged,
]; 
*/
//$post_query = new WP_Query($args);
//custom_pagination($post_query);


// add_action('wp_ajax_contactForm', 'contactForm');
// add_action('wp_ajax_nopriv_contactForm', 'contactForm');
// function contactForm(){}