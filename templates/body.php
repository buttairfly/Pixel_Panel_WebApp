
<script>
	<?php if(!empty($Spectrums)) echo printVarSpectrum($Spectrums); ?>
	<?php if(!empty($Sliders)) echo printVarSlider($Sliders); ?>
	
	function resize(){
		<?php if(!empty($Sliders)) echo printResizeSlider(); ?>
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
			<?php if(!empty($Sliders)) echo printChangeValueSlider($Sliders,$Komma["slider"]); ?>
		);
	}
	
	function paletteUpdateColor()
	{
		paletteUpdate(
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		);
	}
	
	function paletteAppendColor()
	{
		/*
		array_push( $Palette, array(
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		));
		*/
		paletteAppend(
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		);
	}

	function paletteClearColor()
	{
		paletteClear();
	}
	
	$(document).ready(function() {
		
		<?php if(!empty($Sliders)) echo printInitSlider($Sliders); ?>
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
		echo printPaletteButtons();
		echo printPaletteColors();
	}
	?>
	<?php if(!empty($Sliders)) echo printDivSlider($Sliders,$bsCols); ?>
</div>