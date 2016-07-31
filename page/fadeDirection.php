<?php
	$Sliders = array(
		"skipframe" 	=> array("name" => "Skip Frame"			, "min" => 0, "max" =>  20, "step" => 1, "value" =>   0),
		"delta"			=> array("name" => "Color Delta"		, "min" => 1, "max" => 100, "step" => 1, "value" =>   0),
		"direction"		=> array("name" => "Direction"			, "min" => 0, "max" =>   7, "step" => 1, "value" =>   0),
		"dimmer"		=> array("name" => "Color Dimmer"		, "min" => 0, "max" => 255, "step" => 1, "value" => 255),
		"saturation"	=> array("name" => "Color Saturation"	, "min" => 0, "max" => 255, "step" => 1, "value" =>   0),
	);
	$Spectrums = array(
		"color" 	=> array("name" => "Color" , "r" => 255, "g" =>   0, "b" => 0, "flat" => true, "showInput" => 0, "showButtons" => 0),
	);
	$Komma = array(
		"slider"	=> 0,	
		"spectrum" 	=> 0,		
	);
	$bsCols = array('lg'=>12,'md'=>12,'sm'=>12,'xs'=>12);
	
	include "templates/body.php";
?>