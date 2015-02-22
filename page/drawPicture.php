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
	var beforeEyedropper = 1;
	var drawMode = 0;
	<?php if(!empty($Spectrums)) echo printVarSpectrum($Spectrums); ?>
	<?php if(!empty($Tables)) echo printVarTable($Tables); ?>
	
	function resize(){
		<?php if(!empty($Spectrums)) echo printResizeSpectrum($Spectrums); ?>
		<?php if(!empty($Tables)) echo printResizeTable($Tables); ?>
	}
	
	function resetButtons(){
		$('#drawPixel').removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#drawLine").removeClass( "btn-primary" ).removeClass( "btn-success" ).addClass( "btn-default" );;
		$("#drawRect").removeClass( "btn-primary" ).removeClass( "btn-success" ).addClass( "btn-default" );
		$("#fillColor").removeClass( "btn-primary" ).addClass( "btn-default" );
		$("#getColor").removeClass( "btn-primary" ).addClass( "btn-default" );
	}
	
	function resetTableTdFrame(oldx,oldy){
		if(!firstLoaded){
			var table = $("#picture")[0];
			var tabCell = table.rows[oldy].cells[oldx]; // This is a DOM "TD" element
			$(tabCell).css('border','1px solid #505050');
		}
	}
	
	function setTableTdFrame(oldx,oldy,newx,newy){
		resetTableTdFrame(oldx,oldy);
		var table = $("#picture")[0];
		var tabCell = table.rows[newy].cells[newx];
		$(tabCell).css('border','1px solid white');
	}
		
	function setDrawPixel(){
		drawMode = 0;
		twoPointActive = 0;
		resetButtons();
		$("#drawPixel").removeClass( "btn-default" ).removeClass( "btn-success" ).addClass( "btn-primary" );
	}
	function setDrawLine(){
		drawMode = 1;
		twoPointActive = 1;
		resetButtons();
		resetTableTdFrame(pictureVal[0],pictureVal[1]);
		$("#drawLine").removeClass( "btn-default" ).removeClass( "btn-success" ).addClass( "btn-primary" );
	}
	function setDrawRect(){
		drawMode = 2;
		twoPointActive = 1;
		resetButtons();
		resetTableTdFrame(pictureVal[0],pictureVal[1]);
		$("#drawRect").removeClass( "btn-default" ).removeClass( "btn-success" ).addClass( "btn-primary" );
	}
	function setFillColor(){
		drawMode = 3;
		twoPointActive = 0;
		resetButtons();
		$("#fillColor").removeClass( "btn-default" ).removeClass( "btn-success" ).addClass( "btn-primary" );
	}
	
	function setGetColor(){
		if(drawMode != 4){
			beforeEyedropper = drawMode;
		}
		drawMode = 4;
		twoPointActive = 0;
		resetButtons();
		$("#getColor").removeClass( "btn-default" ).removeClass( "btn-success" ).addClass( "btn-primary" );
	}
	
	function drawReset(){
		showColor(0,0,0);
		resetTableTdFrame(pictureVal[0],pictureVal[1]);
		$('td').css('background-color',tinycolor({ r: 0, g: 0, b: 0}));
	}
	function fillColor(){
		showColor(colorVal[0],colorVal[1],colorVal[2]);
		$('td').css('background-color',tinycolor({ r: colorVal[0], g: colorVal[1], b: colorVal[2]}));
	}
	function drawPixel(cell){
		cell.css('background-color',tinycolor({ r: colorVal[0], g: colorVal[1], b: colorVal[2]}));
		setPixel(
			<?php if(!empty($Spectrums)) echo printChangeValueTable($Tables,$Komma["table"]); ?>
			<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
		);
	}
	
	function changeValue(){
		
	}
	
	function drawRect(){
		if(twoPointActive == 1){
			$("#drawRect").removeClass( "btn-primary" ).addClass( "btn-success" );
			twoPointActive = 2;
		}else{
			if(twoPointActive == 2){
				$("#drawRect").removeClass( "btn-success" ).addClass( "btn-primary" );
				twoPointActive = 1;
				
				var x0 = Math.min(pictureVal[0], pictureVal2[0]);
				var x1 = Math.max(pictureVal[0], pictureVal2[0]);
				
				var y0 = Math.min(pictureVal[1], pictureVal2[1]);
				var y1 = Math.max(pictureVal[1], pictureVal2[1]);
				setRect(
					x0,y0,x1,y1,
					<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
				);
				for(var y = y0; y <= y1; y++)
				for(var x = x0; x <= x1; x++)
				{
					var table = $("#picture")[0];
					var tabCell = table.rows[y].cells[x]; // This is a DOM "TD" element
					$(tabCell).css('background-color',tinycolor({ r: colorVal[0], g: colorVal[1], b: colorVal[2]}));
				}
			}
		}
	}
	
	function drawLine(){
		if(twoPointActive == 1){
			$("#drawLine").removeClass( "btn-primary" ).addClass( "btn-success" );
			twoPointActive = 2;
		}else{
			if(twoPointActive == 2){
				$("#drawLine").removeClass( "btn-success" ).addClass( "btn-primary" );
				twoPointActive = 1;
				
				setLine(
					<?php if(!empty($Spectrums)) echo printChangeValueTable($Tables,$Komma["table"]); ?>
					pictureVal2[0],
					pictureVal2[1],
					<?php if(!empty($Spectrums)) echo printChangeValueSpectrum($Spectrums,$Komma["spectrum"]); ?>
				);
				
				var x0 = pictureVal[0],x1 = pictureVal2[0];
				var y0 = pictureVal[1],y1 = pictureVal2[1];
				var dx =  Math.abs(x1-x0); 
				var sx;
				if(x0<x1){
					sx = 1;
				}
				else{
					sx = -1;
				}
				var dy = -Math.abs(y1-y0); 
				var sy;
				if(y0<y1){
					sy = 1;
				}
				else{
					sy = -1;
				}
				var err = dx+dy, e2; /* error value e_xy */
				 
				for(;;){  /* loop */
					var table = $("#picture")[0];
					var tabCell = table.rows[y0].cells[x0]; // This is a DOM "TD" element
					$(tabCell).css('background-color',tinycolor({ r: colorVal[0], g: colorVal[1], b: colorVal[2]}));
					if (x0==x1 && y0==y1) break;
					e2 = 2*err;
					if (e2 > dy) { err += dy; x0 += sx; } /* e_xy+e_x > 0 */
					if (e2 < dx) { err += dx; y0 += sy; } /* e_xy+e_y < 0 */
				}
			}

		}
		
	}
	
	function getColor(cell){
		var c =  cell.css('backgroundColor');
		var ci = c.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		colorVal[0] = parseInt(ci[1]);
		colorVal[1] = parseInt(ci[2]);
		colorVal[2] = parseInt(ci[3]);
		
		<?php  if(!empty($Spectrums)) echo printInitSpectrum($Spectrums); ?>		
		resize();		
		drawMode = beforeEyedropper;
		switch(beforeEyedropper){
			case 0: setDrawPixel(); break;
			case 1: setDrawLine();  break;
			case 2: setDrawRect();  break;
			case 3: setFillColor(); break;
			default: setDrawPixel();break;
		}
	}
	
	function tableEvent(cell,x,y){
		if(firstLoaded){
			drawReset();
			firstLoaded = 0;
		}
		setTableTdFrame(pictureVal[0],pictureVal[1],x,y);
		pictureVal2[0] = pictureVal[0];
		pictureVal2[1] = pictureVal[1];
		pictureVal[0] = x;
		pictureVal[1] = y;
		switch(drawMode){
			case  0: drawPixel(cell); break;
			case  1: drawLine();      break;
			case  2: drawRect();      break;
			case  3: fillColor();     break;
			case  4: getColor(cell);  break;
			default: drawPixel(cell); break;
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
			<button id='drawPixel' type='button' class='btn btn-primary' onclick='setDrawPixel();'><img src="pic/glyphicons-31-pencil.png" height="24"></button>
			<button id='fillColor' type='button' class='btn btn-default' onclick='setFillColor();'><img src="pic/glyphicons-481-bucket.png" height="24"></button>
		</div>
		<div class="btn-group btn-group-lg" role="toolbar" aria-label="Tools">
			<button id='drawLine'  type='button' class='btn btn-default' onclick='setDrawLine();' ><img src="pic/glyphicons-98-vector-path-line.png" height="24"></button>
			<button id='drawRect'  type='button' class='btn btn-default' onclick='setDrawRect();'><img src="pic/glyphicons-100a-vector-rect_empty.png" height="24"></button>
		</div>
		<div class="btn-group btn-group-lg" role="toolbar" aria-label="Tools">
			<button id='getColor' type='button' class='btn btn-default' onclick='setGetColor();'><img src="pic/glyphicons-91-eyedropper.png" height="24"></button>
			<button type="button" class="btn btn-warning" onclick="drawReset();"><img src="pic/glyphicons-17-bin.png" height="24"></button>
		</div>
		
	</div>
	
			<?php if(!empty($Spectrums)) echo printDivSpectrum($Spectrums,$bsCols); ?>
</div>