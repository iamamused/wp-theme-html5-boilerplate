<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
				
			<?php $custom_fields = get_post_custom(); ?>

			<h4 class="date"><time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F j, Y') ?></time></h4>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<?php if ( !@empty($custom_fields['h5bp_link_url'][0]) ) : ?>
					<h1 class="offsite"><a href="<?php 
						echo $custom_fields['h5bp_link_url'][0];
					?>"><?php the_title(); ?></a>&nbsp;<a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">→</a></h1>
					<? else: ?>
					<h1 class="onsite"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php endif; ?>
					<?php if (has_post_thumbnail()) : ?>
						<?php echo the_post_thumbnail('h5bp-post-image'); ?>
					<?php endif; ?>
				</header>
				<section>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</section>
				<footer>
					<?php wp_link_pages('before=<div class="post-page-links">Page:&after=</div>'); ?>
					<nav>
						<ul>
							<li><?php comments_popup_link('Leave your comment', 'One comment', '% comments'); ?><?php the_tags(' &bull; Tagged as: ', ', ', ''); ?></li>
							<li>Share on 
							<a href="http://twitter.com/home?status=Reading:+<?php urlencode(the_permalink()); ?>">Twitter</a>,
							<a href="http://www.facebook.com/share.php?u=<?php urlencode(the_permalink()); ?>">Facebook</a>,
							<a href="http://del.icio.us/post?v=4;url=<?php urlencode(the_permalink()); ?>">Delicious</a>,
							<a href="http://digg.com/submit?url=<?php urlencode(the_permalink()); ?>">Digg</a>,
							<a href="http://www.reddit.com/submit?url=<?php urlencode(the_permalink()); ?>">Reddit</a></li>
							<?php edit_post_link('Edit this post', '<li>', '</li>'); ?>
						</ul>
					</nav>
				</footer>
			</article>
	
		<?php endwhile; ?>

		<?php comments_template(); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
