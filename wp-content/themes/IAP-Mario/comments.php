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
		comment_form( array(
                            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                            'title_reply' => 'Post A Comment',
                            'title_reply_after'  => '</h2>',
                            'comment_field' => '<p class="comment-form-comment">
                                                    <label for="comment">' . _x( 'Write a good comment ' , 'noun' ) . '</label>
                                                    <textarea id="comment" name="comment" aria-required="true" placeholder="Comments"></textarea>
                                                </p>',
                            'label_submit' => 'POST',          
                            )
                        
                    ); ?>
            
        <div class="comments-list">
            <h2>Comments List</h2>
            <?php the_comments_navigation(); ?>
                <ol class="comment-list">
                    <?php
                        wp_list_comments(
                            array(
                                'style'       => 'ul',
                                'short_ping'  => true,
                                'avatar_size' => 120,
                            )
                        );
                    ?>
                </ol><!-- .comment-list -->
            <?php the_comments_navigation(); ?>
        </div>
        
        

</div><!-- .comments-area -->