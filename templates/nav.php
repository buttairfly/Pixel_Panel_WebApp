	<nav class="navbar navbar-inverse navbar-fixed-top" >
	  <div class="container">
		<!-- Nav-Title and Icon -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Navigation ein-/ausblenden</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php?Site=<?php echo $DefaultSite ?>">
			<img alt="PixelPanel" src="pic/ic_launcher.png" width="22">
		  </a>
		</div>

		<!-- Nav-Items -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav nav-pills"><!-- DropDownLeft -->
<?php
	foreach($DropDownLeft as $dKey => $dMenu)
	{
		
		if((!empty($_REQUEST['Site']) and $dKey == $Menus[$_REQUEST['Site']]['parent']) or (empty($_REQUEST['Site']) and $dKey == $Menus[$DefaultSite]['parent']))
		{
			echo '				<li class="dropdown active">
';
		}
		else
		{
			echo '				<li class="dropdown">
';
		}
		echo '					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$dMenu.'<span class="caret"></span></a>
';
		echo '					<ul class="dropdown-menu" role="menu">
';
		foreach($Menus as $Key => $MenuAttr)
		{
			if($dKey == $MenuAttr['parent'])
			{
				if($MenuAttr['menu'] != '#')
				{
					if((!empty($_REQUEST['Site']) and $Key == $_REQUEST['Site']) or (empty($_REQUEST['Site']) and $Key == $DefaultSite))
					{
						echo '						<li class="active"><a href="index.php?Site='.$Key.'">'.$MenuAttr['menu'].'</a></li>
';
					}
					else
					{
						echo '						<li><a href="index.php?Site='.$Key.'">'.$MenuAttr['menu'].'</a></li>
';
					}
				}
				else
				{
					echo '						<li class="divider"></li>
';
				}
			}
		}
		echo '					</ul>
';
		echo '				</li>
';
	}
?>
			</ul><!-- / DropDownLeft -->
<!--
			<ul class="nav navbar-nav navbar-right nav-tabs">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Connectivity</a></li>
						<li class="divider"></li>
						<li><a href="#">Display</a></li>
					</ul>
				</li>
			</ul>
-->
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>