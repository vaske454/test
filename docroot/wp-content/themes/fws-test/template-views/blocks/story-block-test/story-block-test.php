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
$button = $query_var['button'] ?? [];
$image = $query_var['image'] ?? [];
$title = esc_textarea( $query_var['title'] ) ?? '';
$textEditor = $query_var['text_editor'] ?? [];
$link = $query_var['link'] ?? [];
?>

<div class="story-block-test">
	<?php if ($button == true ) {?>
	<div class="container">
		<div class="row story-block--row">
			<div class="col-lg-6 story-block__content">
				<h2 class="story-block__content-title section-title"><?php echo $title; ?></h2>
				<div class="entry-content story-block--entry-content">
					<p><?php echo $textEditor; ?></p>
				</div>
				<a href="<?php echo $link['url'] ?>" class="btn" target="_blank">Read More</a>
			</div>
			<div class="col-lg-6 story-block__image">
				<img src="<?php echo $image['url'] ?>" alt="Alt Text">
			</div>
		</div>
	</div>
	<?php } else { ?>
		<div class="container">
			<div class="row story-block--row">
				<div class="col-lg-4 story-block__image">
					<img src="<?php echo $image['url'] ?>" alt="Alt Text">
				</div>
				<div class="col-lg-8 story-block__content">
					<h2 class="story-block__content-title section-title"><?php echo $title; ?></h2>
					<div class="entry-content story-block--entry-content">
						<p><?php echo $textEditor; ?></p>
					</div>
					<a href="<?php echo $link['url'] ?>" class="btn" target="_blank">Read More</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div><!-- .story-block-test -->
