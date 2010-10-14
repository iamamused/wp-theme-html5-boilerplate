<?php get_header(); ?>
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>

			<?php if ( get_post_type() == 'post' ) : ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F j, Y') ?></time>
				</header>
				<section>
					<?php the_post_thumbnail(array( 150, 150 ), array( 'class' => 'alignleft' )); ?>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</section>
				<footer>
					<?php wp_link_pages('before=<div class="post-page-links">Page:&after=</div>'); ?>
					<nav>
						<ul>
							<li><?php comments_popup_link('Leave your comment', 'One comment', '% comments'); ?><?php the_tags(' &bull; Tagged as: ', ', ', ''); ?></li>
							<li>Share on <a href="http://twitter.com/home?status=Currently reading: <?php the_title_attribute(); ?> <?php the_permalink(); ?>">Twitter</a>, <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title_attribute(); ?>">Facebook</a>, <a href="http://del.icio.us/post?v=4;url=<?php the_permalink(); ?>">Delicious</a>, <a href="http://digg.com/submit?url=<?php the_permalink(); ?>">Digg</a>, <a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute(); ?>">Reddit</a></li>
							<?php edit_post_link('Edit this post', '<li>', '</li>'); ?>
						</ul>
					</nav>
				</footer>
			</article>
			<?php endif; ?>

			<?php if ( get_post_type() == 'h5bp_link' ) : ?>
			<section id="link-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><a href="<?php 
					$custom_fields = get_post_custom();
					echo $custom_fields['url'][0];
				?>"><?php the_title(); ?></a>&nbsp;<a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">→</a></h1>
				<?php the_content('Read the rest of this entry &raquo;'); ?>					
			</section>
			<?php endif; ?>
			
			<?php if ( get_post_type() == 'h5bp_image' ) : ?>
			<section id="image-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="img">
					<img src="<?php 
						$custom_fields = get_post_custom();
						echo $custom_fields['img'][0];
					?>">
					<?php
					if (isset($custom_fields['credit'])) {
						echo apply_filters( 'the_content', $custom_fields['credit'][0] );
					}
					?>
					<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				</header>
				<section>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</section>
			</section>
			<?php endif; ?>


		<?php endwhile; ?>

		<?php comments_template(); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
