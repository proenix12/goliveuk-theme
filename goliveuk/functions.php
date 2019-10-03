<?php

//Load css and js scripts
/**
 *
 */
function load_css_and_javascript() {
	//load css files
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Lato:300,400,700&display=swap' );
	
	//load javascript files
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js' );
	wp_enqueue_script( 'functions', get_template_directory_uri() . '/assets/js/functions.js' );
	wp_enqueue_script( 'custom-ajax-request', get_template_directory_uri() . '/assets/js/ajax.js' );
	wp_localize_script( 'custom-ajax-request', 'MyAjax', [ 'ajaxurl' => admin_url( 'admin-ajax.php' ) ] );
}

add_action( 'wp_enqueue_scripts', 'load_css_and_javascript' );

// register navigation menu
function register_my_menus() {
	register_nav_menus(
		[
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
			'fallback_cb' => FALSE,
		]
	);
}

add_action( 'init', 'register_my_menus' );

//thumbnails
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 360, 270, TRUE ); // default Post Thumbnail dimensions (cropped)
	
	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size( 'category-thumb', 360, 9999 ); //300 pixels wide (and unlimited height)
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header Settings',
        'menu_slug' => 'theme-header-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}


/*
 * function project() {
    $labels = array(
        'name'               => _x( 'New Project', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Project', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Project', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Project', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Project', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Project', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Project', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Project', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Project', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Project:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'taxonomies'          => array( 'category', 'Project' ),
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'project' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'Project', $args );
}


add_action( 'init', 'create_taxonomy', 0 );
function create_taxonomy() {
	$labels = [
		'name'              => _x( 'Topics', 'taxonomy general name' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Topics' ),
		'all_items'         => __( 'All Topics' ),
		'parent_item'       => __( 'Parent Topic' ),
		'parent_item_colon' => __( 'Parent Topic:' ),
		'edit_item'         => __( 'Edit Topic' ),
		'update_item'       => __( 'Update Topic' ),
		'add_new_item'      => __( 'Add New Topic' ),
		'new_item_name'     => __( 'New Topic Name' ),
		'menu_name'         => __( 'Topics' ),
	];
	
	// Now register the taxonomy
	register_taxonomy( 'topics', [ 'project' ], [
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'topic' ],
	] );
	
}
*/

//validation function
function filterContactData( $data = '' ) {
	$data = trim( $data );
	$data = stripslashes( $data );
	$data = htmlspecialchars( $data );
	
	return $data;
}


function wpdocs_excerpt_more( $more ) {
	return '<a href="' . get_the_permalink() . '" class="read-more">...Read More</a>';
}

add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


//function change_submenu_class($menu) {
//    $menu = preg_replace('/ class="sub-menu"/','/ class="myclass" /',$menu);
//    return $menu;
//}
//add_filter('wp_nav_menu','change_submenu_class');


include 'template-parts/header/Classes/My_Walker_Nav_Menu.php';


function custom_pagination( $loop ) {
	
	$total_pages = $loop->max_num_pages;
	
	if ( $total_pages > 1 ) {
		
		$current_page = max( 1, get_query_var( 'paged' ) );
		
		echo '<nav class="footer-pagination">' . paginate_links( [
				'base'      => get_pagenum_link( 1 ) . '%_%',
				'format'    => '/page/%#%',
				'current'   => $current_page,
				'total'     => $total_pages,
				'show_all'  => FALSE,
				'end_size'  => 1,
				'mid_size'  => 2,
				'prev_next' => TRUE,
				'prev_text' => __( '« prev' ),
				'next_text' => __( 'next »' ),
			] ) . '</nav>';
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

add_action( 'wp_ajax_contactForm', 'contactForm' );
add_action( 'wp_ajax_nopriv_contactForm', 'contactForm' );
function contactForm() {
	$error    = FALSE;
	$errorMsg = '';
	
	$name    = filterContactData( $_POST[ 'name' ] );
	$email   = filter_var( $_POST[ 'email' ], FILTER_SANITIZE_EMAIL );
	$phone   = filterContactData( $_POST[ 'phone' ] );
	$message = $_POST[ 'message' ];
	
	if ( empty( $name ) ) {
		$error    = TRUE;
		$errorMsg .= '[name]Empty name field[/name]';
	} else if ( ! preg_match( "/^[a-zA-Z'. -]+$/", $name ) ) {
		$error    = TRUE;
		$errorMsg .= '[name]Invalid name[/name]';
	}
	
	if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		$error    = TRUE;
		$errorMsg .= '[email]Invalid email[/email]';
	}
	
	if ( empty( $phone ) ) {
		$error    = TRUE;
		$errorMsg .= '[phone]Phone field can\'t be empty[/phone]';
	} else if ( ! is_numeric( $phone ) ) {
		$error    = TRUE;
		$errorMsg .= '[phone]Invalid phone format[/phone]';
	}
	
	if ( empty( $message ) ) {
		$error    = TRUE;
		$errorMsg .= '[message]Please enter message[/message]';
	}
	
	
	if ( ! $error ) {
		$headers   = [];
		$headers[] = 'Content-Type: text/html; charset=UTF-8;';
		$headers[] = 'Reply-To: shawn1@abv.bg';
		$email     = get_field( 'contact_us_email', 'option' );
		
		$emailTemplate = '';
		include 'template-parts/email/parts-email.php';
		
		if ( wp_mail( $email, 'Contact Form', $emailTemplate, $headers ) ) {
			$errorMsg .= '[success]Success[/success]';
		} else {
			$errorMsg .= '[fail]Something went wrong please try again[/fail]';
		}
		
	}
	
	echo $errorMsg;
	wp_die();
}
