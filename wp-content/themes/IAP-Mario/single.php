<?php get_header(); ?>



    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 content-area">
                    <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post(); 
                    ?>
                        <article id="post-<?php the_ID(); ?>" >
                            <div class="post-meta__date">
                                <span class="post-meta__date-d-m"><?php echo get_the_date('d M'); ?></span>
                                <span class="post-meta__date-y"><?php echo get_the_date('Y'); ?></span>
                            </div>
                            <div class="article">
                                <header class="article-header margin-left">
                                    <span class="post-category">cat : <?php the_category(' , '); ?></span>
                                    <span class="post-category__separator-line">|</span>
                                    <i class="post-category__separator-likes fas fa-heart"></i>
                                    <span class="post-category__separator-likes-no"> xxx Likes</span>
                                    <span class="post-category__separator-line">|</span>
                                    <i class="post-category__separator-comment fas fa-comment-alt"></i>
                                    <span class="post-category__separator-comment-no"> <?php comments_number(); ?></span>
                                </header>
                                <h2><?php the_title(); ?></h2>
                                <?php
                                    the_content(); //shows the full post
                                    ?> 
                                <img class="article-image"><?php the_post_thumbnail('featured-image-small');?></img>
                                <div class="article-tags"><?php the_tags( 'TAGS ', ' , ', '' ); ?></div>
                            </div>
                            <footer class="single-post__footer">
                                <span class="single-post__footer-comments"> <?php comments_number(); ?></span>
                                <button class="single-post__footer-next next-stories"><a href="<?php the_permalink(); ?>">Next Stories ></a></button>
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