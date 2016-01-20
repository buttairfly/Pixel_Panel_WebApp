<?php

function printVarSlider($Sliders)
{
	$s = "";
	foreach($Sliders as $Slider => $Attr)
	{
		$s .= "var ".$Slider."Val = ".$Attr["value"].";\r\n\t";
	}
	return $s;
}


function printResizeSlider()
{
    return "$(\".slider\").width(Math.min($('#item').width()-60 , 640));\r\n";
}

function printChangeValueSlider($Sliders,$endKomma)
{
	$s = "";
	$last = count($Sliders) -1;
	foreach($Sliders as $Slider => $Attr)
	{
		$s .= "$('#".$Slider."').slider().data('slider').getValue()";
		if($last != 0) {
			//not last item
			$s.= ",\r\n\t\t\t";
		}
		else
		{
			if($endKomma)
			{
				$s.= ",\r\n";
			}
			else
			{
				$s .= "\r\n";
			}
		}
		$last--;
	}
	return $s;
}
function printInitSlider($Sliders)
{
	$s = "";
	foreach($Sliders as $Slider => $Attr)
	{
	$s .= 	"
			// ".$Slider."
			$('#".$Slider."').slider({
			min: ".$Attr["min"].",
			max: ".$Attr["max"].",
			step: ".$Attr["step"].",
			value: ".$Slider."Val,
			});
			$('#".$Slider."').slider()
			.on('slide', function(ev){";
	$s .= 	"\r\n\t\t\t\tvar valHasChanged = 0;";
	$s .= 	"\r\n\t\t\t\tif((".$Slider."Val != $('#".$Slider."').slider().data('slider').getValue()) && !isNaN($('#".$Slider."').slider().data('slider').getValue())){";
	$s .= 	"\r\n\t\t\t\t\t".$Slider."Val = $('#".$Slider."').slider().data('slider').getValue();";
	$s .= 	"\r\n\t\t\t\t\tvar valHasChanged = 1;";
	$s .= 	"\r\n\t\t\t\t}";
	if(empty($Attr["noValueChange"]))
	{
		$s .= 	"\r\n\t\t\t\tif(valHasChanged){";
		$s .= 	"\r\n\t\t\t\t\tchangeValue();";
		$s .= 	"\r\n\t\t\t\t}";
		
	}			
		$s .= 	"\r\n\t\t\t});
			// /".$Slider."\r\n";
	}
	return $s;
}

function printDivSlider($Sliders,$bsCols)
{
	$s = "";
	foreach($Sliders as $Slider => $Attr)
	{
	$s .= "
	<div id='item' class='col-lg-".$bsCols["lg"]." col-md-".$bsCols["md"]." col-sm-".$bsCols["sm"]." col-xs-".$bsCols["xs"]." text-center' style='margin-bottom:20px;'>
		<h4>".$Attr["name"]."</h4>
		<input type='text' id='".$Slider."'>
	</div>\r\n";
	}
	return $s;
}
?>