<?php
/*-----------------------------------------------------------------------------------*/
// Custom Project / Post type
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'nature_project_type' );
	function nature_project_type() {
		$labels = array(
			'name'               => __('Projects','nature'),
			'singular_name'      => __('Project','nature'),
			'add_new'            => __('Add New','nature'), __('Project Piece','nature'),
			'add_new_item'       => __('Project','nature'),
			'edit_item'          => __('Edit Project','nature'),
			'new_item' 			 => __('New Project','nature'),
			'view_item'		     => __('View Project','nature'),
			'search_items' 	   	 => __('Search Project','nature'),
			'not_found'		 	 =>  __('No Project found','nature'),
			'not_found_in_trash' => __('No Project found in Trash','nature'),
			'parent_item_colon'  => ''
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'categories',
			'comments',
			'excerpt',
			'author'
		);

register_post_type( 'project',
	array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-heart',
		'hierarchical' => false,
		'supports' => $supports,
		'taxonomies' => array('project-type'),
		'rewrite' => array( 'slug' => 'project-items','nature')
		)
	);
}

// Custom Taxonomy for post type Projects
add_action( 'init', 'nature_taxonomies_project', 0 );
	function nature_taxonomies_project() {
		// Project Type Custom Taxonomy
		$project_type_labels = array(
			'name'              => __('Project Types','nature'),
			'singular_name'     => __('Project Type','nature'),
			'search_items'      => __('Search Project Types','nature'),
			'all_items'         => __('All Project Types','nature'),
			'parent_item'       => __('Parent Project Type','nature'),
			'parent_item_colon' =>__('Parent Project Type:','nature'),
			'edit_item'         => __('Edit Project Type','nature'),
			'update_item'       => __('Update Project Type','nature'),
			'add_new_item'      => __('Add New Project Type','nature'),
			'new_item_name'     => __('Project Type Name','nature'),
			'menu_name'         => __('Project Types','nature')
		);
register_taxonomy(
	'project_type',
	'project',
		array(
		'hierarchical' => true,
		'labels' => $project_type_labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'project-type','nature')
		)
	);
}
/*-----------------------------------------------------------------------------------*/
// Custom Event / Post type
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'nature_event_type' );
	function nature_event_type() {
		$labels = array(
			'name'               => __('Events', 'nature'),
			'singular_name'      => __('Event', 'nature'),
			'add_new'            => __('Add New', 'nature'), __('Event', 'nature'),
			'add_new_item'       => __('Event', 'nature'),
			'edit_item'          => __('Edit Event', 'nature'),
			'new_item' 			 => __('New Event', 'nature'),
			'view_item'		     => __('View Event', 'nature'),
			'search_items' 	   	 => __('Search Event', 'nature'),
			'not_found'		 	 =>  __('No Event found', 'nature'),
			'not_found_in_trash' => __('No Event found in Trash', 'nature'),
			'parent_item_colon'  => ''
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'categories',
			'comments',
			'excerpt',
			'author'
		);

register_post_type( 'event',
	array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-pressthis',
		'hierarchical' => false,
		'supports' => $supports,
		'taxonomies' => array('event-type'),
		'rewrite' => array( 'slug' => 'event-items', 'nature')
		)
	);
}

// Custom Taxonomy for post type Events
add_action( 'init', 'nature_taxonomies_event', 0 );
	function nature_taxonomies_event() {
		// Event Type Custom Taxonomy
		$event_type_labels = array(
			'name'              => __('Event Types', 'nature'),
			'singular_name'     => __('Event Type', 'nature'),
			'search_items'      => __('Search Event Types', 'nature'),
			'all_items'         => __('All Event Types', 'nature'),
			'parent_item'       => __('Parent Event Type', 'nature'),
			'parent_item_colon' => __('Parent Event Type:', 'nature'),
			'edit_item'         => __('Edit Event Type', 'nature'),
			'update_item'       => __('Update Event Type', 'nature'),
			'add_new_item'      => __('Add New Event Type', 'nature'),
			'new_item_name'     => __('Event Type Name', 'nature'),
			'menu_name'         => __('Event Types', 'nature')
		);
register_taxonomy(
	'event_type',
	'event',
		array(
		'hierarchical' => true,
		'labels'       => $event_type_labels,
		'query_var'    => true,
		'rewrite'      => array( 'slug' => 'event-type', 'nature')
		)
	);
}

/*-----------------------------------------------------------------------------------*/
// Custom Team / Post type
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'nature_team_type' );
	function nature_team_type() {
		$labels = array(
			'name'               => __('Team Members', 'nature'),
			'singular_name'      => __('Team Member', 'nature'),
			'add_new'            => __('Add New', 'nature'), __('Member', 'nature'),
			'add_new_item'       => __('Member', 'nature'),
			'edit_item'          => __('Edit Member', 'nature'),
			'new_item' 			 => __('New Member', 'nature'),
			'view_item'		     => __('View Member', 'nature'),
			'search_items' 	   	 => __('Search Member', 'nature'),
			'not_found'		 	 =>  __('No Member found', 'nature'),
			'not_found_in_trash' => __('No Member found in Trash', 'nature'),
			'parent_item_colon'  => ''
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'categories',
			'excerpt',
			'comments',
			'author'
		);

register_post_type( 'member',
	array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-businessman',
		'hierarchical' => false,
		'supports' => $supports,
		'rewrite' => array( 'slug' => 'member-items' )
		)
	);
}

add_action( 'init', 'nature_board_type' );
	function nature_board_type() {
		$labels = array(
			'name'               => __('Board Members', 'nature'),
			'singular_name'      => __('Board Member', 'nature'),
			'add_new'            => __('Add New', 'nature'), __('Member', 'nature'),
			'add_new_item'       => __('Member', 'nature'),
			'edit_item'          => __('Edit Member', 'nature'),
			'new_item' 			 => __('New Member', 'nature'),
			'view_item'		     => __('View Member', 'nature'),
			'search_items' 	   	 => __('Search Member', 'nature'),
			'not_found'		 	 =>  __('No Member found', 'nature'),
			'not_found_in_trash' => __('No Member found in Trash', 'nature'),
			'parent_item_colon'  => ''
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'categories',
			'excerpt',
			'comments',
			'author'
		);

register_post_type( 'boardmember',
	array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-groups',
		'hierarchical' => false,
		'supports' => $supports,
		'rewrite' => array( 'slug' => 'boardmember-items' )
		)
	);
}

/*-----------------------------------------------------------------------------------*/
// Gallery / Post type
/*-----------------------------------------------------------------------------------*/
add_action( 'init', 'nature_gallery_type' );
	function nature_gallery_type() {
		$labels = array(
			'name'               => __('Galleries', 'nature'),
			'singular_name'      => __('Gallery', 'nature'),
			'add_new'            => __('Add New', 'nature'), __('Member', 'nature'),
			'add_new_item'       => __('Gallery', 'nature'),
			'edit_item'          => __('Edit Gallery', 'nature'),
			'new_item' 			 => __('New Gallery', 'nature'),
			'view_item'		     => __('View Gallery', 'nature'),
			'search_items' 	   	 => __('Search Gallery', 'nature'),
			'not_found'		 	 => __('No Gallery found', 'nature'),
			'not_found_in_trash' => __('No Gallery found in Trash', 'nature'),
			'parent_item_colon'  => ''
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'categories'
		);

register_post_type( 'gallery',
	array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-nametag',
		'hierarchical' => false,
		'supports' => $supports,
		'rewrite' => array( 'slug' => 'gallery-items' )
		)
	);
}


?>