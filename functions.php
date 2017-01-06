<?php
include_once 'config.php';

function toon_lid($voornaam, $achternaam, $website) {
    return '<li><a href="', $website, '" target="_blank">', $voornaam, ' ', $achternaam, '</a></li>';
}

function toon_vrijwilliger($voornaam, $achternaam, $foto_link, $tekst) {
    $output =
        '<li>
						<a onclick="toggle_visibility('."'".$voornaam.'_'.$achternaam."'".')">'.$voornaam.' '.$achternaam.'</a>
						<span id="'.$voornaam.'_'.$achternaam.'">
							<div class="row">';
    if(!empty($foto_link)) $output .=
        '<div class="col-md-4 description">
									<img src="'.$foto_link.'" class="img-responsive">
								</div>';
    if(!empty($tekst)) $output .=
        '<div class="col-md-4 description">'.$tekst.'</div>
							</div>
						</span>
					</li>';
    echo $output;
}

function toon_sponsors($naam, $tekst, $zichtbaar, $foto_link) {
    $naamtekst = '';
    if($zichtbaar==1) {
        $naamtekst = '<a href="Sponsoren/'.$naam.'"><h3>'.$naam.'</h3></a>';
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
    $naamtekst, //$tekst,
    '</div>
		      </div>';
}

function toon_sponsor($naam, $zichtbaar, $foto_link) {
    $naamtekst = '';
    if($zichtbaar==1) {
        $naamtekst = '<a href="/'.$naam.'"><img src="'.$foto_link.'" class="img-responsive sponsor" title="'.$naam.'"></a>';
    }
    else {
        $naamtekst = '<img src="'.$foto_link.'" class="img-responsive sponsor" title="'.$naam.'">';
    }
    echo
    '<div class="col-sm-3 col-md-3">',
    $naamtekst,
    '</div>';
}

function toon_bericht($naam, $startdatum, $foto_link) {
    echo '<div class="row bericht">
		      	<a href="/'.$naam.'">
		            	<div class="col-xs-5 col-sm-5 col-md-5">
		              		<img src="/'.$foto_link.'" class="img-responsive">
		            	</div>
		            	<div class="col-xs-7 col-sm-7 col-md-7">
		              		<span>'.$naam.'</span>
		              		<p>'.$startdatum.'</p>
		            	</div>
		            </a>
		      </div>';
}

function toon_pagina($nummer) {
	global $conn;
	if ($conn->connect_error) {
		die('DB-verbinding mislukt '.$conn->connect_error);
	}
	mysqli_set_charset($conn,'utf8');
	$query = 'SELECT titel, tekst, sponsorfooter, naam FROM pagina INNER JOIN template ON pagina.templateId = template.templateId WHERE paginaId = '.$nummer;
	$result = $conn->query($query);
	$titel = '';
	$tekst = '';
	$naam = '';
	if ($result->num_rows > 0) {
		while($rec = $result->fetch_assoc()) {
			$titel = $rec['titel'];
			$tekst = $rec['tekst'];
			$naam = $rec['naam'];
			if ($rec['sponsorfooter']=1) {
				include 'sponsors_block.php';
			}
		}
	}
	else {
		echo  'Helaas, geen gegevens gevonden.';
	}
	require 'templates/'.$naam.'.php';
	geef_html($titel, $tekst);
	mysqli_close($conn);
}

?>
