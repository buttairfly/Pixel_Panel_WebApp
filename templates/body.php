
<script>
	<?php if(!empty($Spectrums)) echo printVarSpectrum($Spectrums); ?>
	
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
			echo $_REQUEST['Site'];
		}?>(
			<?php if(!empty($Sliders)) echo printChangeValueSlider($Sliders,$Komma["slider"]); ?>
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		);
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
	<?php if(!empty($Spectrums)) echo printDivSpectrum($Spectrums,$bsCols); ?>
	<?php if(!empty($Sliders)) echo printDivSlider($Sliders,$bsCols); ?>
</div>