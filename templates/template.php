<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>PixelPanel - <?php 
		if(empty($_REQUEST['Site']))
		{
			echo $Menus[$DefaultSite]['menu'];
		}
		else 
		{
			echo $Menus[$_REQUEST['Site']]['menu'];
		}
	?></title>
	<link rel="icon" type="image/png" href="pic/ic_launcher.png">
	
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css"-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>	
	
	<script src="spectrum/spectrum.js"></script>
	<link rel="stylesheet" href="spectrum/spectrum.css">

	<script src="js/tpm2func.js"></script>
	
	<link rel="stylesheet" href="slider/slider.css">
	<link rel="stylesheet/less" type="text/css" href="slider.less" />
	<script src="slider/bootstrap-slider.js"></script>
	
</head>
<body>
	<div id="nav"><!-- nav -->
<?php
	include "templates/nav.php";
?>
	</div><!-- /nav -->
	<div class="container-fluid page-header text-center" style="margin-top:70px;">
		<div onclick="changeValue()" style="cursor: pointer;"><h1><span class="label label-primary">
			<?php 
				if(empty($_REQUEST['Site']))
				{
					echo $Menus[$DefaultSite]['menu'];
				}
				else 
				{
					echo $Menus[$_REQUEST['Site']]['menu'];
				}
			?></span></h1>
		</div>
	</div>
	<div id="wrapper" class="container-fluid" style="margin-bottom:20px;"><!-- wrapper -->


<?php
if (!empty($_REQUEST['Site']) and isset($Menus[$_REQUEST['Site']]['page']))
{
	include 'page/'.$Menus[$_REQUEST['Site']]['page'];
}
else
{
	include 'page/'.$Menus[$DefaultSite]['page'];
}
?>


	</div><!-- /wrapper -->
</body>
</html>
	