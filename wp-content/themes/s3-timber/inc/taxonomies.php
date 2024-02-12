<?php 
/**
 * This is where you can register custom taxonomies.
 */

add_action( 'init', 'register_taxonomies' );

function register_taxonomies() {
    
    register_taxonomy( 'product-type', [ 'products' ], [
		'label'                 => '', // Default taken from $labels->name
		// Full list: wp-kama.com/function/get_taxonomy_labels
		'labels'                => [
			'name'              => 'Product Types',
			'singular_name'     => 'Product Type',
			'search_items'      => 'Search Product Types',
			'all_items'         => 'All Product Types',
			'view_item '        => 'View Product Type',
			'parent_item'       => 'Parent Product Type',
			'parent_item_colon' => 'Parent Product Type:',
			'edit_item'         => 'Edit Product Type',
			'update_item'       => 'Update Product Type',
			'add_new_item'      => 'Add New Product Type',
			'new_item_name'     => 'New Product Type Name',
			'menu_name'         => 'Product Type',
			'back_to_items'     => '← Back to Product Type',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null, // metabox html. callback: `post_categories_meta_box` or `post_tags_meta_box`. false - the metabox is disabled.
		'show_admin_column'     => false, // auto-creation of a posts table column for the associated post type.
		'show_in_rest'          => true, // add to the REST API
		'rest_base'             => null, // $taxonomy
	] );
}