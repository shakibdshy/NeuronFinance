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
        wp_enqueue_script('neuron-script', get_template_directory_uri() .'/assets/js/script.js', array('jquery'), '1.0', true );


    }
    add_action('wp_enqueue_scripts','neuron_theme_files');

    function admin_custom_scripts(){
        wp_enqueue_media();
        wp_enqueue_script( 'custom_admin_scripts', get_template_directory_uri() .'/assets/js/custom_admin.js', array('jquery'), true);
    }
    add_action( 'admin_enwqueue_scripts','admin_custom_scripts');

    function neuron_theme_supports(){
        //add languages support
        load_theme_textdomain( 'neuron-finance', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        //Add Title
        add_theme_support( 'title-tag' );

        //Support Shortcode
        add_filter( 'widget_text','do_shortcode' );
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
            'name'          => esc_html__( 'Footer Three', 'neuron_widgets_init' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets Footer Three.', 'neuron_widgets_init' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Four', 'neuron_widgets_init' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets Footer Four.', 'neuron_widgets_init' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );
        register_widget('latest_post_Widget');
    }
    add_action( 'widgets_init', 'neuron_widgets_init' );


    class latest_post_Widget extends WP_Widget{
        public function __construct(){
            parent::__construct('latest_post', 'latest_post_box', array(
                'description' => 'Latest post contained with title, image'
            ));
        }

        public function widget($args, $instance){
            ?>
            
            <li>
                <img src="<?php echo $instance['latest_post_box'];?>" />
                <p><a href="<?php get_the_permalink(); ?>"><?php echo $instance['post_title'];?></a></p>
                <span><?php get_the_date('d F Y'); ?></span>
            </li>

            <?php
        }

        public function form($instance){
            ?>

            <p>
                <label for="<?php echo $this->get_field_id('title');?>">Title:</label>
                <input type="text" value="<?php echo $instance['title']; ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title');?>" class="widefat">
            </p>
            <p>
                <button class="button" id="media_image">Upload Image</button>
                <input name="<?php echo $this->get_field_name('latest_post_box');?>" value="<?php echo $instance['latest_post_box']; ?>" type="hidden" class="image">
                <div class="image_show" >
                    <img src="<?php echo $this->get_field_name('latest_post_box');?>" width="300" height="auto" alt="">
                </div>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('post_title');?>">Post Title</label>
                <textarea name="<?php echo $this->get_field_name('post_title'); ?>" id="<?php echo $this->get_field_id('post_title');?>" class="widefat"><?php echo $instance['post_title']; ?></textarea>
            </p>

            <?php
        }
    }


    function neuron_widgets_shortcode($atts){
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
            <li>
                '.get_the_post_thumbnail($idd, 'thumbnail').'
                <p><a href="'.get_permalink().'">'.get_the_title().'</a></p>
                <span>'.get_the_date('d F Y', $idd).'</span>
            </li>
            ';        
        endwhile;
        $list.= '</ul>';
        wp_reset_query();
        return $list;
    }
    add_shortcode('thumb_post', 'neuron_widgets_shortcode'); 



    /**
     * Add the navwalker.
     */
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';






























?>

