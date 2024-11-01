<?php
/*Plugin Name: Wordpress.com Stats: Top Posts Widget
Plugin URI:http://pepijndevos.nl/2010/02/wordpress-com-stats-top-posts-widget/
Description: This plugin adds a sidebar widget, that is an excerpt of the 'Top Posts' section on the Wordpress Dashboard
Author: Pepijn de Vos
Version: 1.1
Author URI: http://pepijndevos.nl
*/

function top_posts($args) {
	extract($args); ?>
	<?php echo $before_widget . $before_title; ?>Top posts<?php echo $after_title; ?>
	<ul>
	<?php foreach($top_posts = stats_get_csv('postviews', "days=7&limit=5") as $post):
		$post = get_post($post['post_id']);
		if(!$post || $post->post_type != "post") continue; ?>

		<li><a href="<?php echo $post->guid; ?>"><?php echo $post->post_title; ?></a></li>
	<?php endforeach; ?>
	</ul>
	<?php echo $after_widget; ?>
<?php }

register_sidebar_widget("Top posts", "top_posts");
?>
