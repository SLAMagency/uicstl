<?php

$prefix = 'slam_';




$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

if ($template_file == 'page-parent.php') {
  	add_action( 'add_meta_boxes', 'slam_page_children_meta_box' );
}




$fields = array(
	
	array( // 
		'label'	=> 'Background Color', // <label>
		'id'	=> $prefix.'background_color', // field id and name
		'type'	=> 'select', // type of field
		'default' => 'white',
		'options' => slam_get_color_options('name')
	),
	array( // 
		'label'	=> 'Padding', // <label>
		'id'	=> $prefix.'padding', // field id and name
		'type'	=> 'akselect', // type of field
		'default' => 'normal-padding',
		'options' => array(
			'None' 		=> 'no-padding',
			'Thin'		=> 'thin-padding',
			'Normal' 	=> 'normal-padding',
			'Thick'		=> 'thick-padding',
		),
	),
	array( // 
		'label'	=> 'Content Width', // <label>
		'id'	=> $prefix.'content_width', // field id and name
		'type'	=> 'akselect', // type of field
		'default' => 'boxed',
		'options' => array(
			'Full Width' 		=> 'fullwidth',
			'Normal'			=> 'boxed',
			'Two-Thirds' 		=> 'two-thirds',
			'Half'				=> 'half',
		),
	),
	// Image Options
	array( // Messages Notes
		'label'	=> 'Background Image', // <label>
		//'desc'	=> 'Use', // description
		'id'	=> $prefix.'background_image', // field id and name
		'type'	=> 'image' // type of field
	),
	array( // 
		'label'	=> 'Image Opacity', // <label>
		'id'	=> $prefix.'image_opacity', // field id and name
		'type'	=> 'akselect', // type of field
		'default' => 'opaque',
		'options' => array(
			'Opaque' => 'opaque',
			'85%'	=> 'fade-85',
			'50%'	=> 'fade-50',
			'15%'	=> 'fade-15',
		),
	),
	array( // Messages Notes
		'label'	=> 'Additional Classes', // <label>
		//'desc'	=> 'Use', // description
		'id'	=> $prefix.'additional_classes', // field id and name
		'type'	=> 'text' // type of field
	),
		
);

if ($template_file == 'page-parent.php') {
	$page_box = new custom_add_meta_box( 'slam_page_options', 'Page Set-up', $fields, 'page', true );
}


function slam_page_children_meta_box_callback($post) {
	
	$editurl = get_site_url() . '/wp-admin/post.php?action=edit&post=';

	$parent = get_page($post->post_parent);

	if($post->ID == $parent->ID) {
		echo "<p>Subsections: </p>";
	} else {
		echo "<p>This is a sub-section of <a href='{$editurl}{$parent->ID}'>{$parent->post_title}</a>.</p>";
	}

	//Load Child Pages
	$args = array(
		'post_parent' 	=> $parent->ID,
		'post_type'		=> 'page',
		'order'			=> 'ASC',
		'orderby'		=> 'menu_order'
	);

	$children = get_children($args);
	echo "<div>";

	$kid_count = count($children);

	foreach($children as $child) {
		$active = '';
		if ($child->ID == $post->ID) {
			$active = ' disabled="disabled" ';
		}
		echo "<a class='button' {$active} href='{$editurl}{$child->ID}'>{$child->post_title}</a>";
	}
	echo "</div>";

	$menu_order = $kid_count+1;

	$add_url = get_template_directory_uri() . "/library/SLAM/create_child_page.php?parent_id={$parent->ID}&menu_order={$menu_order}";

	//echo "<form action='{$add_url}' method='POST'>";
	echo "<input type='hidden' name='parent_id' value='{$parent->ID}'>";
	echo "<p><input type='text' id='new_page_title' name='new_page_title'></input>";
	echo "<a id='new_page_button' class='button' type='submit' href={$add_url}>+ Add Section</a>";
	echo "</p>";



}

function slam_page_children_meta_box() {
	add_meta_box( 'slam_page_children_meta_box', 'Page Sections', 'slam_page_children_meta_box_callback', 'page', 'normal', 'high' );

}

