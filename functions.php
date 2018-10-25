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

    function neuron_custom_post_type(){
    register_post_type('slider',
                       array(
                           'labels'      => array(
                               'name'          => __('Slides'),
                               'singular_name' => __('Slide'),
                           ),
                           'public'      => false,
                           'show_ui'      => true,
                           'supports'    => array('title','editor','custom-fields','thumbnail','page-attributes'),
                       )
        );
    }
    add_action('init', 'neuron_custom_post_type');

    function neuron_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Footer One', 'neuron_widgets_init' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets Footer One.', 'neuron_widgets_init' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Two', 'neuron_widgets_init' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets Footer Two.', 'neuron_widgets_init' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Two', 'neuron_widgets_init' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets Footer Two.', 'neuron_widgets_init' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
    }
    add_action( 'widgets_init', 'neuron_widgets_init' );


    function post_list_shortcode($atts){
        extract( shortcode_atts( array(
            'count' => 3,
        ), $atts) );
        
        $q = new WP_Query(
            array('posts_per_page' => $count, 'post_type' => 'post')
            );      
            
        $list = '<ul>';
        while($q->have_posts()) : $q->the_post();
            $idd = get_the_ID();
            $list .= '
            <div class="single_post_item">
                <h2>' .do_shortcode( get_the_title() ). '</h2>
                '.wpautop( $post_content ).'
                <p>'.$custom_field.'</p>
            </div>
            ';        
        endwhile;
        $list.= '</ul>';
        wp_reset_query();
        return $list;
    }
    add_shortcode('post_list', 'post_list_shortcode'); 



    /**
     * Add the navwalker.
     */
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';






























?>

