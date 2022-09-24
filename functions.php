<?php

require_once get_template_directory(). '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory(). '/inc/halim-activation.php';
require_once get_template_directory(). '/inc/halim-demo-import.php';
require_once get_template_directory(). '/inc/halim-acf-data.php';

function wtd_setup(){
       add_theme_support('title-tag');
       add_theme_support('post-thumbnails',array('post','sliders','teams','testimonials','portfolio','gallerys'));
      
       register_nav_menus(array(
              'primary-menu'=> __('Primary menu', 'wtd')
       ));
       
}
add_action( 'after_setup_theme', 'wtd_setup');


function halim_assets() {
       wp_enqueue_style( 'font-poppins', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600,700', array(), '1.0.0', 'all' );
       wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );
       wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0', 'all' );
       wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
       wp_enqueue_style( 'font-awsome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );
       wp_enqueue_style( 'popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0', 'all' );
       wp_enqueue_style( 'carosoul', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '1.0.0', 'all' );
       
     
      
       wp_enqueue_script( 'min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'imageload', get_template_directory_uri() . '/assets/js/imageloaded.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', array(), '1.0.0', true );
       wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );     
}
add_action( 'wp_enqueue_scripts', 'halim_assets');


function acf_css() {
       ?>
       <style>

       .header-top{
              background-color:<?php the_field('header_background','option');?>
       }
       </style>
    <?php       
}
add_action('wp_head','acf_css');

if( function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Halim Options','wtd',
		'menu_title'	=> 'Halim Options','wtd',
		'menu_slug' 	=> 'halim-options',
		'capability'	=> 'edit_posts',
		'redirect'	=> false,
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Halim Header Settings','wtd',
		'menu_title'	=> 'Header','wtd',
		'parent_slug'	=> 'halim-options',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Halim About Settings','wtd',
		'menu_title'	=> 'About','wtd',
		'parent_slug'	=> 'halim-options',
	));
       
       acf_add_options_sub_page(array(
		'page_title' 	=> 'Halim FAQ & Skills Settings','wtd',
		'menu_title'	=> 'FAQ & Skills','wtd',
		'parent_slug'	=> 'halim-options',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Halim CTA Settings','wtd',
		'menu_title'	=> 'CTA','wtd',
		'parent_slug'	=> 'halim-options',
	));
       acf_add_options_sub_page(array(
		'page_title' 	=> 'Halim Contact Settings','wtd',
		'menu_title'	=> 'Contact','wtd',
		'parent_slug'	=> 'halim-options',
	));
       acf_add_options_sub_page(array(
		'page_title' 	=> 'Halim Footer Settings','wtd',
		'menu_title'	=> 'Footer','wtd',
		'parent_slug'	=> 'halim-options',
	));
	
}
// ----register-sidebar----//
function wtd_widgets_init() {
       register_sidebar( array(
           'name'          => __( 'Main Sidebar', 'wtd' ),
           'id'            => 'sidebar-1',
           'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wtd' ),
           'before_widget' => '<div class="single-sidebar">',
           'after_widget'  => '</div>',
           'before_title'  => '<h4>',
           'after_title'   => '</h4>',
       ) );
       register_sidebar( array(
           'name'          => __( 'Footer 1', 'wtd' ),
           'id'            => 'footer-1',
           'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wtd' ),
           'before_widget' => '<div class="single-footer footer-logo">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3>',
           'after_title'   => '</h3>',
       ) ); 
       register_sidebar( array(
           'name'          => __( 'Footer 2', 'wtd' ),
           'id'            => 'footer-2',
           'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wtd' ),
           'before_widget' => '<div class="single-footer footer-logo">',
           'after_widget'  => '</div>',
           'before_title'  => '<h4>',
           'after_title'   => '</h4>',
       ) ); 
       register_sidebar( array(
           'name'          => __( 'Footer 3', 'wtd' ),
           'id'            => 'footer-3',
           'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'wtd' ),
           'before_widget' => '<div class="single-footer footer-logo">',
           'after_widget'  => '</div>',
           'before_title'  => '<h4>',
           'after_title'   => '</h4>',
       ) );
   }
   add_action( 'widgets_init', 'wtd_widgets_init');

   