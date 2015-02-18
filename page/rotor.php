<?php
	$Sliders = array(
		"skipframe" 	=> array("name" => "Skip Frame"			, "min" => 0, "max" =>  20, "step" => 1, "value" =>   2),
		"antialiasing" 	=> array("name" => "Anti-Aliasing"		, "min" => 0, "max" =>   0, "step" => 1, "value" =>   0),
		"width"			=> array("name" => "Width"				, "min" => 1, "max" => 	10, "step" => 1, "value" =>   1),
		"px"			=> array("name" => "P_x"				, "min" => 1, "max" =>   1, "step" => 0, "value" =>   1),
		"py"			=> array("name" => "P_y"				, "min" => 1, "max" =>   1, "step" => 0, "value" =>   1),
	);
	$Spectrums = array(
		"rotorColor" 	=> array("name" => "Rotor Color"		, "r" => 255, "g" =>   0, "b" => 0, "flat" => true, "showInput" => 0, "showButtons" => 0),
		"background" 	=> array("name" => "Background Color"	, "r" =>   0, "g" =>   0, "b" => 0, "flat" => true, "showInput" => 0, "showButtons" => 0),
	);
	$Komma = array(
		"slider"	=> 1,	
		"spectrum" 	=> 0,		
	);
	$bsCols = array('lg'=>4,'md'=>6,'sm'=>6,'xs'=>12);

	
	include "templates/body.php";
?>