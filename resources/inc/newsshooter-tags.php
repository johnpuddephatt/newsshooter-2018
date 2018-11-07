<?php

/*
Plugin Name: News Shooter Tags
Description: Products and Tags tags for Newsshooter in article header
*/


function newsshooter_tags_and_products(){
	global $post;
	$postid = $post->ID;
	$tags = wp_get_object_terms( $postid, 'post_tag' );
		$products = wp_get_object_terms( $postid, 'product' );

	if(count($tags) > 0 || count($products) > 0 ){
		$out = array();
		$out[] = '<div class="entry-tags">';
		$out[] = '<div class="tags-scroll">';
		$out[] = '<div class=" tags tags-container">';

		foreach ( $tags as $tag ) {
			$out[] = '<a class="tag small is-dark" href="'. get_term_link( $tag->slug, $tag->taxonomy ) .'">' . $tag->name . "</a>\n";
		}
		// if ( count($tags) > 0 && count($products) > 0 ) {
		// 	$out[] = '<li class="spacer">|</li>';
		// }
		foreach ( $products as $product ) {
			$out[] = '<a class="tag small is-light" href="'. get_term_link( $product->slug, $product->taxonomy ) .'">' . $product->name . "</a>\n";
		}
		$out[] = "</div>\n</div>\n</div>";

		echo implode('', $out );
	}
}

?>