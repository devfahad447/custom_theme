<?php
/**
 * qca_schools functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package qca_schools
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function qca_schools_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on qca_schools, use a find and replace
		* to change 'qca_schools' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'qca_schools', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'qca_schools' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'qca_schools_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'qca_schools_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function qca_schools_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qca_schools_content_width', 640 );
}
add_action( 'after_setup_theme', 'qca_schools_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function qca_schools_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Donation', 'qca_schools' ),
			'id'            => 'donation',
			'description'   => esc_html__( 'Add widgets here.', 'qca_schools' ),
			'before_widget' => '<div class="card-body">',
			'after_widget'  => '</div>',
			'before_title'  => ' <h5 class="card-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action( 'widgets_init', 'qca_schools_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function qca_schools_scripts() {

	wp_enqueue_style( 'font-awesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), '6.4.2' );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0.2' );
	wp_enqueue_style( 'swiper_style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), '10.3.0' );
	wp_enqueue_style( 'qca_schools-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'qca_schools-style', 'rtl', 'replace' );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '5.0.2', true);
	wp_enqueue_script('swiper_bundle', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), '10.3.0', true);
	wp_enqueue_script( 'qca_schools-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );


	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'qca_schools_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Register a custom post type called "hero".
 *
 * @see get_post_type_labels() for label keys.
 */
function hero_init() {
    $labels = array(
        'name'                  => _x( 'Heros', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Hero', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Heros', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Hero', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Hero', 'textdomain' ),
        'new_item'              => __( 'New Hero', 'textdomain' ),
        'edit_item'             => __( 'Edit Hero', 'textdomain' ),
        'view_item'             => __( 'View Hero', 'textdomain' ),
        'all_items'             => __( 'All Heros', 'textdomain' ),
        'search_items'          => __( 'Search Heros', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Heros:', 'textdomain' ),
        'not_found'             => __( 'No Heros found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Heros found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Hero Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Hero archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Hero', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Hero', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Heros list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Heros list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Heros list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'hero' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'hero', $args );
}
 
add_action( 'init', 'hero_init' );




// ======================= theme options menu start =====================


add_action("admin_menu","mythemeoptions");

function mythemeoptions(){
	// adding menu page here
	add_menu_page( "theme-options",
	 	"Theme Options",
	  	"manage_options",
	   	"theme-options",
	    "mycustom_options",
		"dashicons-admin-appearance"
	);
}

function mycustom_options(){
	//  linking our custom settings
	?>
	<h1>Theme Settings Page</h1>
	<span>
		<?php settings_errors()?>
	</span>
	<form action="options.php" method="POST">
		<?php 
		settings_fields( "section" );
		do_settings_sections("theme-options");
		submit_button();
		?>
	</form>
	<?php

}

function theme_option_setting() {
	// step1 this code basically provides an area where you register your fields
	add_settings_section( "section",
	 	"",
	  	NULL,
		"theme-options" );

		#step2 part 1
	
	add_settings_field( 
		"headerTextColor",
		"Navbar Text & button Text Color",
		"display_header_text_color",
		"theme-options",
		"section"
	);		
	add_settings_field( 
		"headerTextColorHover",
		"Navbar Text Hover & Button Background Color",
		"display_header_text_color_hover",
		"theme-options",
		"section"
	);	
	add_settings_field( 
		"headerBtnCTA",
		"Navbar Button Link",
		"display_headerBtnCTA",
		"theme-options",
		"section"
	);	

		#step2 part 2
	add_settings_field( 
		"footerLogoUrl",
	 	"Logo Url",
	  	"display_footerLogo_url",
	 	"theme-options",
	  	"section"
	);	
	add_settings_field( 
		"fbUrl",
	 	"Facebook Url",
	  	"display_fb_url",
	 	"theme-options",
	  	"section"
	);	

	add_settings_field( 
		"youTubeUrl",
	 	"YouTube Url",
	  	"display_youtube_url",
	 	"theme-options",
	  	"section"
	);	
	add_settings_field( 
		"twitterUrl",
	 	"Twitter Url",
	  	"display_twitter_url",
	 	"theme-options",
	  	"section"
	);	

	add_settings_field( 
		"instagramUrl",
	 	"Instagram Url",
	  	"display_instagram_url",
	 	"theme-options",
	  	"section"
	);	


	add_settings_field( 
		"copyRightText",
	 	"Copyright Text",
	  	"display_copyRightText",
	 	"theme-options",
	  	"section"
	);	

	add_settings_field( 
		"themecolorPicker",
	 	"Navbar and Footer Color",
	  	"display_theme_color",
	 	"theme-options",
	  	"section"
	);	



// step3 we need to add this setting to area
	register_setting( "section","headerTextColor");
	register_setting( "section","headerTextColorHover");
	register_setting( "section","headerBtnCTA");
	register_setting( "section","footerLogoUrl");
	register_setting( "section","fbUrl");
	register_setting( "section","youTubeUrl"); 
	register_setting( "section","twitterUrl"); 
	register_setting( "section","instagramUrl"); 
	register_setting( "section","copyRightText"); 
	register_setting( "section","themecolorPicker"); 
}

add_action( "admin_init", "theme_option_setting");

function display_header_text_color(){
	?>
	<input type="color" name="headerTextColor" value="<?php echo get_option( "headerTextColor")?>" id="headerTextColor">
	<?php
}

function display_header_text_color_hover(){
	?>
	<input type="color" name="headerTextColorHover" value="<?php echo get_option( "headerTextColorHover")?>" id="headerTextColorHover">
	<?php
}

function display_headerBtnCTA(){
	?>
	<input type="text" name="headerBtnCTA" id="headerBtnCTA" value="<?php echo get_option( "headerBtnCTA")?>">
	<?php
}

function display_footerLogo_url(){
	?>
	<input type="text" name="footerLogoUrl" id="footerLogoUrl" value="<?php echo get_option( "footerLogoUrl")?>">
	<?php
}

function display_fb_url(){
	?>
	<input type="text" name="fbUrl" id="fbUrl" value="<?php echo get_option( "fbUrl")?>">
	<?php
}

function display_youtube_url(){
	?>
	<input type="text" name="youTubeUrl" id="youTubeUrl" value="<?php echo get_option( "youTubeUrl")?>">
	<?php
}


function display_twitter_url(){
	?>
	<input type="text" name="twitterUrl" id="twitterUrl" value="<?php echo get_option( "twitterUrl")?>">
	<?php
}


function display_instagram_url(){
	?>
	<input type="text" name="instagramUrl" id="instagramUrl" value="<?php echo get_option( "instagramUrl")?>">
	<?php
}

function display_copyRightText(){
	?>
	<input type="text" name="copyRightText" id="copyRightText" value="<?php echo get_option( "copyRightText")?>">
	<?php
}

function display_theme_color(){
	?>
	<input type="color" name="themecolorPicker" value="<?php echo get_option( "themecolorPicker")?>" id="themecolorPicker">

	<?php
}


// ======================= theme options menu end =====================
