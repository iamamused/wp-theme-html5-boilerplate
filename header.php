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

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="description" content="<?php bloginfo('tagline'); ?>">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/apple-touch-icon.png">


  <!-- CSS : implied media="all" -->
  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1">
  
  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Neuton:300,400,700,400italic' rel='stylesheet' type='text/css'>
  
  <link  href="http://fonts.googleapis.com/css?family=Damion:regular" rel="stylesheet" type="text/css" >
  <link  href="http://fonts.googleapis.com/css?family=Anton:regular" rel="stylesheet" type="text/css" >

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
 
  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
     Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
     For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="<?php bloginfo('template_url'); ?>/js/libs/modernizr-2.0.6.min.js"></script>

  <!-- WordPress Pingback url -->
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!-- wp_head() content added by plugins etc. This isn't ideal but it will work. -->	
  <?php wp_head(); ?>
  
</head>

<body <?php body_class(); ?>>


  <div id="container">
    <header id="header">
    	<a href="/"><img id="bookmark" src="<?php /* echo get_option('bookmark_image_url') */ ?><?php bloginfo('template_url'); ?>/images/bookmark.png" alt="<?php bloginfo('name');?>">
    		<nav><a href="">More</a></nav>
    </header>
    	
    <div id="main">
    	