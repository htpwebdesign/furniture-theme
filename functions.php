<?php

/**
 * Furniture Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Furniture_Theme
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function furniture_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Furniture Theme, use a find and replace
		* to change 'furniture-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('furniture-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'furniture-theme'),
			'footer-left' => esc_html__('Footer - Left', 'furniture-theme'),
			'footer-right' => esc_html__('Footer - Right', 'furniture-theme'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'furniture_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function furniture_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('furniture_theme_content_width', 640);
}
add_action('after_setup_theme', 'furniture_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function furniture_theme_widgets_init() {}
add_action('widgets_init', 'furniture_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function furniture_theme_scripts()
{

	//bringing in Quattrocento googlefont

	wp_enqueue_style(
		'furniture-theme-googlefonts', //unique handle
		'https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', //url to the css file (it is a css file even though it doesnt end in .css)
		array(), // dependencies, googlefonts dont have any
		null // version number for googlefonts, always set to null for googlefonts or it breaks
		// there's a 5th one you can set for screen size, print, etc. but we don't need to use it.
	);

	//enqueuing JS for accordion on faq page

	wp_enqueue_script(
		'furniture-theme-accordion',
		get_template_directory_uri() . '/js/accordion.js',
		array(),
		_S_VERSION,
		array('strategy' => 'defer')
	);
	wp_enqueue_script(
		'furniture-theme-hamburger',
		get_template_directory_uri() . '/js/hamburger.js',
		array(),
		_S_VERSION,
		array('strategy' => 'defer')
	);

	wp_enqueue_style('furniture-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('furniture-theme-style', 'rtl', 'replace');

	wp_enqueue_script('furniture-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, array('strategy' => 'defer'));

	wp_enqueue_script('portfolio-header-scroll', get_template_directory_uri() . '/js/header.js', array(), _S_VERSION, array('strategy' => 'defer'));

//for lightgallery 

//only needed on front page so conditionally rendered

if ( is_front_page() ) {
    wp_enqueue_script( 'furniture_theme_lightgallery', get_template_directory_uri().'/js/lightgallery.umd.js', array(), '2024.10.30', array( 'strategy' => 'defer' )  );
    wp_enqueue_script( 'furniture_theme_lightgallery_settings', get_template_directory_uri().'/js/lightgallery_settings.js', array(), '2024.10.30', array( 'strategy' => 'defer' )  );

    wp_enqueue_style ( 'furniture_theme_style_lightgallery-main', get_template_directory_uri().'/css/lightgallery.css', array(), '2024.10.30' );
    
	wp_enqueue_style ( 'furniture_theme_style_lightgallery-plugins', get_template_directory_uri().'/css/lightgallery-bundle.css', array(), '2024.10.30' );
}


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}


add_action('wp_enqueue_scripts', 'furniture_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom login logo
 */
require get_template_directory() . '/inc/admin-customization.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// turning off block editor for certain pages so client can't add extra content/break layout

function fwd_post_filter($use_block_editor, $post)
{
	// Add IDs to the array
	$page_ids = array(67, 71, 75, 10);
	if (in_array($post->ID, $page_ids)) {
		return false;
	} else {
		return $use_block_editor;
	}
}
add_filter('use_block_editor_for_post', 'fwd_post_filter', 10, 2);

/**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom()
{
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Driftwood Design';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

// Customize the toolbar on the WYSIWYG editor on FAQ
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );
function my_toolbars( $toolbars )
{
    // Uncomment to view format of $toolbars
    // echo '< pre >';
    //     print_r($toolbars);
    // echo '< /pre >';
    // die;

    // Add a new toolbar called "Very Simple"
    // - this toolbar has only 1 row of buttons
    $toolbars['Very Simple' ] = array();
    $toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'bullist', 'numlist', 'link' );

    // return $toolbars - IMPORTANT!
    return $toolbars;
}

// Remove default widgets

function wporg_remove_all_dashboard_metaboxes() {
	// Remove Welcome panel
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	// Remove the rest of the dashboard widgets
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function wporg_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'wporg_dashboard_widget1',                         // Widget slug.
		esc_html__( 'How to add a Product', 'wporg' ), 	   // Title.
		'wporg_dashboard_widget_render1'                    // Display function.
	); 
	wp_add_dashboard_widget(
		'wporg_dashboard_widget2',                         // Widget slug.
		esc_html__( 'How to add a Variant', 'wporg' ), 	   // Title.
		'wporg_dashboard_widget_render2'                    // Display function.
	); 
	wp_add_dashboard_widget(
		'wporg_dashboard_widget3',                         // Widget slug.
		esc_html__( 'How to add an FAQ entry', 'wporg' ),  // Title.
		'wporg_dashboard_widget_render3'                    // Display function.
	); 
}
add_action( 'wp_dashboard_setup', 'wporg_add_dashboard_widgets' );

function wporg_dashboard_widget_render1() {
	// Display whatever you want to show.
	echo '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/1025172096?h=b97141b528&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="How to add a Product"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>';
}
function wporg_dashboard_widget_render2() {
	// Display whatever you want to show.
	echo '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/1025180417?h=f1e481aae4&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="New Recording - 10/31/2024, 9:43:31 AM"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>';
}
function wporg_dashboard_widget_render3() {
	// Display whatever you want to show.
	echo '<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/1025176316?h=0fd4b1ba8b&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="How to"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>';
}

// Add Block Editor Styles

function wpdocs_theme_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'editor-styles' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

// Remove admin menu links for non-Administrator accounts
function fwd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    	remove_menu_page( 'edit-comments.php' );  // Remove Comments link
	}
}
add_action( 'admin_menu', 'fwd_remove_admin_links' );