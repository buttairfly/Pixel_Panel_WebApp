<?php
	$Spectrums = array(
		"color" 	=> array("name" => "Brush Color"			, "r" => 255, "g" =>   0, "b" => 0, "flat" => 1, "showInput" => 0, "showButtons" => 0, "noValueChange" => 1),
	);
	$Tables = array(
		"picture" 	=> array("name" => "Picture"	, "width" => $Dimension['width'], "height" => $Dimension['height'], "spectrum" => "color"),
	);
	$Komma = array(
		"slider"	=> 0,
		"table" 	=> 1,
		"spectrum" 	=> 0,
	);
	$bsCols = array('lg'=>6,'md'=>6,'sm'=>6,'xs'=>12);
	
?>

<script>
	var firstLoaded = 1;
	var drawMode = 0;
	<?php if(!empty($Spectrums)) echo printVarSpectrum($Spectrums); ?>
	<?php if(!empty($Tables)) echo printVarTable($Tables); ?>
	
	function resize(){
		<?php if(!empty($Spectrums)) echo printResizeSpectrum($Spectrums); ?>
		<?php if(!empty($Tables)) echo printResizeTable(); ?>
	}
	
	function setDrawPixel(){
		drawMode = 0;
		twoPointActive = 0;
		$('#drawPixel').removeClass( "btn-default" ).addClass( "btn-primary" );
		$("#drawRect").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawLine").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#fillColor").removeClass( "btn-primary" ).addClass( "btn-default" );
	}
	function setDrawLine(){
		drawMode = 1;
		twoPointActive = 1;
		$("#drawPixel").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawLine").removeClass( "btn-default" ).addClass( "btn-primary" );
		$("#drawRect").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#fillColor").removeClass( "btn-primary" ).addClass( "btn-default" );
	}
	function setDrawRect(){
		drawMode = 2;
		twoPointActive = 1;
		$('#drawPixel').removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawLine").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawRect").removeClass( "btn-default" ).addClass( "btn-primary" );
		$("#fillColor").removeClass( "btn-primary" ).addClass( "btn-default" );
	}
	function setFillColor(){
		drawMode = 3;
		twoPointActive = 0;
		$("#drawPixel").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawRect").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawLine").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#fillColor").removeClass( "btn-default" ).addClass( "btn-primary" );
	}
	function drawReset(){
		showColor(0,0,0);
		$('td').css('background-color',tinycolor({ r: 0, g: 0, b: 0}));
	}
	function fillColor(){
		showColor(colorVal[0],colorVal[1],colorVal[2]);
		$('td').css('background-color',tinycolor({ r: colorVal[0], g: colorVal[1], b: colorVal[2]}));
	}
	function drawPixel(){
		setPixel(
			<?php if(!empty($Spectrums)) echo printChangeValueTable($Tables,$Komma["table"]); ?>
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>);
	}
	
	function tableEvent(cell,x,y){
		if(firstLoaded){
			drawReset();
			firstLoaded = 0;
		}
		cell.css('background-color',tinycolor({ r: colorVal[0], g: colorVal[1], b: colorVal[2]}));
		pictureVal2[0] = pictureVal[0];
		pictureVal2[1] = pictureVal[1];
		pictureVal[0] = x;
		pictureVal[1] = y;
		if(drawMode == 0){
			drawPixel()
		}
		if(drawMode == 3){
			fillColor();
		}
	}
	
	$(document).ready(function() {
		<?php if(!empty($Spectrums)) echo printInitSpectrum($Spectrums); ?>
		<?php if(!empty($Tables)) echo printTableEventCall($Tables); ?>
		
		resize();
		
		$(window).resize(function(){
			resize();
		});			
	});
 </script>
<div class="row text-center">
	
	
	
	
	
	<?php echo "<div id='item' class='col-lg-".$bsCols["lg"]." col-md-".$bsCols["md"]." col-sm-".$bsCols["sm"]." col-xs-".$bsCols["xs"]." text-center' style='margin-bottom:20px;'>"; ?>
	<?php if(!empty($Tables)) echo printTables($Tables,$bsCols); ?>
		<div class="btn-group btn-group-lg" role="toolbar" aria-label="Tools">
			<button id='drawPixel' type='button' class='btn btn-primary' onclick='setDrawPixel();'><img src="pic/glyphicons-31-pencil.png" height="30"></button>
			<button id='fillColor' type='button' class='btn btn-default' onclick='setFillColor();'><img src="pic/glyphicons-481-bucket.png" height="30"></button>
		</div>
		<div class="btn-group btn-group-lg" role="toolbar" aria-label="Tools">
			<button id='drawLine'  type='button' disabled="disabled" class='btn btn-default' onclick='setDrawLine();' ><img src="pic/glyphicons-98-vector-path-line.png" height="30"></button>
			<button id='drawRect'  type='button' disabled="disabled" class='btn btn-default' onclick='setDrawRect();'><img src="pic/glyphicons-100-vector-path-all.png" height="30"></button>
		</div>
		<div class="btn-group btn-group-lg" role="toolbar" aria-label="Tools">
			<button id='getColor' type='button' disabled="disabled" class='btn btn-default' onclick='setgetColor();'><img src="pic/glyphicons-91-eyedropper.png" height="30"></button>
			<button type="button" class="btn btn-warning" onclick="drawReset();"><img src="pic/glyphicons-17-bin.png" height="30"></button>
		</div>
		
	</div>
	
			<?php if(!empty($Spectrums)) echo printDivSpectrum($Spectrums,$bsCols); ?>
</div>