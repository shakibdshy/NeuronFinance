<?php

    function neuron_theme_files(){
        wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.min.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/fonts/font-awesome/css/font-awesome.min.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'owlcarousel', get_template_directory_uri() .'/assets/css/owl.carousel.min.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'bootsnav', get_template_directory_uri() .'/assets/css/bootsnav.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'neuron_style', get_stylesheet_uri() );



        wp_enqueue_script('bootstrap', get_template_directory_uri() .'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '4.1', true );
        wp_enqueue_script('bootsnav', get_template_directory_uri() .'/assets/js/bootsnav.js', array('jquery'), '1.0', true );
        wp_enqueue_script('owlcarousel', get_template_directory_uri() .'/assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
        wp_enqueue_script('wow', get_template_directory_uri() .'/assets/js/wow.min.js', array('jquery'), '1.0', true );
        wp_enqueue_script('ajaxchimp', get_template_directory_uri() .'/assets/js/ajaxchimp.js', array('jquery'), '1.0', true );
        wp_enqueue_script('ajaxchimp-config', get_template_directory_uri() .'/assets/js/ajaxchimp-config.js', array('jquery'), '1.0', true );
        wp_enqueue_script('neuron-script', get_template_directory_uri() .'/assets/js/script.js', array('jquery'), '1.0', true );


    }
    add_action('wp_enqueue_scripts','neuron_theme_files');

    function neuron_theme_supports(){
        //add languages support
        load_theme_textdomain( 'neuron-finance', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        //Add Title
        add_theme_support( 'title-tag' );
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'neuron-finance' ),
        ) );
        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
        ) );
        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
    }
    add_action( 'after_setup_theme','neuron_theme_supports' );

    


    /**
     * Add the navwalker.
     */
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';






























?>

