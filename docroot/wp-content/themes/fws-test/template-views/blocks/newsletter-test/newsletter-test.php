<?php
/**
 * Template View for displaying Blocks
 *
 * @link https://internal.forwardslashny.com/starter-theme/#blocks-and-parts
 *
 * @package fws_starter_s
 */

// get template view values
$query_var = get_query_var( 'content-blocks', [] );

// set and escape template view values
$title = esc_textarea( $query_var['title'] ) ?? '';
$background = $query_var['background_image'] ?? [];
$mailChimp = $query_var['mailchimp_plugin_shortcode'] ?? [];

?>

<div class="newsletter-test" style="background-image: url('<?php echo $background['url'] ?>')">
	<div class="container">
		<div class="newsletter__row">
			<h2 class="newsletter__title"><?php echo $title; ?></h2>
			<form class="newsletter_form">
				<?php echo $mailChimp[0]->post_content; ?>
			</form>
		</div>
	</div>
</div><!-- .newsletter-test -->
