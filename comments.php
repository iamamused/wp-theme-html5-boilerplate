<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die(); ?>


<?php if ( post_password_required() ) { return; } ?>


<?php if ( have_comments() ) : ?>

	<section class="comments" id="comments">
		<h2><?php comments_number('No comments', 'One comment', '% comments' );?></h2>

		<dialog>
			<?php wp_list_comments('callback=html5boilerplate_comment'); ?>
		</dialog>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav>
			<ul>
				<li><?php previous_comments_link('&laquo; Older Comments'); ?></li>
				<li><?php next_comments_link('Newer Comments &raquo;' ) ?></li>
			</ul>
		</nav>
		<?php endif; ?>
	</section>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

	<section id="respond" class="post-comments comment-form">
		<h2>Leave your comment</h2>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : 
			// Registration is required and user is not logged in ?>
				
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>

		<?php else : 
			// Registration is NOT required or user is already logged in. ?>
	
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
		
			<?php if ( is_user_logged_in() ) : 
				// User is logged in ?>	
			<p>
				Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
				<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
			</p>
			<dl>	
			<?php else : 
				// If user is not logged in ?>
	
			<dl>
				<dt><label for="author" <?php if ($req) echo "class=\"required\""; ?>>Name</label></dt>
				<dd><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "class=\"required\""; ?> /></dd>
				<dt><label for="email" <?php if ($req) echo "class=\"required\""; ?>>Email <span>(Not published)</span></label></dt>
				<dd><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "class=\"required\""; ?> /></dd>
				<dt><label for="url">Website</label></dt>
				<dd><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></dd>
				
			<?php endif; 
				// Always include comment box ?>
	
				<dt><label for="comment">Comment</label></dt>
				<dd><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></dd>
				<dt></dt>
				<dd><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /></dd>
			</dl>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		
		<?php endif; ?>
		
	</section>


<?php else : 
	// Comments are closed ?>

<?php endif; ?>
