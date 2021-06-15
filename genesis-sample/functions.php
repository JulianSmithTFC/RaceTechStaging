<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function genesis_sample_localization_setup() {

	load_child_theme_textdomain( genesis_get_theme_handle(), get_stylesheet_directory() . '/languages' );

}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Registers the responsive menus.
if ( function_exists( 'genesis_register_responsive_menus' ) ) {
	genesis_register_responsive_menus( genesis_get_config( 'responsive-menus' ) );
}

add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function genesis_sample_enqueue_scripts_styles() {

	$appearance = genesis_get_config( 'appearance' );

	wp_enqueue_style(
		genesis_get_theme_handle() . '-fonts',
		$appearance['fonts-url'],
		[],
		genesis_get_theme_version()
	);

	wp_enqueue_style( 'dashicons' );

	if ( genesis_is_amp() ) {
		wp_enqueue_style(
			genesis_get_theme_handle() . '-amp',
			get_stylesheet_directory_uri() . '/lib/amp/amp.css',
			[ genesis_get_theme_handle() ],
			genesis_get_theme_version()
		);
	}

}

require (get_stylesheet_directory() . '/lib/tf-custom-stuff/objects/menu.class.php');

add_action( 'after_setup_theme', 'genesis_sample_theme_support', 9 );
/**
 * Add desired theme supports.
 *
 * See config file at `config/theme-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

add_action( 'after_setup_theme', 'genesis_sample_post_type_support', 9 );
/**
 * Add desired post type supports.
 *
 * See config file at `config/post-type-supports.php`.
 *
 * @since 3.0.0
 */
function genesis_sample_post_type_support() {

	$post_type_supports = genesis_get_config( 'post-type-supports' );

	foreach ( $post_type_supports as $post_type => $args ) {
		add_post_type_support( $post_type, $args );
	}

}

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );
add_image_size( 'genesis-singular-images', 702, 526, true );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 2.2.3
 *
 * @param array $args Original menu options.
 * @return array Menu options with depth set to 1.
 */
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' === $args['theme_location'] ) {
		$args['depth'] = 1;
	}

	return $args;

}

add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;
	return $args;

}

/**--------------Add CSS and JS Frameworks to Theme-----------------*/


//Font Awesome CDN
wp_register_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css' );
wp_enqueue_style('Font_Awesome');

//Google Fonts CDN
wp_register_style( 'Google_Fonts', 'https://fonts.googleapis.com/css?family=Abel|Montserrat|Oswald|Fjalla+One|Roboto+Condensed&display=swap' );
wp_enqueue_style('Google_Fonts');

//Bootstrap CDN
wp_register_style( 'Bootstrap_CSS', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' );
wp_enqueue_style('Bootstrap_CSS');

/**=======================================================================================================================================*/

function bootstrap_enqueue_scripts() {
    wp_enqueue_script( 'bootstrap_jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');
    wp_enqueue_script( 'theme-common', get_stylesheet_directory_uri() . '/js/common.js');
    wp_enqueue_script( 'theme-fixes', get_stylesheet_directory_uri() . '/js/theme-fixes.js');
    wp_enqueue_script( 'Bootstrap_jsOne', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
    wp_enqueue_script( 'Bootstrap_jsTwo', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js');
//    wp_enqueue_script( 'Bootstrap_jsThree', get_stylesheet_directory_uri() . '/MDB-Pro_4.19.1/js/mdb.min.js');
}
add_action( 'wp_enqueue_scripts', 'bootstrap_enqueue_scripts' );


/**--------------Register Sidebars-----------------*/

require (get_stylesheet_directory() . '/lib/tf-custom-stuff/sidebars.php');

if (is_singular( 'landing_pages' )){
    remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
}else{
    remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
    add_action( 'genesis_sidebar', 'secondary_sidebar_main', 20 );
}

/**-------------- OLD Register Widgets-----------------*/

//require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/widgets.php';

/**--------------Register Widgets-----------------*/

require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/widgets.php';

add_action( 'widgets_init', function(){
    register_widget( 'Menu_Main_Widget' );
});

/**--------------Add Before Header Menu-----------------*/

//add_action( 'genesis_before_header', 'add_menu_before_header', 5 );
//
//function add_menu_before_header() {
//
//}

/**--------------Add Remove and Replace Header-----------------*/

//remove initial header functions
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_do_nav', 12 );

//add in the new header markup - prefix the function name - here sm_ is used
add_action( 'genesis_header', 'custom_header' );

function custom_header(){

    if (is_singular( 'landing_pages' )){
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/header.php';
        add_action( 'genesis_sidebar', 'racetech_theme_wrapper_end', 20 );
    }else{
        require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/header.php';
    }
}

add_post_type_support( 'landing_pages', 'genesis-layouts' );

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_subnav', 10 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'custom_footer' );

function custom_footer() {
    require_once get_stylesheet_directory() . '/lib/tf-custom-stuff/footer.php';
}



if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

}


//require_once  get_stylesheet_directory() . '/lib/tf-custom-stuff/menu-functions.php';


function my_custom_template_include( $template ) {
    if ( get_query_var('post_type') == 'members' ) {

        if ( is_single() ) {
            if ( $single = locate_template( array( 'members/single.php') ) )
                return $single;
        }
        else { // loop
            return locate_template( array(
                'members/index.php',
                'members.php',
                'index.php'
            ));
        }

    }
    return $template;
}



function cat_product_title_breadcrumbs() {
    if ( is_product_category() )  {
        $args = array(
            'delimiter' => ' / ',
            'wrap_before' => '<div class="wc_cat_custom_breadcrumb">',
            'wrap_after' => '</div>'
        );

        echo woocommerce_breadcrumb( $args );

        echo '<h1 class="wc_cat_custom_title">';
        echo single_cat_title();
        echo '</h1>';

    }elseif (is_product()){
        $args = array(
            'delimiter' => ' / ',
            'wrap_before' => '<div class="wc_product_custom_breadcrumb">',
            'wrap_after' => '</div>'
        );

        echo woocommerce_breadcrumb( $args );

    }

}

add_action( 'genesis_before_loop' , 'cat_product_title_breadcrumbs' );


//Adding ShortCodes
include ( get_stylesheet_directory() . '/lib/tf-custom-stuff/custom_shortcodes.php' );



