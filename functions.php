<?php

// Add default posts and comments RSS feed links to head
if ( function_exists('add_theme_support') ) add_theme_support('automatic-feed-links');

// Enables the navigation menu ability
if ( function_exists('add_theme_support') ) add_theme_support('menus');

// Enables post-thumbnail support
if ( function_exists('add_theme_support') ) add_theme_support('post-thumbnails');

// Adds callback for custom TinyMCE editor stylesheets 
if ( function_exists('add_editor_style') ) add_editor_style();

// This theme uses wp_nav_menu()
function register_my_menus() {
	register_nav_menus(
		array(
			'menu-1' => __( 'Top menu' )
		)
	);
	
	wp_enqueue_script('jquery');
}
add_action( 'init', 'register_my_menus' );

// Registers a widgetized sidebar and replaces default WordPress HTML code with a better HTML
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<section>',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

// Returns TRUE if more than one page exists. Useful for not echoing .post-navigation HTML when there aren't posts to page
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}

// Removes inline CSS style for Recent Comments widget
function html5boilerplate_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'html5boilerplate_remove_recent_comments_style' );

// Custom commments HTML
function html5boilerplate_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <dt <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>-author">
      <?php echo get_avatar($comment,$size='54'); ?>
      <a href="#comment-<?php comment_ID() ?>" title="Permanent Link for this comment">#</a>
      <?php comment_author_link(); ?> <time datetime="">on <?php comment_date() ?> at <?php comment_time() ?></time> 
   </dt>
   <dd <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>-body">
	<?php if ($comment->comment_approved == '0') : ?>
		<p><strong>Your comment is awaiting moderation.</strong></p>
	<?php endif; ?>
	<?php comment_text(); ?>
	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link('Edit this comment', ' ', ''); ?>
	</dd>
<?php }

// Adds a handy 'tag-cloud' class to the Tag Cloud Widget for better styling
function html5boilerplate_tag_cloud($tags) {
	$tag_cloud = '<aside class="tag-cloud">' . $tags . '</aside>';
	return $tag_cloud;
}
add_action('wp_tag_cloud', 'html5boilerplate_tag_cloud');

// Footer
function html5boilerplate_footer() { ?>
	<footer id="footer">
		<p>Proudly powered by <a href="http://www.wordpress.org">WordPress</a> and <a href="http://www.jeffreysambells.com/themes/html5boilerplate/" title="Free WordPress theme">html5boilerplate</a>, a theme by <a href="http://www.jeffreysambells.com" title="Web Designer / Developer">Jeffrey Sambells</a>. <a href="<?php bloginfo('rss2_url'); ?>" title="Syndicate this site using RSS"><acronym title="Really Simple Syndication">RSS</acronym> Feed</a>.</p>
	</footer>
<?php } 
add_action('wp_footer', 'html5boilerplate_footer');

function html5boilerplate_create_post_type() {
	register_post_type( 'h5bp_link',
	  array(
	    'labels' => array(
	      'name' => __( 'Post Links' ),
	      'singular_name' => __( 'Post Link' )
	    ),
	    'supports' => array( 'title', 'editor' ),
	    'public' => true,
	    'rewrite' => array( 'slug' => 'link', 'with_front' => false ),
	  )
	);
	register_post_type( 'h5bp_image',
	  array(
	    'labels' => array(
	      'name' => __( 'Post Images' ),
	      'singular_name' => __( 'Post Image' )
	    ),
	    'supports' => array( 'title', 'editor' ),
	    'public' => true,
	    'rewrite' => array( 'slug' => 'image', 'with_front' => false ),
	  )
	);
}
add_action( 'init', 'html5boilerplate_create_post_type' );

function html5boilerplate_query_post_type($query) {
	
	if (is_preview()) {
		return $query;
	}
	
	//if( is_category() || is_tag() || is_home() ) {
    	$post_type = get_query_var('post_type');
		if($post_type) {
		    $post_type = array_merge(
		    	(array)$post_type, 
		    	array( 'nav_menu_item' )
		    );
		} else {
			//array(7) { [0]=> string(4) "post" [1]=> string(4) "page" [2]=> string(10) "attachment" [3]=> string(8) "revision" [4]=> string(13) "nav_menu_item" [5]=> string(9) "h5bp_link" [6]=> string(10) "h5bp_image" }
		    if (is_feed()) {
		    	$post_type = array('post','h5bp_link','h5bp_image');
		    } else {
		    	$post_type = get_post_types();
		    }
		}
    	$query->set('post_type',$post_type);
	//}
	return $query;
}
add_filter('pre_get_posts', 'html5boilerplate_query_post_type');



function html5boilerplate_admin_init(){
	add_meta_box("html5boilerplate_link_meta", "Link Meta", "html5boilerplate_link_meta", "h5bp_link", "normal", "low");
  	add_meta_box("html5boilerplate_image_meta", "Image Meta", "html5boilerplate_image_meta", "h5bp_image", "normal", "low");
}
 
function html5boilerplate_link_meta(){
  global $post;
  $custom = get_post_custom($post->ID);
  $url = $custom["url"][0];
  ?>
  <label>href:</label>
  <input name="url" size="100" value="<?php echo $url; ?>" />
  <?php
}
 
function html5boilerplate_image_meta() {
  global $post;
  $custom = get_post_custom($post->ID);
  $designers = $custom["img"][0];
  $developers = $custom["credit"][0];
  ?>
  <p><label>href:</label><br />
  <textarea cols="50" rows="5" name="img"><?php echo $designers; ?></textarea></p>
  <p><label>Credit:</label><br />(Usel &lt;cite&gt; where appropriate.)<br />
  <textarea cols="50" rows="5" name="credit"><?php echo $developers; ?></textarea></p>
  <?php
}
add_action("admin_init", "html5boilerplate_admin_init");


// Custom post type fields
function html5boilerplate_save_details(){
	global $post;
	$post_type = get_post_type($post->ID);
	if($post_type == 'h5bp_link') {
		update_post_meta($post->ID, "url", $_POST["url"]);
	} else if($post_type == 'h5bp_image') {
		update_post_meta($post->ID, "img", $_POST["img"]);
		update_post_meta($post->ID, "credit", $_POST["credit"]);
	}
}
add_action('save_post', 'html5boilerplate_save_details');


function html5boilerplate_the_permalink_rss($file) {
	if (get_post_type() == 'h5bp_link') {
		$custom_fields = get_post_custom();
		return $custom_fields['url'][0];
	}
	return $file;
}
add_filter('the_permalink_rss', 'html5boilerplate_the_permalink_rss');

function html5boilerplate_rss_footers($content) {
    if (get_post_type() == 'h5bp_link') {
    	return $content .= '<p><a href="' . get_permalink() . '">Permalink</a></p>';
    }
    return $content;
}
add_filter('the_excerpt_rss', 'html5boilerplate_rss_footers');
add_filter('the_content_rss', 'html5boilerplate_rss_footers');
