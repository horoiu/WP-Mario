<?php 

    /* Loads the stylesheets & files */
    if ( ! function_exists( 'iap_scripts' ) ) :
        function iap_scripts() {
            wp_enqueue_style( 'fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), false, 'all' );
		    wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/css/bootstrap-grid.css', array(), false, 'all' );
            wp_enqueue_style( 'main-style', get_stylesheet_uri() , array(), false, 'all' );
            wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
        };

        add_action('wp_enqueue_scripts', 'iap_scripts');
    endif;

    if ( ! function_exists( 'iap_setup') ) :
        function iap_setup() {

            /* Set's the menu entries in the WP Dashboard*/
            register_nav_menus(
                array(
                    'primary' => __('Primary Menu', 'iaptheme'),
                    'secondary' => __('Secondary Menu', 'iaptheme'),
                )
            );

            // Add support for featured image
            add_theme_support( 'post-thumbnails' );
            
            // Add support for documents titles
            add_theme_support( 'title-tag' );
            
            /* Create image sizes based on our design */
            add_image_size( 'featured-image', 220, 180 ); 
            add_image_size( 'featured-image-small', 380, 255, true ); 
            add_image_size( 'featured-image-sticky', 1200, 350, true ); 

        };
        add_action( 'after_setup_theme', 'iap_setup' );
    endif;

    /* Add footer copyright years; gets the year from first and last posts */
    /* Function called from footer.php */
    function copyright_years() {
        global $wpdb;
        $copyright_dates = $wpdb->get_results("
            SELECT
            YEAR(min(post_date_gmt)) AS firstdate,
            YEAR(max(post_date_gmt)) AS lastdate
            FROM
            $wpdb->posts
            WHERE
            post_status = 'publish'
            ");
        $output = '';
        $auth = '<a class="footer-link" href="https://devspace.ro" target="_blank">Mario</a>';
        $link = '<a class="footer-link" href="https://devspace.ro" target="_blank">DevSpace.ro</a>';
        if($copyright_dates) {
            $copyright = "&copy; All rights reserved to " . $auth . " & " . $link . ", " . $copyright_dates[0]->firstdate;
            if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
                $copyright .= '-' . $copyright_dates[0]->lastdate;
            }
            $output = $copyright . ".";
        }
        return $output;
    };


