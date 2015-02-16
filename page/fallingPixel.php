<?php
	$Sliders = array(
		"skipframe" 	=> array("name" => "Skip Frame"			, "min" => 0, "max" =>  20, "step" => 1, "value" =>   3),
		"numPix"		=> array("name" => "Number of Pixel"	, "min" => 1, "max" => 100, "step" => 1, "value" =>  10),
		"length"		=> array("name" => "Length of Pixels"	, "min" => 1, "max" =>  10, "step" => 1, "value" =>   5),
		"direction"		=> array("name" => "Direction"			, "min" => 0, "max" =>   7, "step" => 1, "value" =>   0),
		"dropDiff"		=> array("name" => "Differentiation"	, "min" => 1, "max" =>  20, "step" => 1, "value" =>   10),
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