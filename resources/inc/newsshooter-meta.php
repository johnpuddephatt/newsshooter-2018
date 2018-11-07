<?php

/*
Plugin Name: News Shooter Tags
Description: Products and Tags tags for Newsshooter in article header and meta description for Google News
*/

add_action('newsshooter_meta','newsshooter_google_news_meta');

function newsshooter_google_news_meta() {

	if( is_single() ) {
		global $post;
		$postid = $post->ID;
		$tags = wp_get_object_terms( $postid, 'post_tag' );
		$products = wp_get_object_terms( $postid, 'product' );
		if(count($tags) > 0 || count($products) > 0 ){
			$string =  '<meta name="news_keywords" content="';
			if(count($tags) > 0) {
				foreach ( $tags as $tag ) {
					$string.= $tag -> name . ',';
				}
			}
			if(count($products) > 0) {
				foreach ( $products as $product ) {
					$string.= $product -> name . ',';
				}
			}
			$string.= '" >';
			echo $string;
		}
	}
}

?>