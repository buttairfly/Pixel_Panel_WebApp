<?php

function printVarSpectrum($Spectrums)
{
	$s = "";
	foreach($Spectrums as $Spectrum => $Attr)
	{
		$s .= "var ".$Spectrum."Val = [".$Attr["r"].",".$Attr["g"].",".$Attr["b"]."];\r\n\t";
	}
	return $s;
}

function printResizeSpectrum($Spectrums)
{
	$s = "";
    $s .= "$('.sp-picker-container').width(Math.min($('#item').width()-30 , 660));\r\n";
	foreach ($Spectrums as $Spectrum => $Attr)
	{
		$s .= "$('#".$Spectrum."').spectrum('reflow');\r\n";
	}
	return $s;
}

function printChangeValueSpectrum($Spectrums,$endKomma)
{
	$s = "";
	$last = count($Spectrums) -1;
	foreach($Spectrums as $Spectrum => $Attr)
	{
		$s .= $Spectrum."Val[0],\r\n\t\t\t";
		$s .= $Spectrum."Val[1],\r\n\t\t\t";
		$s .= $Spectrum."Val[2]";
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
function printInitSpectrum($Spectrums)
{
	$s = "";
	foreach($Spectrums as $Spectrum => $Attr)
	{
	$s .= 	"\r\n";
	$s .= 	"\r\n\t\t// ".$Spectrum;
	$s .= 	"\r\n\t\t$('#".$Spectrum."').spectrum({";
	$s .= 	"\r\n\t\t\tflat: ".$Attr["flat"].",";
	$s .= 	"\r\n\t\t\tshowInput: ".$Attr["showInput"].",";
	$s .= 	"\r\n\t\t\tshowButtons: ".$Attr["showButtons"].",";
	$s .= 	"\r\n\t\t\tcolor: tinycolor({ r: ".$Spectrum."Val[0], g: ".$Spectrum."Val[1], b: ".$Spectrum."Val[2]}),";
	$s .= 	"\r\n\t\t\tmove: function(color) {";
	$s .= 	"\r\n\t\t\t\tif(color){";
	$s .= 	"\r\n\t\t\t\t\t".$Spectrum."Val[0] = Math.round(color._r);";
	$s .= 	"\r\n\t\t\t\t\t".$Spectrum."Val[1] = Math.round(color._g);";
	$s .= 	"\r\n\t\t\t\t\t".$Spectrum."Val[2] = Math.round(color._b);";
	if(empty($Attr["noValueChange"]))
	{
		$s .= 	"\r\n\t\t\t\t\tchangeValue();";
	}
	$s .= 	"\r\n\t\t\t\t}";
	$s .= 	"\r\n\t\t\t}";
	$s .= 	"\r\n\t\t});";
	$s .= 	"\r\n\t\t// /".$Spectrum."\r\n\t\t\t";
	}	
	return $s;
}

function printDivSpectrum($Spectrum,$bsCols)
{
	$s = "";
	foreach($Spectrum as $Spectrum => $Attr)
	{
	$s .= "
	<div id='item' class='col-lg-".$bsCols["lg"]." col-md-".$bsCols["md"]." col-sm-".$bsCols["sm"]." col-xs-".$bsCols["xs"]." text-center'>
		<h4>".$Attr["name"]."</h4>
		<input type='text' id='".$Spectrum."'>
	</div>\r\n";
	}
	return $s;
}
?>