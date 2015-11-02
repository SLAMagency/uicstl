<?php

function section_shortcode( $atts, $content ) {
	$defaults = array(
		'class'=>'',
		'color' => '',
		'image' => '', 
		'fullwidth' => false,
		'padding' => '30px',
	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	$classes = $class;
	$style = " padding: {$padding}; ";
	if ($image) {
		$style .= " background: url({$image}) no-repeat center center; background-size: cover; ";
	} 
	if($color) {
		$style .= " background-color: {$color}; ";
	}

	$inner_class = 'row';
	if($fullwidth) {
		$inner_class = 'fullwidth';
	}



	$out = '';

	//$out .= 	'</div>'; // Row
	//$out .=	'</div>'; // Content
	$out .= '<div ';
	$out .=			"class='{$classes}'";
	$out .=			"style='{$style}'";
	$out .= 	'>';
	$out .= 	"<div class='{$inner_class} clearfix'>";
	$out .= 		do_shortcode( $content ); 
	$out .= 	'</div>';
	$out .= '</div>';
	//$out .= '<div>';
	//$out .= 	'<div class="row">';

	return $out;



	// do shortcode actions here
}
add_shortcode( 'section','section_shortcode' );



function slam_landing_header( $atts, $content ) {
	$atts = extract( shortcode_atts( array( 'default'=>'values' ),$atts ) );

	$out = '';

	$out .= '<h2 class="text-center">';
	$out .= '<strong class="landing-title">';
	$out .=	$content;
	$out .=	'</strong>';
	$out .= '</h2>';


	return $out;

	// do shortcode actions here
}
add_shortcode( 'landing-header','slam_landing_header' );



function slam_neighborhood_shortcode( $atts, $content ) {
	$defaults = array(
		'title'=>'',
		'text'=>'',
		'image' => '', 
		'link' => '',
		'mls' => '',
	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	$out = '';

	$out .= "<div class='neighborhood_link columns medium-6' style='background-image: url({$image});'>";
	$out .= 	"<a class='overlay' href='{$link}'></a>";
	$out .= 	"<div class='info'>";
	$out .=			"<h3><strong>{$title}</strong></h3>";
	$out .=			"<div class='bar clearfix'>";
	$out .=				"<span>{$text} {$content}</span>";
	if ($link) {
		$out .=				"<a class='button right' href='{$link}'>Learn More</a>";
	}
	if ($mls) {
		$out .=				"<a class='button right mls' href='{$mls}'>See MLS Listings <i class='fi-play'></i></a>";
	}
	$out .=			"</div>"; // bar
	$out .= 	"</div>"; //info
	$out .= "</div>"; //neighborhood_link

	return $out;
}
	
add_shortcode( 'neighborhood','slam_neighborhood_shortcode' );


function slam_simple_cta_( $atts, $content ) {
	$defaults = array(
		'title'=>'Get started.',
		'contact'=>'our Sales Manager',
		'email' => 'sales@uicstl.com',
		'phone' => '314-881-2333',

	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	// do shortcode actions here

	$out = '';

	$out .= "<div class='simple-cta-section' >";
	$out .= 	"<div class='row clearfix'>";
	$out .= 		"<div class='columns large-6' >
						<div class='table'>
							<div class='table-row'>
								<div class='cell'><h3>{$title}</h3></div>
								<div class='cell'>{$phone}</div>
							</div>
							<div class='table-row'>
								<div class='cell'>Contact {$contact}.</div>
								<div class='cell'><a href='{$email}'>{$email}</a></div>
							</div>
						</div>
					</div>";
	$out .= 		"<div class='columns large-6 '>";
	$out .= 			"<form action='' method='post'/>";
		$out .=				"<input type='hidden' name='page' value='{$_SERVER['REQUEST_URI']}'>";
		$out .=				"<input type='hidden' name='contact' value='{$contact}'>";
		$out .=				"<input type='hidden' name='contact_email' value='{$email}'>";
		$out .=				"<div class='row collapse'>";
		$out .=					"<div class='small-10 columns' >";
		$out .=						"<input type='email' name='email' placeholder='Email'>";
		$out .=					"</div>";
		$out .=					"<div class='small-2 columns'>";
		$out .=						"<input type='submit' class='button postfix' value='GO' }'></input>";
		$out .=					"</div>";
		$out .=				"</div>";
		$out .=			"</form>";
	$out .= 		"</div>";
	$out .= 	'</div>';
	$out .= '</div>';

	return $out;
}
// This time with modal gravity form
function slam_simple_cta( $atts, $content ) {
	$defaults = array(
		'title'=>'Get started.',
		'contact'=>'our Sales Manager',
		'email' => 'sales@uicstl.com',
		'phone' => '314-881-2333',
		'form'	=> 4,
		'interest'	=> 'Homes'

	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	// do shortcode actions here

	$out = '';

	$out .= "<div class='simple-cta-section' >";
	$out .= 	"<div class='row clearfix'>";
	$out .= 		"<div class='columns large-6' >
						<div class='table'>
							<div class='table-row'>
								<div class='cell'><h3>{$title}</h3></div>
								<div class='cell'>{$phone}</div>
							</div>
							<div class='table-row'>
								<div class='cell'>Contact {$contact}.</div>
								<div class='cell'><a href='{$email}'>{$email}</a></div>
							</div>
						</div>
					</div>";
	$out .= 		"<div class='columns large-6 '>";
	$out .= 			"<form>";
		$out .=				"<input type='hidden' name='page' value='{$_SERVER['REQUEST_URI']}'>";
		$out .=				"<input type='hidden' name='contact' value='{$contact}'>";
		$out .=				"<input type='hidden' name='contact_email' value='{$email}'>";
		$out .=				"<div class='row collapse'>";
		$out .=					"<div class='small-10 columns' >";
		$out .=						"<input id='email-input' type='email' name='email' placeholder='Email'>";
		$out .=					"</div>";
		$out .=					"<div class='small-2 columns'>";
		$out .=						"<button id='go-button' class='button postfix'>GO</button>";
		$out .=					"</div>";
		$out .=				"</div>";
		$out .=			"</form>";
	$out .= 		"</div>";
	$out .= 	'</div>';
	$out .= '</div>';

	$out .= "<div id='cta-modal' class='reveal-modal small' data-reveal=''>";
	$out .= 	do_shortcode( "[gravityform id='{$form}' title='false' description='false']" );
	$out .= 	"<script>
					jQuery(document).ready(function(){
						jQuery('#gform_{$form}').find('#input_{$form}_1').val('{$interest}');
						jQuery('#input_{$form}_2').val('Anonymous');

						jQuery('#email-input').change(function(){
							email = jQuery(this).val();
							jQuery('#gform_{$form}').find('#input_{$form}_3').val(email);
						});

						jQuery('#go-button').click(function(){
							jQuery('#gform_{$form}').submit();
						});

						

					});
				</script>";
	$out .= "</div>";

	return $out;
}
add_shortcode( 'simple-cta','slam_simple_cta' );





/**
 * Creates a set of photos fitted in a particular manner,
 * with a title/call to action in the center.
 * @param  array $atts    title (string), 
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function slam_photo_collage( $atts, $content ) {
	$atts['photos'] = explode(', ', $atts['photos']);
	$defaults = array(
		'photos' => array(),
		'address' => '1607 Tower Grove Avenue Saint Louis, Missouri 63110',
	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	$address = urlencode($address);

	$mapsrc = "http://maps.googleapis.com/maps/api/staticmap?center={$address}&zoom=13&scale=2&size=640x138&sensor=false&markers=color:0xfff000|{$address}&style=feature:landscape|element:geometry|lightness:100|saturation:100&style=feature:all|element:labels|visibility:off&style=feature:all|saturation:-100";

	$out = "<div class='photo-collage row collapse clearfix fullwidth'>";
	$out .= 	"<div class='columns large-four-fifths'><div class='row fullwidth collapse'>";
	$out .= 		"<div class='columns medium-6 collage-image height-2' 						style='background-image: url({$photos[0]});' width='500' height='325' ></div>";
	$out .= 		"<div class='columns medium-3 collage-image height-1 show-for-medium-up' 	style='background-image: url({$photos[1]});' width='500' height='325' ></div>";
	$out .= 		"<div class='columns medium-3 collage-image height-1 show-for-medium-up' 	style='background-image: url({$photos[2]});' width='500' height='325' ></div>";
	$out .= 		"<div class='columns medium-6 collage-image height-1 collage-content'>{$content}</div>";
	$out .= 		"<a   class='columns medium-9 collage-image height-1 map' target='_blank' href='https://www.google.com/maps/place/{$address}'><img src='{$mapsrc}'/></a>";
	$out .= 		"<div class='columns medium-3 collage-image height-1 show-for-medium-up' 	style='background-image: url({$photos[3]});' width='500' height='325' ></div>";
	$out .= 	"</div></div>";
	$out .= 	"<div class='columns large-fifth collapse'><div class='row fullwidth collapse'>";
	$out .= 		"<div class='columns collage-image height-1 show-for-medium-up' 			style='background-image: url({$photos[4]});' width='500' height='325' ></div>";
	$out .= 		"<div class='columns collage-image height-2 tall show-for-medium-up' 		style='background-image: url({$photos[5]});' width='500' height='650' ></div>";
	$out .= 	"</div></div>";
	$out .= "</div>";
	return $out;
}
add_shortcode( 'photo-collage','slam_photo_collage' );



function slam_team( $atts, $content) {
	$defaults = array(
		'name'		=> '',
		'title' 	=> '',
		'image'		=> '',
		'modal' 	=> '', 
		'class' 	=> '',
	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	$out = '';

	$out .=	"<li>";
	$out .=	    "<figure class='cap-bot {$class}'>";
	$out .=	        "<a class='th' data-reveal-id='{$modal}' href='#'>";
	$out .=	        "<img alt='' src='{$image}'></a>";
	$out .=	        "<a data-reveal-id='{$modal}' href='#'>";
	$out .=	        "<figcaption>";
	$out .=	            "<div><span class='text-bold'>{$name}</span><br/>{$title}</div>";
	$out .=	        "</figcaption>";
	$out .=	        "</a>";
	$out .=	    "</figure>";
	$out .=	"</li>";


	return $out; 

}
add_shortcode( 'team','slam_team' );



// Available Properties
// 



function slam_list_posts( $atts, $content) {
	$defaults = array(
		'number'		=> 9,
		'category_name'	=> 'for-rent',
		'class'			=> 'large-block-grid-3',
	);
	$atts = extract( shortcode_atts( $defaults, $atts ) );

	// Get Posts
	$args = array(
		'category_name'    => $category_name,
		'posts_per_page'         => $number
	);
	
	$the_query = new WP_Query( $args );
	

	// Spit out a Block Grid
	if ( $the_query->have_posts() ) {

		$out = '<ul class="' . $class . '">';

		while ( $the_query->have_posts() ) {

			$the_query->the_post();
			$permalink = get_permalink( $the_query->post->ID );
			$out .= "<li>";
			$out .= 	"<a href='{$permalink}'>";
			$out .= 	get_the_post_thumbnail( $the_query->post->ID, 'small' );
			$out .= 	"<h4>" . get_the_title($the_query->post->ID) . "</h4>";
			$out .= 	"</a>";
			$out .= 	"<p>" . get_the_excerpt() . "</p>";
			$out .= 	"<a class='button tiny' href='{$permalink}'>Learn More</a>";
			$out .=	"</li>";
		}

		$out .=	"</ul>";

	} else {
		// no posts found
	}

	return $out; 

}
add_shortcode( 'available_properties','slam_list_posts' );



//if($_GET['dev'] == true) {

	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
	//ini_set("display_errors", 1);

	/**
	 * List availble units shortcode
	 * @param  [array] $atts    number: number to show; property: custom taxonomy for units; class: css class to apply
	 * @param  [type] $content [description]
	 * @return [type]          [description]
	 */
	function slam_list_units($atts, $content) {
		$defaults = array(
			'number'		=> 9,
			'property'		=> '',
			'class'			=> 'large-block-grid-3',
		);
		$atts = extract( shortcode_atts( $defaults, $atts ) );

		$args = array(
			'post_type' => 'unit',
		);
		//If we have a property value, let's only find units with that taxonomy
		if($property != '') {
			$args['tax_query'] = array(
				array(
					'taxonomy' 	=> 'property',
					'field'		=> 'name',
					'terms'		=> $property
				),
			);
		}

		$the_query = new WP_Query( $args );

		// Spit out a Block Grid
		if ( $the_query->have_posts() ) {

			$out = '<ul class="' . $class . '">';

			while ( $the_query->have_posts() ) {

				$the_query->the_post();
				$permalink = get_permalink( $the_query->post->ID );
				$out .= "<li>";
				$out .= 	"<a href='{$permalink}'>";
				$out .= 	get_the_post_thumbnail( $the_query->post->ID, 'small' );
				$out .= 	"<h4>" . get_the_title($the_query->post->ID) . "</h4>";
				$out .= 	"</a>";
				$out .= 	"<p>" . get_post_meta($the_query->post->ID, 'ak_unit_amenities', true);
				$out .= 	"<br/><b>" . get_post_meta($the_query->post->ID, 'ak_unit_price', true) . "</b></p>";
				$out .= 	"<a class='button tiny' href='{$permalink}'>Learn More</a>";
				$out .=	"</li>";
			}

			$out .=	"</ul>";

		} else {
			// no posts found
		}

		return $out; 


	}


	add_shortcode('available_units','slam_list_units' );

//}
