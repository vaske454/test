<?php
$flexible_content = get_field( 'content' );

if ( $flexible_content ) {
	foreach ( $flexible_content as $fc ) {
		switch ( $fc['acf_fc_layout'] ) {
			case 'banner':
				fws()->render()->templateView( $fc, 'banner' );
				break;
			case 'slider':
				fws()->render()->templateView( $fc, 'slider' );
				break;
			case 'vue_block':
				fws()->render()->templateView( $fc, 'vue-block' );
				break;
			case 'banner_test':
				fws()->render()->templateView( $fc, 'banner-test' );
				break;
			case 'slider_test':
				fws()->render()->templateView( $fc, 'slider-test' );
				break;
			case 'top_product_categories_test':
				fws()->render()->templateView( $fc, 'top-product-categories-test' );
				break;
			case 'latest_products_test':
				fws()->render()->templateView( $fc, 'latest-products-test' );
				break;
			case 'story_block_test':
				fws()->render()->templateView( $fc, 'story-block-test' );
				break;
			case 'team_test':
				fws()->render()->templateView( $fc, 'team-test' );
				break;
			case 'newsletter_test':
				fws()->render()->templateView( $fc, 'newsletter-test' );
				break;
			default:
				fws()->render()->templateView( $fc, 'basic-block' );
		}
	}
}

