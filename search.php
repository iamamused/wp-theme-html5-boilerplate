<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		
		<h1>Search results for &ldquo;<?php echo $s; ?>&rdquo;</h1>

		<?php while (have_posts()) : the_post(); ?>
		
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p>by <?php the_author(); ?> on <?php the_time('F j, Y') ?></p>
			</header>
			<section>
				<?php the_excerpt(); ?>
			</section>		
			<footer>
				<ul>
					<li><?php comments_popup_link('Leave your comment', 'One comment', '% comments'); ?><?php the_tags(' &bull; Tagged as: ', ', ', ''); ?></li>
					<li>Share on <a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>">Twitter</a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>">Facebook</a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>">Delicious</a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>">Digg</a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>">Reddit</a></li>
					<?php edit_post_link('Edit this post', '<li>', '</li>'); ?>
				</ul>
			</footer>
		</section>

		<?php endwhile; ?>
		
		<?php if (show_posts_nav()) : ?>
		
		<nav>
			<ul>
				<li><?php next_posts_link('&laquo; Previous page') ?></li>
				<li><?php previous_posts_link('Next page &raquo;') ?></li>
			</ul>
		</nav>
		
		<?php endif; ?>
		
	<?php else : ?>
		
		<h1>Nothing found for &ldquo;<?php echo $s; ?>&rdquo;</h1>

		<?php get_search_form(); ?>
		
		<script type="text/javascript">
			// Focus the search field.
			$(function(){document.getElementById('s') && document.getElementById('s').focus();});
		</script>
		
	<?php endif; ?>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
