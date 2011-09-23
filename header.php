<!doctype html>
<!--

Theme: HTML5 Bolierplate WordPress Theme
Original Author: Jeffrey Sambells
URL: http://github.com/iamamused/wp-theme-html5-boilerplate

Like this theme? Want to "borrow" aspects of it? No Problem!

This theme is based on the http://html5boilerplate.com project and can
be found in my github repos over at http://github.com/iamamused

I'd kindly ask that if you're going to "borrow" it, please change up
the CSS and design so it's at least not identical to my site.

Thanks,

Jeffrey 

-->
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('tagline'); ?>">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon.png">


  <!-- CSS : implied media="all" -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1">

 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="<?php bloginfo('template_url'); ?>/js/modernizr-1.5.min.js"></script>


  <!-- Pingback url -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!-- wp_head() content added by plugins etc. -->	
  <?php wp_head(); ?>

	<link  href="http://fonts.googleapis.com/css?family=Damion:regular" rel="stylesheet" type="text/css" >
	<link  href="http://fonts.googleapis.com/css?family=Anton:regular" rel="stylesheet" type="text/css" >
  <link  href="http://fonts.googleapis.com/css?family=Metrophobic:regular" rel="stylesheet" type="text/css" >
  
</head>

<body <?php body_class(); ?>>


  <div id="container">
    <header id="header">
    	<a href="/"><img id="bookmark" src="<?php /* echo get_option('bookmark_image_url') */ ?><?php bloginfo('template_url'); ?>/images/bookmark.png" alt="<?php bloginfo('name'); ?> Bookmark"></a>
    
		<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

		<nav>
			<?php wp_nav_menu( array( 
				'theme_location' => 'menu-1',
				'sort_column' => 'menu_order',
				'container_class' => 'menu-header', 
			) ); ?>
		</nav>
		
    </header>
    
    <div id="main">
    
