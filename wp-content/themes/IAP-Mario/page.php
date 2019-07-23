<?php
    get_header();

    while(have_posts()) {
        the_post(); ?>
            <main class="page-content">
                <!-- <h1><?php the_title(); ?></h1> -->
                <?php the_content(); ?>
            </main>
    <?php }

    get_footer();   
?>