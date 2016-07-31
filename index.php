<?php
ini_set('display_errors', 1);

include "templates/slider.php";
include "templates/spectrum.php";
include "templates/palette.php";
include "templates/tableDrawer.php";

$DefaultSite = "showColor";

$DropDownLeft = array(
	"draw" => "Draw",
	"animation" => "Animation",
	"games" => "Games",
);

$DropDownRight = array(
	"settings" => "Settings",
);

$Menus = array(
	//Draw
	"showColor" 	=> array("menu" => "Color",				"parent" => "draw",		 "page" => "showColor.php",		),
	"drawPicture" 	=> array("menu" => "Picture",			"parent" => "draw",		 "page" => "drawPicture.php",	),
	//Animation
	"pulseColor" 	=> array("menu" => "Pulse Color",		"parent" => "animation", "page" => "pulseColor.php",	),
	"fadeScreen" 	=> array("menu" => "Fade Screen",		"parent" => "animation", "page" => "fadeScreen.php",	),
	"fadeDirection" => array("menu" => "Fade Direction",	"parent" => "animation", "page" => "fadeDirection.php",	),
	"divider1" 		=> array("menu" => "#",					"parent" => "animation", 			                    ),
	"invader" 		=> array("menu" => "Invader",			"parent" => "animation", "page" => "invader.php",		),
	"rotor" 		=> array("menu" => "Rotor",			    "parent" => "animation", "page" => "rotor.php",			),
	"drop" 			=> array("menu" => "Drops",			    "parent" => "animation", "page" => "drop.php",			),
	"divider2" 		=> array("menu" => "#",					"parent" => "animation", 		                        ),
	"fadePixel" 	=> array("menu" => "Fade Pixel",		"parent" => "animation", "page" => "fadePixel.php",		),
	"fallingPixel" 	=> array("menu" => "Falling Pixel",		"parent" => "animation", "page" => "fallingPixel.php",	),
	"plasma"	 	=> array("menu" => "Plasma",			"parent" => "animation", "page" => "plasma.php",		),
	//Games
	"snake" 		=> array("menu" => "Snake",             "parent" => "games",	 "page" => "snake.php",			),
);

$Colors = array(
    "color" 		=> array("r"=> 255,"g"=>   0,"b" =>   0),
	"color1" 		=> array("r"=> 255,"g"=>   0,"b" =>   0),
	"color2" 		=> array("r"=>   0,"g"=>   0,"b" =>   0),
);

$Dimension = array(
	"width"	=> 20,
	"height"=> 10,
);

include "templates/template.php";
?>