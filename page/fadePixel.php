<?php
	$Sliders = array(
		"skipframe" 	=> array("name" => "Skip Frame"			, "min" => 0, "max" =>  20, "step" => 1, "value" =>   0),
		"numPix"		=> array("name" => "Number of Pixel"	, "min" => 1, "max" => 200, "step" => 1, "value" =>  100),
		"fadeSpeed"		=> array("name" => "Fading Speed"		, "min" => 1, "max" => 255, "step" => 1, "value" =>   2),
	);
	$Spectrums = array(
	);
	$Komma = array(
		"slider"	=> 0,	
		"spectrum" 	=> 0,		
	);
	$bsCols = array('lg'=>6,'md'=>6,'sm'=>12,'xs'=>12);
	
	include "templates/body.php";
?>