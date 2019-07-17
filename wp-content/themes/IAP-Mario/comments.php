<?php   
    if ( post_password_required() ) {
        return;
    }
?>

<div id="comments" class="comments-area">
        
    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'iap' ); ?></p>
    <?php endif; ?>
    
	<?php
		comment_form(
            array(
                'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                'title_reply' => 'Post A Comment',
                'title_reply_after'  => '</h2>',
                'label_submit' => 'POST',
                // 'comment_field' => 'Write a good comment',
				
                )
            );
            ?>

            <?php the_comments_navigation(); ?>
                <ol class="comment-list">
                    <?php
                        wp_list_comments(
                            array(
                                'style'       => 'ol',
                                'short_ping'  => true,
                                'avatar_size' => 42,
                            )
                        );
                    ?>
                </ol><!-- .comment-list -->
            <?php the_comments_navigation(); ?>
        
        

</div><!-- .comments-area -->