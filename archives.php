<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php if (is_category()) : ?>

			<h1>Archive for the &ldquo;<?php single_cat_title(); ?>&rdquo; category</h1>

	 	<?php elseif( is_tag() ) : ?>

			<h1>Posts Tagged &ldquo;<?php single_tag_title(); ?>&rdquo;</h1>

		<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>

			<h1>Blog Archives</h1>

	 	<?php endif; ?>
			
		<?php while (have_posts()) : the_post(); ?>
		
		<section id="archive-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</header>
			<section>
				<?php the_content() ?> 
			</section>
			<section>
				<h2>Archives by Month:</h2>  
			    <ul><?php wp_get_archives('type=monthly'); ?></ul>  
			</section>
			<section>
				<h2>Archives by Subject:</h2>  
			    <ul><?php wp_list_categories(); ?></ul>
			</section>  
			<footer>
			</footer>
		</section>
		
		<?php endwhile; ?>
		
		<?php if (show_posts_nav()) : ?>
		
		<nav class="post-navigation">
			<ul>
				<li><?php next_posts_link('&laquo; Previous page') ?></li>
				<li><?php previous_posts_link('Next page &raquo;') ?></li>
			</ul>
		</nav>
		
		<?php endif; ?>
		
	<?php else : ?>

		<p>There are no posts.</p>
		<p>Try searching:</p>
	
		<?php get_search_form(); ?>
	
	<?php endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
