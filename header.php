<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  session_start();
  include_once 'functions.php';
  include_once 'dbconnect.php';

  ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href=<?=ROOT?> />

    <!-- <meta http-equiv="refresh" content="5" > -->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>de Vishal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-latest.min.js"
            type="text/javascript"></script>

      <script src="js/scripts.js" type="text/javascript"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://use.fontawesome.com/4bde63513d.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include_once("analyticstracking.php") ?>

<div id="navbar">
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="images/logo_vishal.png" id="logo"></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">

	<?php
	$vorigmenuItem = '';
	$output = '';
	$submenu = '';
    $query = "SELECT menuItem.naam AS 'menuItem', submenuItem.naam AS 'submenuItem', submenuItem.volgorde
                              FROM menuItem 
                              INNER JOIN submenuItem ON submenuItem.menuId = menuItem.menuId 
                              ORDER BY menuItem.volgorde, submenuItem.volgorde";
    $result = $conn->query($query);
    if($result->num_rows > 0) {
        while($rec = $result->fetch_assoc()) {
            if($vorigmenuItem<>$rec['menuItem']) {
                $output .= $submenu;
                $submenu = '';
                if($vorigmenuItem<>'')
                    $output .= '</ul></li>';
                $output .= '<li class="dropdown full-width">';
				if(isMobile()){
                    $output .= '<a href="'.$rec['submenuItem'].'" class="dropdown-toggle" data-toggle="dropdown">'.$rec['menuItem'].'</a>';
                } else {
                    $output .= '<a href="'.$rec['submenuItem'].'" class="dropdown-toggle">'.$rec['menuItem'].'</a>';
                }
				$output .= '<ul class="dropdown-menu">';
                $vorigmenuItem = $rec['menuItem'];
            }
            if($rec['volgorde']>-1)
                $submenu = '<li><a href="'.$rec['menuItem'].'/'.$rec['submenuItem'].'">'.$rec['submenuItem'].'</a></li>'.$submenu;
        }
        $output .= $submenu;
        echo $output;
    }
	else
		echo  'Helaas, geen gegevens gevonden.';
	?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
</div>
