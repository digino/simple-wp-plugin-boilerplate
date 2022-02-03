<?php

// Register Custom Post Type
//More info in wordpress documentation
function plugin_name_post_type_name() {

	$labels = array(
		'name'                  => _x( '', 'Post Type General Name', '' ),
		'singular_name'         => _x( '', 'Post Type Singular Name', '' ),
		'menu_name'             => __( '', '' ),
		'name_admin_bar'        => __( '', '' ),
		'archives'              => __( '', '' ),
		'attributes'            => __( '', '' ),
		'parent_item_colon'     => __( 'Parent Item:', '' ),
		'all_items'             => __( '', '' ),
		'add_new_item'          => __( '', '' ),
		'add_new'               => __( '', '' ),
		'new_item'              => __( '', '' ),
		'edit_item'             => __( '', '' ),
		'update_item'           => __( '', '' ),
		'view_item'             => __( '', '' ),
		'view_items'            => __( '', '' ),
		'search_items'          => __( '', '' ),
		'not_found'             => __( '', '' ),
		'not_found_in_trash'    => __( '', '' ),
		'set_featured_image'    => __( '', '' ),
		'remove_featured_image' => __( '', '' ),
		'use_featured_image'    => __( '', '' ),
		'insert_into_item'      => __( '', '' ),
		'uploaded_to_this_item' => __( '', '' ),
		'items_list'            => __( '', '' ),
		'items_list_navigation' => __( '', '' ),
		'filter_items_list'     => __( '', '' ),
	);
	$args = array(
		'label'                 => __( 'post_type_name', '' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => '',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'			=> true
	);
	register_post_type( 'post_type_name', $args );

}
add_action( 'init', 'plugin_name_post_type_name', 0 );