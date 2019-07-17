
<article id="post-<?php the_ID(); ?>" <?php post_class('bottom-margin'); ?> >
    <div class="post-meta__date">
        <span class="post-meta__date-d-m"><?php echo get_the_date('d M'); ?></span>
        <span class="post-meta__date-y"><?php echo get_the_date('Y'); ?></span>
    </div>
    <div class="article">
        <header class="article-header">
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
                /*the_content();*/ //shows the full post
                the_excerpt(); // show the post Excerpt, aka the post is truncated
            ?> 
        <button class="read-more"><a href="<?php the_permalink(); ?>">Read More</a></button>
    </div>
</article>