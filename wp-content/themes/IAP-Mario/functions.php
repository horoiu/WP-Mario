<?php 

    /* Loads the stylesheets & files */
    if ( ! function_exists( 'iap_scripts' ) ) :
        function iap_scripts() {
            wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), false, 'all' );
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



// Load-More button function
function my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/load-more.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );

// AJAS function for Load-More button
function loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'template-parts/article-content' );
			// for the test purposes comment the line above and uncomment the below one
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}