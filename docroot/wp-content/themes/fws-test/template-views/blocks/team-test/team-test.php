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
$selectFields = $query_var['select_fields'] ?? [];
?>

<div class="team-test">
	<div class="container">
		<h2 class="section-title team-list--title"><?php echo $title; ?></h2>
		<div class="row">
					<?php foreach ($selectFields as $select) {

					$image = wp_get_attachment_image_src(get_post_thumbnail_id($select['select_first']->ID)); ?>
			<div class="col-lg-6 team-list__box">
				<div class="team-list__img-holder">
					<img src="<?php echo $image[0]?>" alt="Image">
				</div>
				<div class="team-list__content">
					<h3 class="team-list__content-title"><?php echo $select['select_first']->post_title ?></h3>
					<div class="team-list__content-text">
						<p> <?php
						echo $select['select_first']->post_content; ?>
						</p>
					</div>
					<a href="javascript:;" class="btn team-list__content-btn js-popup-trigger">Read More</a>

				</div>
				<div class="js-popup" style="display: none;">
					<h3 class="popup-title"><?php echo $select['select_first']->post_title ?></h3>
					<div class="popup-text">
						<p><?php
							echo $select['select_first']->post_content; ?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>

	</div>
</div><!-- .team-test -->
