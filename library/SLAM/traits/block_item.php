<?php
namespace traits;

trait block_item {

	public function block(){

		$out = '';

		$out .= "<li class='list-item list-item--block block'>";
		$out .= 	"<a href='{$this->permalink}' title='{$this->title}'>";
		$out .= 		$this->image(array('square','thumbnail'));
		$out .=			"<div class='info'>" . $this->info() . "</div>";
		$out .= 	"</a>";
		$out .= "</li>";

		// echo "<pre>";
		// print_r($this);
		// echo "</pre>";

		return $out;


	}

}