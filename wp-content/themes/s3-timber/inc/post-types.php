<?php
/**
* This is where you can register custom post types.
*/

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'products', [
		'taxonomies' => ['product-type'], // post related taxonomies
		'label'  => null,
		'labels' => [
			'name'               => 'Products', // name for the post type.
			'singular_name'      => 'Product', // name for single post of that type.
			'add_new'            => 'Add Product', // to add a new post.
			'add_new_item'       => 'Adding Products', // title for a newly created post in the admin panel.
			'edit_item'          => 'Edit Product', // for editing post type.
			'new_item'           => 'New Product', // new post's text.
			'view_item'          => 'See Product', // for viewing this post type.
			'search_items'       => 'Search Products', // search for these post types.
			'not_found'          => 'Not Found', // if search has not found anything.
			'menu_name'          => 'Products', // menu name.
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => null, // whether to in admin panel menu
		'show_in_rest'        => true, // Add to REST API. WP 4.7.
		'rest_base'           => null, // $post_type. WP 4.7.
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-store',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'revisions', 'thumbnail' ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}