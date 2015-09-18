<?php

//Get UIC Child Theme Styles
function uic_styles() {
	wp_dequeue_style( 'slam-stylesheet' );
	wp_enqueue_style( 'slam-stylesheet', get_template_directory_uri() . '/library/css/style.css' );
	wp_enqueue_style( 'uic-styles', get_stylesheet_directory_uri() . '/library/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'uic_styles', 1000 );

//Remove Parent Theme Custom Post Types
add_action( 'after_setup_theme','remove_project_custom_init', 1001 );
function remove_project_custom_init() {
    remove_action( 'init', 'custom_post_accordion');
    remove_action('init', 'custom_post_example');
}
function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'link-manager.php' );         		    //Links
  
}
add_action( 'admin_menu', 'remove_menus' );

//Unregister Offcanvas
function my_unregister_sidebars() {
	unregister_sidebar('offcanvas');
}
add_action( 'widgets_init', 'my_unregister_sidebars', 11 );

//Get Slick Carousel Scripts & Styles
function slick_styles() {
	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/library/slick/slick/slick.css' );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/library/slick/slick/slick.min.js', array( 'jquery' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'slick_styles' );

//Get Infinite Scroll Scripts & Styles
function infinitescroll_styles() {
    wp_enqueue_script( 'infinitescroll-js', get_stylesheet_directory_uri() . '/library/infinite-scroll/jquery.infinitescroll.js', array( 'jquery' ), $theme_version, true );
    wp_enqueue_script( 'manualtrigger-js', get_stylesheet_directory_uri() . '/library/infinite-scroll/behaviors/manual-trigger.js', array( 'jquery' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'infinitescroll_styles' );

//Get Isotope Scripts & Styles
function isotope_styles() {
    wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/library/isotope/dist/isotope.pkgd.min.js', array( 'jquery' ), $theme_version, true );
    wp_enqueue_script( 'images-loaded-js', get_stylesheet_directory_uri() . '/library/isotope/dist/imagesloaded.pkgd.min.js', array( 'jquery' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'isotope_styles' );


//Get Pinterest Button
function pinterest_button() {
    wp_enqueue_script( 'pinterest-js', 'http://assets.pinterest.com/js/pinit.js', array(), $theme_version, true );
}
//add_action( 'wp_enqueue_scripts', 'pinterest_button' );


/*
		// Custom Excerpt That Ends at End of First Paragraph
		if ( ! function_exists( 'uic_excerpt_paragraph' ) ) : 
		
		function uic_excerpt_paragraph($uic_excerpt) {
		global $post;
		$raw_excerpt = $uic_excerpt;
		if ( '' == $uic_excerpt ) {
		
		$uic_excerpt = get_the_content('');
		$uic_excerpt = strip_shortcodes( $uic_excerpt );
		$uic_excerpt = apply_filters('the_content', $uic_excerpt);
		$uic_excerpt = substr( $uic_excerpt, 0, strpos( $uic_excerpt, '</p>' ) + 4 );
		$uic_excerpt = str_replace(']]>', ']]>', $uic_excerpt);
		
		$excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . sprintf(__( 'read more  &raquo;', 'pietergoosen' ), get_the_title()) . '</a>'; 
		$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 
		
		//$pos = strrpos($uic_excerpt, '</');
		//if ($pos !== false)
		// Inside last HTML tag
		//$uic_excerpt = substr_replace($uic_excerpt, $excerpt_end, $pos, 0);
		//else
		// After the content
		$uic_excerpt .= $excerpt_end;
		
		return $uic_excerpt;
		
		}
		return apply_filters('uic_excerpt_paragraph', $uic_excerpt, $raw_excerpt);
		}
		
		endif; 
		
		remove_filter('get_the_excerpt', 'wp_trim_excerpt');
		add_filter('get_the_excerpt', 'uic_excerpt_paragraph');
*/

// Enable Infinite Scroll

// Add Read More Link to Manual Excerpts
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '"> view &raquo</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');

// Create Post Widget Area
$sidebars = array('PostWidget');
foreach ($sidebars as $sidebar) {
register_sidebar(array('name'=> $sidebar,
	'id' => 'PostWidget',
	'description' => 'This widget appears at the bottom of every post.',
    'before_widget' => '<div class="large-12 columns PostWidget"><article id="%1$s" class="widget %2$s">',
    'after_widget' => '</article></div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
}

// Custom Login Page

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function slam_login_css() {
	wp_enqueue_style( 'slam_login_css', get_stylesheet_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function slam_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function slam_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'slam_login_css', 10 );
add_filter('login_headerurl', 'slam_login_url');
add_filter('login_headertitle', 'slam_login_title');


//Get Custom UIC Scripts
function uic_scripts() {
    wp_enqueue_script( 'uic-scripts', get_stylesheet_directory_uri() . '/library/js/uic-scripts.js', array( 'jquery' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'uic_scripts' );

/*
// Stop Wordpress from Adding Extra Paragraph Tags
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
*/

//Allow for single-[post ID].php Templates (Used to Remove Sidebar from Dropdown Project Posts)
add_filter( 'template_include', 'single_id_template', 99 );

function single_id_template( $template ) {

	$post_id = get_the_ID();

	if ( is_single() &&  $post_id ) {
		$_template = locate_template( array( 'single-' . $post_id .'.php'  ) );
		$template = ( $_template ) ? $_template : $template;
	}

	return $template;
}

//Customize the Password Protected Template
function uic_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "<p>At UIC, we are intent on changing the way homebuilding is done. We know you want to make it your own, so we offer a wide variety of upgrade options, all at competitive pricing.</p>
 
<p>Beyond this page, you will find a form that will allow you to explore our plans and design your own custom home. As you go through the home customization process, please keep in mind that these decisions are not final. By submitting this form, <i>you are not signing up to buy a house</i> from us. And even if you do decide to buy from us, you are not locked into these selections. This is here to give you an idea of pricing and to show you all the features that are available to you.</li>
 </ul>

<p><strong>To continue through the home customization process, please contact our Sales Manager at <a href='tel:3148812333'>314.881.2333</a> or <a href='mailto:sales@uicstl.com'>sales@uicstl.com</a>.</strong></p><br/>" ) . '
  <div class="row">
    <div class="large-12 columns">
      <div class="row collapse">
        <div class="small-10 columns">
          <input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" placeholder="Password" />
        </div>
        <div class="small-2 columns">
          <input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" class="button postfix" />
        </div>
      </div>
    </div>
  </div>
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'uic_password_form' );

// Remove Protected from Title
function the_title_trim($title) {
	$title = attribute_escape($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');


//if($_GET['dev'] == true) {
	//echo '<div style="display:none">Dev is On</div>';

	require('library/shortcodes/section_shortcode.php');

	function uic_shortcode_styles() {
		wp_enqueue_style( 'uic-shortcode-styles', get_stylesheet_directory_uri() . '/library/shortcodes/shortcodes.css' );
	}
	add_action( 'wp_enqueue_scripts', 'uic_shortcode_styles', 1001 );

//}

//if($_GET['dev'] == true) {

	require_once('library/SLAM/slam_post.php'); 
	include('library/classes/metaboxes/meta_box.php');
	include('library/post-types/unit.php');
	include('library/post-types/model.php');


	require_once('library/SLAM/colors.php'); 
	require_once('library/SLAM/section.php'); 
	require_once('library/SLAM/page.php'); 

//}

?>