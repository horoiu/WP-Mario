<?php 

    /* Loads the main stylesheet file, styles.css */
    function blog_files() {
        wp_enqueue_style('blog_main_styles', get_stylesheet_uri());
    }

    add_action('wp_enqueue_scripts', 'blog_files');


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
        if($copyright_dates) {
            $copyright = "&copy; All rights reserved to Marian Horoiu, " . $copyright_dates[0]->firstdate;
            if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
                $copyright .= '-' . $copyright_dates[0]->lastdate;
            }
            $output = $copyright;
        }
        return $output;
    }
