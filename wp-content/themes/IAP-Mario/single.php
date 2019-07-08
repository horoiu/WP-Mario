<?php get_header(); ?>



    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 content-area">
                    <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post(); 
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                            <footer>

                                <?php echo get_avatar(get_the_author_meta('user_email')); ?>
                                <h3>
                                <?php echo get_the_author_meta('user_firstname'); ?>
                                <?php echo get_the_author_meta('user_lastname'); ?>
                                <!-- facebook + twitter -->

                            </h3>
                            <p>
                                <?php echo get_the_author_meta('user_description'); ?>
                                </p>
                                
                            </footer>
                        </article>
                    <?php
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
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