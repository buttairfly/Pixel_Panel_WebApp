<?php


function printVarTable($Tables){
	$s = "";
	
	$s .= "var twoPointActive = 0;\r\n\t";
	
	foreach($Tables as $Table => $Attr)
	{
		$s .= "var ".$Table."Val = [0,0];\r\n\t";
		$s .= "var ".$Table."Val2 = [0,0];\r\n\t";
	}
	return $s;
}

function printResizeTable($Tables){
	$s = "";
	foreach($Tables as $Table => $Attr){
		$s .= "\r\n\t\t$('.".$Table."Cell').width (Math.min($('#item').width() -60 , 32));";
		$s .= "\r\n\t\t$('.".$Table."Cell').height($('.".$Table."Cell').width());\r\n";
	}
	return $s;
}



function printTables($Tables,$bsCols){
	$s = "";
	$s .= "<style>
	.noselect {
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	.nopadding {
		font-size: 0px;
		padding: 0px;
		margin: 0px;
	}
	</style>";
	
	foreach($Tables as $Table => $Attr){
		$s .= "<div id='item' class='col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center' style='margin-bottom:20px;'>\r\n";
		$s .= "<h4>".$Attr["name"]."</h4>\r\n";
		$s .= "<table id='".$Table."' style='border-collapse: separate; margin: 0 auto 0 auto;'>\r\n";
		for($y = 0; $y < $Attr["height"]; $y++){
			$s .= "\t<tr>\r\n";
			for($x = 0; $x < $Attr["width"]; $x++){
				$s .= "\t\t<td class='".$Table."Cell noselect nopadding' style='cursor: pointer; border:1px solid #505050; background-color:black;'>&nbsp;</td>\r\n";
			}
			$s .= "\t</tr>\r\n";
		}
		$s .= "</table>\r\n";
		$s .= "</div>\r\n";
	}
	return $s;
}

function printTableEvent($Tables){
	$s = "";
	$s .= "\r\nfunction tableEvent(cell,x,y){\r\n";
	foreach($Tables as $Table => $Attr){
		$s .= "\tcell.css('background-color',tinycolor({ r: ".$Attr['spectrum']."Val[0], g: ".$Attr['spectrum']."Val[1], b: ".$Attr['spectrum']."Val[2]}));\r\n";
		$s .= "\t".$Table."Val[0] = x;\r\n";
		$s .= "\t".$Table."Val[1] = y;\r\n";
	}
	$s .= "\tdrawPixel();\r\n";
	$s .= "}";
	return $s;
}
function printTableEventCall(){
	$s = "\r\n";
	$s .= "\t\t$('td').click(function(){\r\n";
	$s .= "\t\t\tvar col = $(this).parent().children().index($(this));\r\n";
	$s .= "\t\t\tvar row = $(this).parent().parent().children().index($(this).parent());\r\n";
	$s .= "\t\t\ttableEvent($(this),col,row);\r\n";
	$s .= "\t\t});";
	return $s;
}


function printChangeValueTable($Tables,$endKomma){
	$s = "\r\n";
	$last = count($Tables) -1;
	foreach($Tables as $Table => $Attr)
	{
		$s .= $Table."Val[0],\r\n\t\t\t";
		$s .= $Table."Val[1]";
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

?>