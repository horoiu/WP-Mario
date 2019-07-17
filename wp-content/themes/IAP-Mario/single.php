<?php get_header(); ?>



    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 content-area">
                    <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post(); 
                    ?>
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
                        <div class="container post-meta__date">
                            <p class="post-meta__date-d-m"><?php echo get_the_date('d M'); ?></p>
                            <p class="post-meta__date-y"><?php echo get_the_date('Y'); ?></p>
                        </div>
                        <h2><?php the_title(); ?></h2>
                            <?php
                                the_content(); //shows the full post
                                // the_excerpt(); // show the post Excerpt, aka the post is truncated
                            ?> 
                        <footer class="single-post__footer">
                            <span class="single-post__footer-comments"> <?php comments_number(); ?></span>
                            <span><button class="single-post__footer-next next-stories"><a href="<?php the_permalink(); ?>">Next Stories ></a></button></span>
                        </footer>
                    </article>
                    <?php
                        if ( comments_open() || get_comments_number() ) {
                            // comments_template();
                        }
                        endwhile; 
                    ?>
                </div>
                
                <?php 
                    // get_sidebar();
                ?>
            </div>
        </div>
    </section>

    <?php
        get_footer();
    ?>