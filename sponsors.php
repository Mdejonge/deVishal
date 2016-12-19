<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- <meta http-equiv="refresh" content="5" > -->
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>de Vishal</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <script src="http://code.jquery.com/jquery-latest.min.js"
  type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <script src="https://use.fontawesome.com/4bde63513d.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

  <!-- Begin navbar -->
  <?php require 'header.php';?>
  <!-- End navbar -->

  <!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>Sponsors</h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->

  <!-- Begin content -->
  <div class="row sponsorpage">
    <div class="container">
      <?php
		function toon_sponsor($naam, $tekst, $zichtbaar, $foto_link) {
			$naamtekst;
			if($zichtbaar=1) {
				$naamtekst = '<a href="/'.$naam.'"><h3>'.$naam.'</h3></a>';
			}
		      else {
		      	$naamtekst = '<h3>'.$naam.'</h3>';
		      }
			echo 
			'<div class="col-md-4 sponsor">
		      	<div class="row logo">
		      		<img src="', $foto_link, '" class="img-responsive">
		      	</div>
		      	<div class="row">', 
		      		$naamtekst, $tekst, 
		      	'</div>
		      </div>';
		}
		$conn = new mysqli('127.0.0.1', 'leesDBacc', 'gesP53aS?bUc', 'devishal');
		if ($conn->connect_error) {
			die('DB-verbinding mislukt '.$conn->connect_error);
		}
		mysqli_set_charset($conn,'utf8');
		$query = 'SELECT pagina.titel, pagina.tekst, sponsor.foto_link, pagina.zichtbaar FROM sponsor LEFT JOIN pagina ON pagina.paginaId = sponsor.paginaId ORDER BY volgorde';
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result)>0) {
			while($rec = mysqli_fetch_assoc($result)) {
				toon_sponsor($rec['titel'], $rec['tekst'], $rec['zichtbaar'], $rec['foto_link']);
			}
		}
		else {
			echo  'Helaas, geen gegevens gevonden.';
		}
		mysqli_close($conn);
	?>
    </div>
  </div>
  <!-- End content -->

  <!-- Begin footer -->
  <div class="row footer">
    <div class="container">
      <div class="col-md-4 berichten">
        <h5>Recente Berichten</h5>
        <div class="row bericht">
          <a href="#">
            <div class="col-xs-5 col-sm-5 col-md-5">
              <img src="images/zeelong.jpeg" class="img-responsive">
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7">
              <span>Tentoonstelling Zeelong</span>
              <p>01 november 2016</p>
            </div>
          </a>
        </div>
        <div class="row bericht">
          <a href="#">
            <div class="col-xs-5 col-sm-5 col-md-5">
              <img src="images/zeelong.jpeg" class="img-responsive">
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7">
              <span>Tentoonstelling Zeelong</span>
              <p>01 november 2016</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row nieuwsbrief">
          <h5>Aanmelden nieuwsbrief</h5>
          <form class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" id="nieuwsbrief" placeholder="Email Adres">
              <input type="submit" class="form-control" id="aanmelden" value="Aanmelden">
            </div>
          </form>
        </div>
        <div class="row social-media">
          <a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="col-md-4 contact">
        <h5>Contact</h5>
        <img src="images/logo_vishal.png" class="img-responsive">
        <span>
          De vishal<br>
          Grote Markt 20<br>
          2011 RD Haarlem<br>
          Tel: 023-5326856<br>
          E-mail: <a href="mailto:de.vishal@gmail.com">de.vishal@gmail.com</a>
        </div>
      </div>
      <div id="copyright">
        &copy; 2016 Copyright. De vishal
      </div>
    </div>
    <!-- End footer -->
  </body>
  </html>
