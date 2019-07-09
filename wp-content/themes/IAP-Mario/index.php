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
                <p class="welcome-msg">Hello <?php echo $name; ?>, Welcome to my Blog!</p>
                <i class="welcome-msg__lines fas fa-grip-lines"></i>
            <?php 
            
            $i=0;
            if (have_posts()) :
                while (have_posts()): the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bottom-margin'); ?> >
                        <header class="article-header">
                            <span class="post-category">cat : <?php the_category(); ?></span>
                            <span class="post-category__separator-line">|</span>
                            <i class="post-category__separator-likes fas fa-heart"></i>
                            <span class="post-category__separator-likes-no"> xxx Likes</span>
                            <span class="post-category__separator-line">|</span>
                            <i class="post-category__separator-comment fas fa-comment-alt"></i>
                            <span class="post-category__separator-comment-no"> <?php comments_number(); ?></span>
                        </header>
                        <h2><?php the_title(); ?></h2>
                            <?php 
                                /*the_content();*/ //shows the full post
                                the_excerpt(); // show the post Excerpt, the post is truncated
                            ?> 

                        <button class="read-more"><a href="<?php the_permalink(); ?>">Read more</a></button>
                        <p></p>
                    </article>
            <?php 
                endwhile;
                else :
                    echo _e( 'There are no articles to show', 'iap' );
                endif; ?>
        </main>
    </div>
                    
<?php get_footer(); ?>