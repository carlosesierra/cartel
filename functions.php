<?php
function cartel_script_enqueue() {
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/cartel.css', array(), '1.0', 'all');
	wp_enqueue_script('customjs', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/cartel.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'cartel_script_enqueue');
function cartel_theme_setup(){
	add_theme_support('menus');
	register_nav_menu('primary','main menu');
	register_nav_menu('social','social menu');
}

add_action('init', 'cartel_theme_setup');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');	/*=== post thumbnails in pot and pages ===*/
set_post_thumbnail_size( 825, 510, true );
add_theme_support( 'title-tag' );	/*=== document title ===*/
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );
add_theme_support( 'post-formats', array('image', 'video', 'gallery', 'aside', 'quote' ) );
add_theme_support( 'automatic-feed-links' );	/*=== add default posts and comments rss feed links to head ===*/
add_theme_support( 'editor_style');
load_theme_textdomain( 'cartel', get_template_directory() . '/languages' ); /*=== translations ===*/

/*=== sidebar ===*/
function cartel_widget_setup() {
	register_sidebar(
		array(
			'name' => 'Sidebar',
			'id' => 'sidebar-1',
			'class' => 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);	
}
add_action('widgets_init','cartel_widget_setup');

/*=== favicon ===*/
function favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="', get_stylesheet_directory_uri() . '/ico/favicon.ico" />'. "\n";
}
add_action( 'wp_head', 'favicon_link' );

/*=== google fonts ===*/
function wpb_add_google_fonts() {
wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:100|Raleway:100,300" rel="stylesheet', false ); 
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/*=== content width ===*/
if ( ! isset( $content_width ) ) {
	$content_width = 1000;
}

/*=== comments reply ===*/
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

function cartel_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}

add_action( 'comment_form_before', 'cartel_enqueue_comments_reply' );

/*=== editor styles ===*/
function cartel_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'cartel_add_editor_styles' );

/*=== Remove empty p tags from WordPress posts ===*/ 
add_filter( 'the_content', 'remove_empty_p', 20, 1 );
function remove_empty_p( $content ){
	// clean up p tags around block elements
	$content = preg_replace( array(
		'#<p>\s*<(div|aside|section|article|header|footer)#',
		'#</(div|aside|section|article|header|footer)>\s*</p>#',
		'#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
		'#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
		'#<p>\s*</(div|aside|section|article|header|footer)#',
	), array(
		'<$1',
		'</$1>',
		'</$1>',
		'<$1$2>',
		'</$1',
	), $content );

	return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', $content);
}



