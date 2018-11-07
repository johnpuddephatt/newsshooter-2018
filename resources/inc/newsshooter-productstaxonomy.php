<?php

/*
Plugin Name: Product Taxonomy
Description: Product Taxonomy for Newsshooter
*/

// Register Custom Taxonomy
function product_taxonomy() {

	$labels = array(
		'name'                       => __( 'Products', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => __( 'Product', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Products', 'text_domain' ),
		'all_items'                  => __( 'All Products', 'text_domain' ),
		'parent_item'                => __( 'Parent', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent:', 'text_domain' ),
		'new_item_name'              => __( 'New Product', 'text_domain' ),
		'add_new_item'               => __( 'Add New Product', 'text_domain' ),
		'edit_item'                  => __( 'Edit Product', 'text_domain' ),
		'update_item'                => __( 'Update Product', 'text_domain' ),
		'view_item'                  => __( 'View Product', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate products with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove products', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used products', 'text_domain' ),
		'popular_items'              => __( 'Popular products', 'text_domain' ),
		'search_items'               => __( 'Search products', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_in_rest'               => true,
		'show_tagcloud'              => true,
		'rewrite'           => array( 'hierarchical' => true ),
	);
	register_taxonomy( 'product', array( 'post' ), $args );

}
add_action( 'init', 'product_taxonomy', 0 );

?>