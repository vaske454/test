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
		<h2 class="product-slider__title section-title"><?php echo $title; ?></h2>
		<div class="row">
			<?php $posts = $query->posts;
			foreach ($posts as $post) { ?>
				<div class="col-md-3 col-6">
					<?php
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
					?>
					<img src="<?php echo $image[0]; ?>" alt="Product image" class="product-slider__item-thumb">
					<div class="product-slider__item-content">
						<h3 class="product-slider__item-title title-small"><?php echo $post->post_title; ?></h3>
						<p class="product-slider__item-desc"><?php echo "$post->post_excerpt"; ?></p>
						<a href="javascript:;" class="btn">Learn More</a>
					</div>
				</div>
				<?php
			};
			?>
		</div>
	</div>
</div><!-- .latest-products-test -->
