<?php get_header(); ?>
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
			<header>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</header>
			<section>
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			</section>
			<footer>
				<?php wp_link_pages('before=<div class="post-page-links">Page:&after=</div>'); ?>
				<?php edit_post_link('Edit this page', '<p>', '</p>'); ?>
			</footer>
		</article>

		<?php endwhile; ?>
		
	<?php endif; ?>
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>
