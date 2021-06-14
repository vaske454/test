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
$taxonomy = $query_var['taxonomy'] ?? [];

//var_dump($taxonomy);

?>
<!--$nesto = get_the_post_thumbnail($taxonomy->term_id);-->
<div class="top-product-categories-test">
	<div class="container">
		<h2 class="product-cats__title section-title"><?php echo $title; ?></h2>
		<div class="row">

				<?php
				foreach ($taxonomy as $tax) { ?>
				<div class="col-md-3 col-6">
					<h3 class="product-cats__item-title"><?php echo $tax->name; ?></h3>
					<?php
					$termId = $tax->term_id;
					$thumbnail_id = get_term_meta ( $termId, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
					?>

					<img src="<?php echo $image;?>" alt="sorry" class="product-cats__item-thumb">
				</div>
					<?php
				}
				?>
			</div>

	</div>
</div><!-- .top-product-categories-test -->
