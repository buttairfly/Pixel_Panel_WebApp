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
    $s .= "$('.sp-picker-container').width(Math.min($('#item').width()-30 , 470));\r\n";
	foreach ($Spectrums as $Spectrum => $Attr)
	{
		$s .= "$('#".$Spectrum."').spectrum('reflow');";
	}
	return $s;
}

function printChangeValueSpectrum($Spectrums,$endKomma)
{
	$s = "";
	$last = count($Spectrums) -1;
	foreach($Spectrums as $Spectrum => $Attr)
	{
		$s .= "Math.floor(".$Spectrum."Val[0]),\r\n\t\t\t";
		$s .= "Math.floor(".$Spectrum."Val[1]),\r\n\t\t\t";
		$s .= "Math.floor(".$Spectrum."Val[2])\r";
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
	$s .= 	"
			// ".$Spectrum."
			$('#".$Spectrum."').spectrum({
				flat: ".$Attr["flat"].",
				showInput: ".$Attr["showInput"].",
				showButtons: ".$Attr["showButtons"].",
				color: tinycolor(\"rgb (".$Attr["r"].",".$Attr["g"].",".$Attr["b"].")\"),
				move: function(color) {
					if(color){
						".$Spectrum."Val[0] = color._r;
						".$Spectrum."Val[1] = color._g;
						".$Spectrum."Val[2] = color._b;
						
						changeValue();
					}
				}
			});
			// /".$Spectrum."\r\n\t\t\t";
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