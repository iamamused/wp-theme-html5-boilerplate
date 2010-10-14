<?php get_header(); ?>

	<section>
	
		<h1>This is not the page you were looking for.</h1>
				
		<p>(Psst... try searcing)</p>
		
		<?php get_search_form(); ?>
				
		<script type="text/javascript">
			// Focus the search field
			$(function(){document.getElementById('s') && document.getElementById('s').focus();});
		</script>
		
	</section>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
