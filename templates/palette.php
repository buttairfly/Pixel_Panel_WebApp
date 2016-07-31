<?php
function printPaletteButtons(){
	$s  = "";
	$s .= "\r\n\t\t";
	$s .= "<div class='btn-group btn-group-lg'	role='toolbar' aria-label='Tools'>\r\n\t\t\t";
	$s .= "<button type='button' class='btn btn-default' onclick='paletteAppendColor();'><img src='pic/glyphicons-10-magic.png' height='24'></button>\r\n\t\t\t";
	$s .= "<button type='button' class='btn btn-warning' onclick='paletteClearColor();'><img src='pic/glyphicons-17-bin.png' height='24'></button>\r\n\t\t";
	$s .= "</div>\r\n";
	return $s;
}

function printPaletteColors(){
	$s = "";
	/*
	$s .= "\r\n\t\t";
	$s .= "<div class='btn-group btn-group-lg' role='toolbar' aria-label='Tools'>\r\n\t\t\t";
	foreach($Palette as $PalColor => $Color)
	{
	$s .= "<button type='button' class='btn' background-color=tinycolor({ r: ".$Color["r"].", g: ".$Color["g"].", b: ".$Color["b"]."})></button>\r\n\t\t\t";
	//$s .= "<button type='button' class='btn'></button>\r\n\t\t\t";
	}	
	$s .= "\r\n\t\t";
	$s .= "</div>\r\n";
	*/
	return $s;
}
?>