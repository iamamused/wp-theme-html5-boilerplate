<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
				
			<?php $custom_fields = get_post_custom(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F j, Y') ?></time>
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
							<?php if (has_tag()) : ?><li><?php the_tags(' &bull; Tagged with ', ', ', ''); ?></li><?php endif; ?>
							<?php edit_post_link('Edit this post', '<li>', '</li>'); ?>
						</ul>
					</nav>
				</footer>
			</article>
	
		<?php endwhile; ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
