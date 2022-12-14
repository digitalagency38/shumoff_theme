<?php
/**
 * shumof functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shumof
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}


require get_template_directory() . '/customizer-repeater/functions.php';
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shumof_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on shumof, use a find and replace
		* to change 'shumof' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'shumof', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'shumof' ),
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
			'shumof_custom_background_args',
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
add_action( 'after_setup_theme', 'shumof_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shumof_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shumof_content_width', 640 );
}
add_action( 'after_setup_theme', 'shumof_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shumof_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shumof' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shumof' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shumof_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shumof_scripts() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/src/dist/css/style.css', false, '1.1', 'all');
	wp_style_add_data( 'style', 'rtl', 'replace' );
	wp_enqueue_style( 'default_style', get_template_directory_uri() . '/style.css', false, '1.1', 'all');
	wp_style_add_data( 'default_style', 'rtl', 'replace' );
	// wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'wow.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js?_v=20221201010352', false, '1.1', true );
	if ( is_front_page() ) :
		wp_enqueue_script( 'main.js', get_template_directory_uri() . '/src/dist/js/front.min.js', false, '1.1', true );
	else :
		wp_enqueue_script( 'main.js', get_template_directory_uri() . '/src/dist/js/app.min.js', false, '1.1', true );
	endif;

	wp_enqueue_script( 'slidemenu.js', get_template_directory_uri() . '/js/slidemenu.js', false, '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'shumof_scripts' );

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



$portfolio_labels = array(
	'name' => 'Портфолио',
	'singular_name' => 'Портфолио',
	'add_new' => 'Добавить портфолио',
	'add_new_item' => 'Добавить портфолио',
	'edit_item' => 'Редактировать портфолио',
	'new_item' => 'Новое портфолио',
	'all_items' => 'Все портфолио',
	'search_items' => 'Искать портфолио',
	'not_found' =>  'Портфолио по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет портфолио.',
	'menu_name' => 'Портфолио'
);

$portfolio_args = array(
	'labels' => $portfolio_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'portfolio', $portfolio_args );



$reviews_labels = array(
	'name' => 'Отзывы',
	'singular_name' => 'Отзывы',
	'add_new' => 'Добавить отзыв',
	'add_new_item' => 'Добавить отзыв',
	'edit_item' => 'Редактировать отзыв',
	'new_item' => 'Новый отзыв',
	'all_items' => 'Все отзывы',
	'search_items' => 'Искать отзывы',
	'not_found' =>  'Отзывов по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет отзывов.',
	'menu_name' => 'Отзывы'
);

$reviews_args = array(
	'labels' => $reviews_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title', 'editor', 'thumbnail' )
);

register_post_type( 'reviews', $reviews_args );


$model_labels = array(
	'name' => 'Модели',
	'singular_name' => 'Модели',
	'add_new' => 'Добавить модель',
	'add_new_item' => 'Добавить модель',
	'edit_item' => 'Редактировать модель',
	'new_item' => 'Новая модель',
	'all_items' => 'Все модели',
	'search_items' => 'Искать модели',
	'not_found' =>  'Моделей по заданным критериям не найдено.',
	'not_found_in_trash' => 'В корзине нет моделей.',
	'menu_name' => 'Модели'
);

$model_args = array(
	'labels' => $model_labels,
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => false,
	'menu_icon' => 'dashicons-image-filter',
	'menu_position' => 4,
	'supports' => array( 'title' )
);

register_post_type( 'model', $model_args );




function mytheme_customize_register( $wp_customize ) {
	

	
	/*
	Добавляем секцию в настройки темы
	*/
	$wp_customize->add_section(
		// ID
		'data_site_section',
		// Arguments array
		array(
			'title' => 'Данные сайта',
			'capability' => 'edit_theme_options',
			'description' => "Тут можно указать данные сайта"
		)
	);



	/*
	Добавляем поле Телефон site_phone
	*/
	$wp_customize->add_setting(
		// ID
		'footer_menu_1',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'footer_menu_1_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Заголовок меню 1",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'footer_menu_1'
		)
	);

	/*
	Добавляем поле Телефон site_phone
	*/
	$wp_customize->add_setting(
		// ID
		'footer_menu_2',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'footer_menu_2_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Заголовок меню 2",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'footer_menu_2'
		)
	);

	/*
	Добавляем поле Телефон site_phone
	*/
	$wp_customize->add_setting(
		// ID
		'footer_menu_3',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'footer_menu_3_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Заголовок меню 3",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'footer_menu_3'
		)
	);


	/*
	Добавляем поле Телефон site_phone
	*/
	$wp_customize->add_setting(
		// ID
		'site_phone',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_phone_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Телефон",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_phone'
		)
	);
	/*
	Добавляем поле Телефон site_phone
	*/
	$wp_customize->add_setting(
		// ID
		'site_phone',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_phone_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Телефон",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_phone'
		)
	);

	/*
	Добавляем поле Адрес site_address
	*/
	$wp_customize->add_setting(
		// ID
		'site_address',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_address_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Адрес",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_address'
		)
	);
	/*
	Добавляем поле Время работы site_worktime
	*/
	$wp_customize->add_setting(
		// ID
		'site_worktime',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_worktime_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Время работы",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_worktime'
		)
	);
	/*
	Добавляем поле Почта site_email
	*/
	$wp_customize->add_setting(
		// ID
		'site_email',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_email_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Почта",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_email'
		)
	);
	/*
	Добавляем поле Название site_name
	*/
	$wp_customize->add_setting(
		// ID
		'site_name',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_name_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "Название",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_name'
		)
	);

	/*
	Добавляем поле ИНН site_inn
	*/
	$wp_customize->add_setting(
		// ID
		'site_inn',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_inn_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "ИНН",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_inn'
		)
	);

	/*
	Добавляем поле КПП site_kpp
	*/
	$wp_customize->add_setting(
		// ID
		'site_kpp',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_kpp_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "КПП",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_kpp'
		)
	);
	/*
	Добавляем поле ОГРН site_ogrn
	*/
	$wp_customize->add_setting(
		// ID
		'site_ogrn',
		// Arguments array
		array(
			'default' => '',
			'type' => 'option'
		)
	);
	$wp_customize->add_control(
		// ID
		'site_ogrn_control',
		// Arguments array
		array(
			'type' => 'text',
			'label' => "ОГРН",
			'section' => 'data_site_section',
			// This last one must match setting ID from above
			'settings' => 'site_ogrn'
		)
	);


	
	
	$wp_customize->add_setting( 'site_socials', array(
	'sanitize_callback' => 'customizer_repeater_sanitize'
	));
	$wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'site_socials', array(
		'label'   => esc_html__('Социальные сети','customizer-repeater'),
		'section' => 'data_site_section',
		'priority' => 1,
		'customizer_repeater_image_control' => true,
		'customizer_repeater_icon_control' => true,
		'customizer_repeater_title_control' => false,
		'customizer_repeater_link_control' => true,
	) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );



// function product_count_shortcode( ) {
// 	$count_posts = wp_count_posts( 'product' );
// 	return $count_posts->publish;
// }
// add_shortcode( 'product_count', 'product_count_shortcode' );

function maximum_api_filter($query_params) {
	$query_params['per_page']['maximum'] = 10000;
	$query_params['per_page']['default'] = 500;
	return $query_params;
}
add_filter('rest_product_collection_params', 'maximum_api_filter', 10, 1 );

function product_count_shortcode( ) {
	$count_posts = wp_count_posts( 'product' );
	return $count_posts->publish;
}
add_shortcode( 'product_count', 'product_count_shortcode' );


add_filter( 'woocommerce_product_categories_widget_dropdown_args', 'rv_exclude_wc_widget_categories' );




// Display variation's price even if min and max prices are the same
add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
	if ($value['price_html'] == '') {
	  $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
	}
	return $value;
}, 10, 3);