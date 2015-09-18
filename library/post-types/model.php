<?php
/* Bones Model Type Example
This page walks you through creating 
a model type and taxonomies. You
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
	// 	'id'	=> $prefix.'model_title', // field id and name
	// 	'type'	=> 'text' // type of field
	// ),

	array( // jQuery UI Date input
		'label'	=> 'Floorplan', // <label>
		//'desc'	=> 'When was this message?', // description
		'id'	=> $prefix.'model_floorplan', // field id and name
		'type'	=> 'image' // type of field
	),
	array( // jQuery UI Date input
		'label'	=> 'Link to', // <label>
		//'desc'	=> 'When does this group meet?', // description
		'id'	=> $prefix.'link_to', // field id and name
		'type'	=> 'text' // type of field
	),
	array( // jQuery UI Date input
		'label'	=> 'Amenities', // <label>
		//'desc'	=> 'When does this group meet?', // description
		'id'	=> $prefix.'model_amenities', // field id and name
		'type'	=> 'textarea' // type of field
	),
	array( // jQuery UI Date input
		'label'	=> 'Price', // <label>
		//'desc'	=> 'When does this group meet?', // description
		'id'	=> $prefix.'model_price', // field id and name
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

$event_box = new custom_add_meta_box( 'ak_model_options', 'Model Set-up', $fields, 'model', true );


// let's create the function for the model
function model_post_type() { 
	// creating (registering) the model 
	register_post_type( 'model', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Models', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Model', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Models', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add New Model', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Model', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Model', 'bonestheme'), /* New Display Title */
			'view_item' => __('View Model', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search Models', 'bonestheme'), /* Search Model Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Available Models.', 'bonestheme' ), /* Model Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/img/add.png', /* the icon for the model type menu */
			'rewrite'	=> array( 'slug' => 'model', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'model', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your model type */
	//register_taxonomy_for_object_type('category', 'model');
	/* this adds your post tags to your model type */
	//register_taxonomy_for_object_type('post_tag', 'model');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'model_post_type');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	if (true) { // turn this stuff off


		// now let's add model Shows (these act like categories)
	    register_taxonomy( 'category', 
	    	array('model'), /* if you change the name of register_post_type( 'model', then you have to change this */
	    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
	    		'labels' => array(
	    			'name' => __( 'Categories', 'bonestheme' ), /* name of the custom taxonomy */
	    			'singular_name' => __( 'Category', 'bonestheme' ), /* single taxonomy name */
	    			'search_items' =>  __( 'Search Categories', 'bonestheme' ), /* search title for taxomony */
	    			'all_items' => __( 'All Categories', 'bonestheme' ), /* all title for taxonomies */
	    			'parent_item' => __( 'Parent Category', 'bonestheme' ), /* parent title for taxonomy */
	    			'parent_item_colon' => __( 'Parent Category:', 'bonestheme' ), /* parent taxonomy title */
	    			'edit_item' => __( 'Edit Category', 'bonestheme' ), /* edit custom taxonomy title */
	    			'update_item' => __( 'Update Category', 'bonestheme' ), /* update title for taxonomy */
	    			'add_new_item' => __( 'Add New Category', 'bonestheme' ), /* add new title for taxonomy */
	    			'new_item_name' => __( 'New Category Name', 'bonestheme' ) /* name title for taxonomy */
	    		),
	    		'show_ui' => true,
	    		'query_var' => true,
	    		'rewrite' => array( 'slug' => 'category' ),
	    	)
	    );   
	
	} 
	
	if (false) { // turn this stuff off
		// now let's add custom tags (these act like categories)
	    register_taxonomy( 'model_tag', 
	    	array('model'), /* if you change the name of register_post_type( 'model', then you have to change this */
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

class Model extends SlamPost{	

	function __construct(&$post) {

		parent::__construct($post);	

		if($this->link_to) {
			$this->link = $this->link_to;
		} else {
			$this->link = $this->permalink;
		}

		$info  = "<h4 class='block-background bg-white'>{$this->title}</h4><br/>";
		$info .= "<p>" . $post->post_excerpt . "</p>";
		$info .= "<a href='{$this->link}' class='button bg-dark tiny'>Learn More</a>";

		$this->info = $info;

	}


	public function block() {

		$out = "<li class='model list block'>";

		$out .= "<img src='" . $this->image_src() . "'/>";

		$out .= "<a class='model-title block-background' href='{$this->permalink}'><h4>{$this->title}</h4></a>";

		$out .= "<div class='info content-padding'>{$this->info}</div>";

		$out .= "</li>";


		return $out;

	}

}






function slam_get_models( $atts ) {
	$atts = shortcode_atts( array(
		'category'  => '',
		'tags'		=> '',
		'number'	=> ''
	), $atts );

		/**
		 * The WordPress Query class.
		 * @link http://codex.wordpress.org/Function_Reference/WP_Query
		 *
		 */
		$args = array(
			
			//Category Parameters
			//'category_name'    => $category,

			//Type & Status Parameters
			'post_type'   => 'model',

			//Tag Parameters
			//'tag'           => $tag,
			
			//Pagination Parameters
			//'posts_per_page'         => $number,
			
		);
	
	$model_query = new WP_Query( $args );

	if ( $model_query->have_posts() ) {

		$out = "<ul class='model-grid large-block-grid-4 medium-block-grid-2 small-block-grid-1'>";

		while( $model_query->have_posts() ) {
			$model_query->the_post();
			$model = new Model($model_query->post);

			$out .= $model->block();

		}

		$out .= "</ul>";
	}




	return $out;

	// do shortcode actions here
}
add_shortcode( 'get_models','slam_get_models' );



	

?>