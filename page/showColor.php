<?php
	$Spectrums = array(
		"color" 	=> array("name" => "Color"			, "r" => 255, "g" =>   0, "b" => 0, "flat" => true, "showInput" => 0, "showButtons" => 0),
	);
	$Komma = array(
		"slider"	=> 0,
		"spectrum" 	=> 0,
	);
	$bsCols = array('lg'=>12,'md'=>12,'sm'=>12,'xs'=>12);
?>
<script>
	<?php if(!empty($Spectrums)) echo printVarSpectrum($Spectrums); ?>

	function resize(){
		<?php if(!empty($Spectrums)) echo printResizeSpectrum($Spectrums); ?>
	}

	function changeValue(){
		<?php if(empty($_REQUEST['Site']))
		{
			echo $DefaultSite;
		}
		else 
		{
			echo $_REQUEST['Site'];//call function like the sites name
		}?>(
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		);
	}
	
	function paletteUpdateColor(){
		changeValue();
	}

	$(document).ready(function() {
		<?php if(!empty($Spectrums)) echo printInitSpectrum($Spectrums); ?>
		
		resize();
		
		$(window).resize(function(){
			resize();
		});
	});
 </script>
<div class="row text-center">
	<?php if(!empty($Spectrums)) {
		echo printDivSpectrum($Spectrums,$bsCols);
		echo printPaletteColors();
	}
	?>
</div>