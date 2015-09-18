<?php 

/*********************
COLOR CLASS
*********************/

class Color {

	public $name;
	public $hex;
	public $rgb;

	function __construct($name, $hex) {

		$this->name = $name;
		$this->hex = trim($hex, '#');

		$hex = $this->hex;

		if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   	} else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   	}
	   	$this->rgb = array('r' => $r, 'g' => $g, 'b' => $b);

	}

	public function rgba($trans) {
		$out = "rgba( {$this->rgb['r']}, {$this->rgb['g']}, {$this->rgb['b']}, {$trans})";
		return $out;
	}

	

}


/*********************
DEFINE COLORS
*********************/

$colors = array(
	'white' 	=> new Color('white', 	'FFFFFF'),
	'yellow' 	=> new Color('yellow', 	'ffee00'),
	'silver'	=> new Color('silver', 	'f0f0f0'),
	'gray'		=> new Color('gray', 	'757575'),
	'dark'		=> new Color('dark', 	'333333'),
	'black' 	=> new Color('black', 	'000000'),
);


function slam_get_color_options($value = 'name', $form = null){
	global $colors;

	$out = array();

	if(!$form) {

		foreach($colors as $color){
			$out[] = array(
				'label'	=> ucfirst($color->name),
				'value' => $color->$value,
			);
		}

	} else {

		foreach($colors as $color){
			$out[$color->name] = $color->$value;		
		}

	}

	return $out;
}
