<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fws_test
 */

$navigation = get_field( 'navigation_links', 'option' );
$logo = get_field( 'footer_logo', 'option' );
$socialLink = get_field('social_links', 'option');
?>

	</div><!-- #content -->

	<footer id="colophon" class="copyright">
		<div class="container">
			<div class="row site-footer__top">
				<div class="site-footer__logo-holder site-footer__box col-md-4">
					<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php $logo = get_field( 'footer_logo', 'option' ); ?>
						<img class="site-footer__logo-img" src="<?php echo $logo['url']; ?>" alt="Starter Logo" title="Starter">
					</a>
				</div>
				<div class="site-footer__nav-holder site-footer__box col-md-4">
					<h4  style="color: white" class="site-footer__box-title title-small">Navigation</h4>
					<ul class="site-footer__nav">
						<?php foreach ($navigation as $nav) {
							$link = $nav['navigation_link'];
							?>
							<li class="site-footer__nav-list"><a  style="color: white" href="<?php echo $link['url'] ?>" class="site-footer__nav-link"><?php  echo $link['title'] ?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class="site-footer__social-holder site-footer__box col-md-4">
					<h4 class="site-footer__box-title title-small">Social Links</h4>
					<ul class="site-footer__social">
						<?php $socialLink = get_field('social_links', 'option');
						$soc = $socialLink['icons_theme'];
						foreach ($soc as $social) { ?>
						<li><a  style="color: white" href="#" class="site-footer__social-link"><?php echo fws()->render()->inlineSVG( $social, '', true );?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="copyright">
				<p>@copyright text goes here</p>
			</div><!-- .copyright -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
