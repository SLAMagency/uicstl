<?php
/* Bones Unit Type Example
This page walks you through creating 
a unit type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - METABOXES

$prefix = 'ak_';


$fields = array(

	// array( // jQuery UI Date input
	// 	'label'	=> 'Title', // <label>
	// 	//'desc'	=> 'When was this message?', // description
	// 	'id'	=> $prefix.'unit_title', // field id and name
	// 	'type'	=> 'text' // type of field
	// ),

	array( // jQuery UI Date input
		'label'	=> 'Floorplan', // <label>
		//'desc'	=> 'When was this message?', // description
		'id'	=> $prefix.'unit_floorplan', // field id and name
		'type'	=> 'image' // type of field
	),
	array( // jQuery UI Date input
		'label'	=> 'Amenities', // <label>
		//'desc'	=> 'When does this group meet?', // description
		'id'	=> $prefix.'unit_amenities', // field id and name
		'type'	=> 'textarea' // type of field
	),
	array( // jQuery UI Date input
		'label'	=> 'Price', // <label>
		//'desc'	=> 'When does this group meet?', // description
		'id'	=> $prefix.'unit_price', // field id and name
		'type'	=> 'text' // type of field
	),
	// array( // Repeatable & Sortable Text inputs
	// 	'label'	=> 'Images', // <label>
	// 	'desc'	=> 'Add images for gallery.', // description
	// 	'id'	=> $prefix.'gallery_images', // field id and name
	// 	'type'	=> 'repeatable', // type of field
	// 	// 'sanitizer' => array( // array of sanitizers with matching kets to next array
	// 	// 	'classes' => 'sanitize_text_field',
	// 	// 	'background_image' => 'wp_kses_data',
	// 	// 	'background_color' => 'wp_kses_data',
	// 	// 	'content' => 'wp_kses_post'
	// 	// ),
	// 	'repeatable_fields' => array ( // array of fields to be repeated
	// 		'background_image' => array( // Image ID field
	// 			//'class'	=> 'sixcol first',
	// 			'label'	=> 'Image', // <label>
	// 			'id'	=> 'gallery_image', // field id and name
	// 			'type'	=> 'image' // type of field
	// 		),
	// 	)
	// )
	
);

$event_box = new custom_add_meta_box( 'ak_unit_options', 'Unit Set-up', $fields, 'unit', true );


// let's create the function for the unit
function unit_post_type() { 
	// creating (registering) the unit 
	register_post_type( 'unit', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Units', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Unit', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Units', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Unit', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Unit', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Unit', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Unit', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Units', 'bonestheme'), /* Search Unit Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Available Units.', 'bonestheme' ), /* Unit Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/img/add.png', /* the icon for the unit type menu */
			'rewrite'	=> array( 'slug' => 'unit', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'unit', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your unit type */
	//register_taxonomy_for_object_type('category', 'unit');
	/* this adds your post tags to your unit type */
	//register_taxonomy_for_object_type('post_tag', 'unit');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'unit_post_type');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	if (true) { // turn this stuff off


		// now let's add unit Shows (these act like categories)
	    register_taxonomy( 'property', 
	    	array('unit'), /* if you change the name of register_post_type( 'unit', then you have to change this */
	    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
	    		'labels' => array(
	    			'name' => __( 'Properties', 'bonestheme' ), /* name of the custom taxonomy */
	    			'singular_name' => __( 'Property', 'bonestheme' ), /* single taxonomy name */
	    			'search_items' =>  __( 'Search Properties', 'bonestheme' ), /* search title for taxomony */
	    			'all_items' => __( 'All Properties', 'bonestheme' ), /* all title for taxonomies */
	    			'parent_item' => __( 'Parent Property', 'bonestheme' ), /* parent title for taxonomy */
	    			'parent_item_colon' => __( 'Parent Property:', 'bonestheme' ), /* parent taxonomy title */
	    			'edit_item' => __( 'Edit Property', 'bonestheme' ), /* edit custom taxonomy title */
	    			'update_item' => __( 'Update Property', 'bonestheme' ), /* update title for taxonomy */
	    			'add_new_item' => __( 'Add New Property', 'bonestheme' ), /* add new title for taxonomy */
	    			'new_item_name' => __( 'New Property Name', 'bonestheme' ) /* name title for taxonomy */
	    		),
	    		'show_ui' => true,
	    		'query_var' => true,
	    		'rewrite' => array( 'slug' => 'property' ),
	    	)
	    );   
	
	} 
	
	if (false) { // turn this stuff off
		// now let's add custom tags (these act like categories)
	    register_taxonomy( 'unit_tag', 
	    	array('unit'), /* if you change the name of register_post_type( 'unit', then you have to change this */
	    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
	    		'labels' => array(
	    			'name' => __( 'Tags', 'bonestheme' ), /* name of the custom taxonomy */
	    			'singular_name' => __( 'Tag', 'bonestheme' ), /* single taxonomy name */
	    			'search_items' =>  __( 'Search Tags', 'bonestheme' ), /* search title for taxomony */
	    			'all_items' => __( 'All Tags', 'bonestheme' ), /* all title for taxonomies */
	    			'parent_item' => __( 'Parent Tag', 'bonestheme' ), /* parent title for taxonomy */
	    			'parent_item_colon' => __( 'Parent Tag:', 'bonestheme' ), /* parent taxonomy title */
	    			'edit_item' => __( 'Edit Tag', 'bonestheme' ), /* edit custom taxonomy title */
	    			'update_item' => __( 'Update Tag', 'bonestheme' ), /* update title for taxonomy */
	    			'add_new_item' => __( 'Add New Tag', 'bonestheme' ), /* add new title for taxonomy */
	    			'new_item_name' => __( 'New Tag Name', 'bonestheme' ) /* name title for taxonomy */
	    		),
	    		'show_ui' => true,
	    		'query_var' => true,
	    	)
	    ); 
	}

	
    
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - CLASS

class Unit {	

	function __construct(&$post) {

		

	}

}





	

?>