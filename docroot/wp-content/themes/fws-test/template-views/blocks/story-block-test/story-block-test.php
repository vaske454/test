<?php
/**
 * Template View for displaying Blocks
 *
 * @link https://internal.forwardslashny.com/starter-theme/#blocks-and-parts
 *
 * @package fws_test
 */

// get template view values
$query_var = get_query_var( 'content-blocks', [] );

// set and escape template view values
$button = $query_var['button'] ?? [];
$image = $query_var['image'] ?? [];
$title = esc_textarea( $query_var['title'] ) ?? '';
$textEditor = $query_var['text_editor'] ?? [];
$link = $query_var['link'] ?? [];
?>

<div class="story-block-test">
	<div class="container">
		<div class="row story-block--row">
			<?php if ($button == true ) {?>
				<div class="col-lg-6 story-block__content">
					<h2 class="story-block__content-title section-title"><?php echo $title; ?></h2>
					<div class="entry-content story-block--entry-content">
						<p><?php echo $textEditor; ?></p>
					</div>
					<a href="<?php echo $link['url'] ?>" class="btn" target="_blank"><?php echo $link['title'] ?></a>
				</div>
				<div class="col-lg-6 story-block__image">
					<img src="<?php echo $image['url'] ?>" alt="Alt Text">
				</div>
		</div>
	</div>
</div>

<div class="story-block-test story-block--alt"">

	<div class="container">
		<div class="row story-block--row">
			<?php } else { ?>
				<div class="col-lg-6 story-block__content">
					<h2 class="story-block__content-title section-title"><?php echo $title; ?></h2>
					<div class="entry-content story-block--entry-content">
						<p><?php echo $textEditor; ?></p>
					</div>
					<a href="<?php echo $link['url'] ?>" class="btn" target="_blank"><?php echo $link['title'] ?></a>
				</div>
				<div class="col-lg-6 story-block__image">
					<img src="<?php echo $image['url'] ?>" alt="Alt Text">
				</div>

			<?php } ?>
		</div>
</div><!-- .story-block-test -->
