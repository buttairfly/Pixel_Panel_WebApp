
<script>
	<?php echo printVarSpectrum($Spectrums) ?>
	
	function resize(){
		<?php echo printResizeSlider(); ?>
		<?php echo printResizeSpectrum($Spectrums); ?>
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
			<?php echo printChangeValueSlider($Sliders,$Komma["slider"]); ?>
			<?php echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		);
	}
	
	$(document).ready(function() {
		
		<?php echo printInitSlider($Sliders); ?>
		<?php echo printInitSpectrum($Spectrums); ?>
		
		resize();
		
		$(window).resize(function(){
			resize();
		});			
	});
 </script>
<div class="row text-center">
	<?php echo printDivSpectrum($Spectrums,$bsCols); ?>
	<?php echo printDivSlider($Sliders,$bsCols); ?>
</div>