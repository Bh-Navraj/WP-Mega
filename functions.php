<?php
/**
 * nepalmega functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nepalmega
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
function nepalmega_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on nepalmega, use a find and replace
		* to change 'nepalmega' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'nepalmega', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'nepalmega' ),
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
			'nepalmega_custom_background_args',
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
add_action( 'after_setup_theme', 'nepalmega_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nepalmega_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nepalmega_content_width', 640 );
}
add_action( 'after_setup_theme', 'nepalmega_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nepalmega_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nepalmega' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nepalmega' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nepalmega_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nepalmega_scripts() {
	wp_enqueue_style( 'nepalmega-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'nepalmega-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nepalmega-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nepalmega_scripts' );

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

// Adding Read More as Excerpt

function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');



function megatheme_customize_register($wp_customize) {
    

	// Add a new section for the Hero Banner
    $wp_customize->add_section('hero_banner_section', array(
        'title'       => __('Hero Banner', 'megatheme'),
        'description' => __('Set the hero banner image, title, and description.', 'megatheme'),
        'priority'    => 30,
    ));

    // Hero Banner Image Setting
    $wp_customize->add_setting('hero_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'hero_banner_image',
        array(
            'label'    => __('Hero Banner Image', 'megatheme'),
            'section'  => 'hero_banner_section',
            'settings' => 'hero_banner_image',
        )
    ));

	// Inner Hero Banner Image Setting
    $wp_customize->add_setting('inner_banner_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'inner_banner_image',
        array(
            'label'    => __('Inner Banner Image', 'megatheme'),
            'section'  => 'hero_banner_section',
            'settings' => 'inner_banner_image',
        )
    ));

    // Hero Title Setting
    $wp_customize->add_setting('hero_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'megatheme'),
        'type'     => 'text',
        'section'  => 'hero_banner_section',
    ));

    // Hero Description Setting
    $wp_customize->add_setting('hero_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_description', array(
        'label'    => __('Hero Description', 'megatheme'),
        'type'     => 'textarea',
        'section'  => 'hero_banner_section',
    ));


	// Add Contact section
    $wp_customize->add_section('contact_section', array(
        'title'    => __('Contact Information', 'megatheme'),
        'priority' => 30,
    ));

    // Phone Field
    $wp_customize->add_setting('contact_phone', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_phone_control', array(
        'label'   => __('Phone Number', 'megatheme'),
        'section' => 'contact_section',
        'settings' => 'contact_phone',
        'type'    => 'text',
    ));

    // Email Field
    $wp_customize->add_setting('contact_email', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_email_control', array(
        'label'   => __('Email Address', 'megatheme'),
        'section' => 'contact_section',
        'settings' => 'contact_email',
        'type'    => 'email',
    ));

    // Address Field
    $wp_customize->add_setting('contact_address', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_address_control', array(
        'label'   => __('Address', 'megatheme'),
        'section' => 'contact_section',
        'settings' => 'contact_address',
        'type'    => 'textarea',
    ));

    // Map Embed Code
    $wp_customize->add_setting('contact_map', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('contact_map_control', array(
        'label'   => __('Google Map Embed Code URL', 'megatheme'),
        'section' => 'contact_section',
        'settings' => 'contact_map',
        'type'    => 'textarea',
    ));

	
}
add_action('customize_register', 'megatheme_customize_register');

