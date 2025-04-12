<?php
/**
 * hall-metal-art functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hall-metal-art
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
function hall_metal_art_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on hall-metal-art, use a find and replace
		* to change 'hall-metal-art' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'hall-metal-art', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'hall-metal-art' ),
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
			'hall_metal_art_custom_background_args',
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
add_action( 'after_setup_theme', 'hall_metal_art_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hall_metal_art_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hall_metal_art_content_width', 640 );
}
add_action( 'after_setup_theme', 'hall_metal_art_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hall_metal_art_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hall-metal-art' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hall-metal-art' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hall_metal_art_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hall_metal_art_scripts() {
	// this code is so that the theme can be updated without having to change the version number in the stylesheet.
	$stylesheet_uri = get_stylesheet_uri();
	$stylesheet_path = get_template_directory() . '/style.css';
	$stylesheet_version = filemtime($stylesheet_path);

	wp_enqueue_style( 'hall-metal-art-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'hall-metal-art-style', 'rtl', 'replace' );

	wp_enqueue_script( 'hall-metal-art-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hall_metal_art_scripts' );

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

/*This function registers the custom post type*/ 

function register_product_post_type() {
    $labels = [
        'name'                  => __('Products'),
        'singular_name'         => __('Product'),
        'menu_name'             => __('Products'),
        'name_admin_bar'        => __('Product'),
        'add_new'               => __('Add New'),
        'add_new_item'          => __('Add New Product'),
        'new_item'              => __('New Product'),
        'edit_item'             => __('Edit Product'),
        'view_item'             => __('View Product'),
        'all_items'             => __('All Products'),
        'search_items'          => __('Search Products'),
        'not_found'             => __('No products found.'),
        'not_found_in_trash'    => __('No products found in Trash.'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-cart',
        'query_var'          => true,
        'rewrite'            => ['slug' => 'catalog'],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest'       => true // enables Gutenberg and REST API support
    ];

    register_post_type('product', $args);
}
add_action('init', 'register_product_post_type');

/* This registers the product categories taxonomy */
function register_product_taxonomies() {
    $labels = [
        'name'              => __('Product Categories'),
        'singular_name'     => __('Product Category'),
        'search_items'      => __('Search Categories'),
        'all_items'         => __('All Categories'),
        'parent_item'       => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item'         => __('Edit Category'),
        'update_item'       => __('Update Category'),
        'add_new_item'      => __('Add New Category'),
        'new_item_name'     => __('New Category Name'),
        'menu_name'         => __('Product Categories'),
    ];

    $args = [
        'hierarchical'      => true, // like categories (set false for tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'product-category'],
        'show_in_rest'      => true,
    ];

    register_taxonomy('product_category', ['product'], $args);
}
add_action('init', 'register_product_taxonomies');

function add_custom_query_vars($vars) {
	$vars[] = 'product_category';
	return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

function add_product_meta_boxes() {
	add_meta_box(
		'product_details_meta_box',
		__('Product Details', 'hall-metal-art'),
		'product_details_meta_box_callback',
		'product',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_product_meta_boxes');

function product_details_meta_box_callback($post) {
	wp_nonce_field('save_product_details', 'product_details_nonce');

	$price = get_post_meta($post->ID, '_product_price', true);
	$name = get_post_meta($post->ID, '_product_name', true);
	$description = get_post_meta($post->ID, '_product_description', true);
	?>

	<p>
		<label for="product_price"><?php _e('Price', 'hall-metal-art'); ?></label><br>
		<input type="text" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" style="width:50%;" />
	</p>

	<p>
		<label for="product_name"><?php _e('Name', 'hall-metal-art'); ?></label><br>
		<input type="text" id="product_name" name="product_name" value="<?php echo esc_attr($name); ?>" style="width:50%;" />
	</p>

	<p>
		<label for="description"><?php _e('Description', 'hall-metal-art'); ?></label><br>
		<input type="text" id="description" name="description" value="<?php echo esc_attr($description); ?>" style="width:50%;" />
	</p>

	<?php
}
function save_product_details($post_id) {
	if (!isset($_POST['product_details_nonce']) || !wp_verify_nonce($_POST['product_details_nonce'], 'save_product_details')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (isset($_POST['product_price'])) {
		update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
	}

	if (isset($_POST['product_price'])) {
		update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
	}

	if (isset($_POST['description'])) {
		update_post_meta($post_id, '_description', sanitize_text_field($_POST['description']));
	}
}
add_action('save_post', 'save_product_details');
