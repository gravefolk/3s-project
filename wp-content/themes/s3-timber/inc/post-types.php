<?php
/**
* This is where you can register custom post types.
*/

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'post_type_name', [
		'taxonomies' => [], // post related taxonomies
		'label'  => null,
		'labels' => [
			'name'               => '____', // name for the post type.
			'singular_name'      => '____', // name for single post of that type.
			'add_new'            => 'Add ____', // to add a new post.
			'add_new_item'       => 'Adding ____', // title for a newly created post in the admin panel.
			'edit_item'          => 'Edit ____', // for editing post type.
			'new_item'           => 'New ____', // new post's text.
			'view_item'          => 'See ____', // for viewing this post type.
			'search_items'       => 'Search ____', // search for these post types.
			'not_found'          => 'Not Found', // if search has not found anything.
			'parent_item_colon'  => '', // for parents (for hierarchical post types).
			'menu_name'          => '____', // menu name.
		],
		'description'         => '',
		'public'              => true,
		//'publicly_queryable'  => null, // depends on public
		//'exclude_from_search' => null, // depends on public
		//'show_ui'             => null, // depends on public
		//'show_in_nav_menus'   => null, // depends on public
		'show_in_menu'        => null, // whether to in admin panel menu
		//'show_in_admin_bar'   => null, // depends on show_in_menu.
		'show_in_rest'        => null, // Add to REST API. WP 4.7.
		'rest_base'           => null, // $post_type. WP 4.7.
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // Array of additional rights for this post type.
		//'map_meta_cap'      => null, // Set to true to enable the default handler for meta caps.
		'hierarchical'        => false,
		// [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ]
		'supports'            => [ 'title', 'editor' ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}