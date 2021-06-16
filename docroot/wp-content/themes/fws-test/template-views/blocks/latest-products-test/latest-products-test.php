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
$query = new WP_Query( array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
	)
);
?>

<div class="latest-products-test">
	<div class="container">
		<h2 class="latest-products-test__title section-title"><?php echo $title; ?></h2>

		<div class="latest-products-test__items js-products-slider row">


			<?php $posts = $query->posts;
			foreach ($posts as $post) {
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
						?>
				<div class="latest-products-test__item">
				<div class="latest-products-test__item-body">
						<a href="javascript:;" class="latest-products-test__item-thumb-holder">
							<img src="<?php echo $image[0]; ?>" alt="" class="latest-products-test__item-thumb">
						</a>
						<div class="latest-products-test__item-content">
							<h3 class="latest-products-test__item-title title-small"><a href="javascript:;"><?php echo $post->post_title; ?></a></h3>
							<p class="latest-products-test__item-desc"><?php echo "$post->post_excerpt"; ?></p>
							<a href="javascript:;" class="btn">Learn More</a>
						</div>
				</div>
			</div>
				<?php
			};
			?>



		</div>
	</div>
</div><!-- .latest-products-test -->
