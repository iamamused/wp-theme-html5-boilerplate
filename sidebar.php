
<hr />

<aside id="sidebar">
	<?php if ( false && ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) ) : ?>
		<section>
			<h1>About this blog</h1>
			<p><?php bloginfo('description'); ?></p>
		</section>
		<section>
			<h1>Search</h1>
			<?php get_search_form(); ?>
		</section>
	<?php endif; ?>
</aside>

<hr />