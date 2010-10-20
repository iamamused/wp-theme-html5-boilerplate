<?php

/*
UPDATE `wp_posts` set post_type='post' WHERE post_type='h5pb_image' or post_type='h5pb_link';

UPDATE `wp_postmeta` set meta_key='h5bp_image_url' WHERE meta_key='img';
UPDATE `wp_postmeta` set meta_key='h5bp_image_cite' WHERE meta_key='credit';
UPDATE `wp_postmeta` set meta_key='h5bp_link_url' WHERE meta_key='url';
*/

// Add default posts and comments RSS feed links to head
add_theme_support('automatic-feed-links');

// Enables the navigation menu ability
add_theme_support('menus');

// Enables post-thumbnail support

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
add_image_size( 'h5bp-post-image', 600, 9999 ); // Permalink thumbnail size

// Removes inline CSS style for Recent Comments widget
function html5boilerplate_post_thumbnail_html( $html ) {

	// strip out width and height, let css handle it.
	$html = preg_replace('/(width|height)="[0-9]+"[ ]*/', '', $html);

global $id;
$attachment_id = get_post_thumbnail_id( $id );
	        

$attachment =& get_post($attachment_id);

/*
  ["ID"]=>
  int(736)
  ["post_author"]=>
  string(1) "1"
  ["post_date"]=>
  string(19) "2010-10-15 03:22:42"
  ["post_date_gmt"]=>
  string(19) "2010-10-15 03:22:42"
  ["post_content"]=>
  string(11) "Description"
  ["post_title"]=>
  string(11) "Image Title"
  ["post_excerpt"]=>
  string(7) "Caption"
  ["post_status"]=>
  string(7) "inherit"
  ["comment_status"]=>
  string(6) "closed"
  ["ping_status"]=>
  string(6) "closed"
  ["post_password"]=>
  string(0) ""
  ["post_name"]=>
  string(16) "iphone_stencil-2"
  ["to_ping"]=>
  string(0) ""
  ["pinged"]=>
  string(0) ""
  ["post_modified"]=>
  string(19) "2010-10-15 03:22:42"
  ["post_modified_gmt"]=>
  string(19) "2010-10-15 03:22:42"
  ["post_content_filtered"]=>
  string(0) ""
  ["post_parent"]=>
  int(723)
  ["guid"]=>
  string(88) "http://dev.jeffreysambells.com/wordpress/wp-content/uploads/2010/09/iPhone_stencil-2.jpg"
  ["menu_order"]=>
  int(0)
  ["post_type"]=>
  string(10) "attachment"
  ["post_mime_type"]=>
  string(10) "image/jpeg"
  ["comment_count"]=>
  string(1) "0"
  ["ancestors"]=>
  array(1) {
    [0]=>
    int(723)
  }
  ["filter"]=>
  string(3) "raw"
}
*/
	return '<figure title="'.$attachment->post_excerpt.'">' 
		. $html 
		. ( ( strlen($attachment->post_content) > 0 ) ? '<figcaption>'.apply_filters( 'the_content', $attachment->post_excerpt ).'</figcaption>' : '' )
		. '</figure>';
}
add_filter( 'post_thumbnail_html', 'html5boilerplate_post_thumbnail_html' );


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
// Used in comments.php: wp_list_comments('callback=html5boilerplate_comment')
function html5boilerplate_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <dt <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>-author">
      <?php /* echo get_avatar($comment,$size='54');*/ ?>
      <?php comment_author_link(); ?> <time datetime="">on <?php comment_date() ?> at <?php comment_time() ?></time> 
      <a href="#comment-<?php comment_ID() ?>" title="Permanent Link for this comment">#permalink</a>
   </dt>
   <dd <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>-body">
	<?php if ($comment->comment_approved == '0') : ?>
		<p><strong>Your comment is awaiting moderation.</strong></p>
	<?php endif; ?>
	<?php comment_text(); ?>
	<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link('Edit this comment', ' ', ''); ?>
	</dd>
	<?php 
}

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

function html5boilerplate_admin_init(){
	add_meta_box("html5boilerplate_link_meta", "Link Meta", "html5boilerplate_link_meta", "post", "normal", "low");
}
add_action("admin_init", "html5boilerplate_admin_init");
 
function html5boilerplate_link_meta(){
  global $post;
  $custom = get_post_custom($post->ID);
  $h5bp_link_url = $custom["h5bp_link_url"][0];
  ?>
  <label>href:</label>
  <input name="h5bp_link_url" size="100" value="<?php echo $h5bp_link_url; ?>" />
  <?php
}
 

// Custom post type fields
function html5boilerplate_save_details(){
	global $post;
	$post_type = get_post_type($post->ID);
	if($post_type == 'post') {
		update_post_meta($post->ID, "h5bp_link_url", $_POST["h5bp_link_url"]);
	}
}
add_action('save_post', 'html5boilerplate_save_details');

function html5boilerplate_the_permalink_rss($file) {
	$custom_fields = get_post_custom();
	if ( !@empty($custom_fields['h5bp_link_url']) ) {
		return $custom_fields['h5bp_link_url'][0];
	}
	return $file;
}
add_filter('the_permalink_rss', 'html5boilerplate_the_permalink_rss');

function html5boilerplate_rss_footers($content) {
	$custom_fields = get_post_custom();
	if ( !@empty($custom_fields['h5bp_link_url']) ) {
    	return $content .= '<p><a href="' . get_permalink() . '">Permalink</a></p>';
    }
    return $content;
}
add_filter('the_excerpt_rss', 'html5boilerplate_rss_footers');
add_filter('the_content_rss', 'html5boilerplate_rss_footers');

function html5boilerplate_rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<p>' . get_the_post_thumbnail($post->ID,'h5bp-post-image') .'</p>' . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'html5boilerplate_rss_post_thumbnail');
add_filter('the_content_feed', 'html5boilerplate_rss_post_thumbnail');

////////////////
// Theme Options
////////////////


// create custom plugin settings menu
function h5bp_register_mysettings() {
	register_setting( 'h5bp-settings-group', 'bookmark_image_url' );
}

function h5bp_create_menu() {
	$info = get_theme_data( dirname(__FILE__) . '/style.css' );
    add_theme_page($info['Name'] . ' Options', $info['Name'] . ' Options', 'edit_themes', basename(__FILE__), 'h5bp_settings_page');
	add_action( 'admin_init', 'h5bp_register_mysettings' );
}
add_action('admin_menu', 'h5bp_create_menu');



function h5bp_settings_page() {
	$info = get_theme_data( dirname(__FILE__) . '/style.css' );

?>
<div class="wrap">
<h2><?php echo $info['Name'] . 'Options' ?></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'h5bp-settings-group' ); ?>

    <table class="form-table">
        <tr valign="top">
        <th scope="row">Bookmark Image URL</th>
        <td><input type="text" name="bookmark_image_url" value="<?php echo get_option('bookmark_image_url'); ?>" /></td>
        </tr>
         
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<?php 
} 
