<?php get_header(); ?>

    <div id="primary" class="container content-area">
        <main class="site-main row" role="main">
            <?php 
                $name = '';
                if (get_the_author_meta('display_name')) { 
                    $name = get_the_author_meta('display_name', $auth_id); }
                else {
                    $name = 'Stranger';
                }; ?>
                <div class="welcome-msg">
                    <p class="welcome-msg__text">Hello <?php echo $name; ?>, Welcome to my Blog!</p>
                    <i class="welcome-msg__lines fas fa-grip-lines"></i>
                </div>
            <?php 
            
            $i=0;
            if (have_posts()) :
                while (have_posts()): the_post();
                    get_template_part( 'template-parts/article-content' ); 
                endwhile;
            else :
                _e( 'There are no articles to show', 'iap' );
            endif; ?>
        </main>
        <button class="load-more">Load More</button>
    </div>
                    
<?php get_footer(); ?>