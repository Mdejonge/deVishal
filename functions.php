<?php
include_once 'config.php';



function toon_lid($voornaam, $achternaam, $website) {
    echo '<li><a href="', $website, '" target="_blank">', $voornaam, ' ', $achternaam, '</a></li>';
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
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
    $query = 'SELECT titel, tekst, sponsorfooter, templateId FROM pagina WHERE paginaId = '.$nummer;
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($rec = $result->fetch_assoc()) {
            geef_html($rec['templateId'], $rec['titel'], $rec['tekst']);
            if ($rec['sponsorfooter']=1) {
                include 'sponsors_block.php';
            }
        }
    }
    else {
        echo  'Helaas, geen gegevens gevonden.';
    }
    mysqli_close($conn);
}

function geef_html($templateId, $titel, $tekst) {
    $html = '';
    switch ($templateId) {
        case 1:
            $html = 'template1';
            break;
        case 2:
            $html = '<h1>'.$titel.'</h1></br><div>'.$tekst.'</div>';
            break;
        case 3:
            $html = 'template3';
            break;
        case 4:
            $html = template_4($titel, $tekst);
            break;
        case 5:
            $html = 'template5';
            break;
        default:
            $html = '<h1>'.$titel.'</h1></br><div>'.$tekst.'</div>';
    }
    echo $html;
}

function template_4($titel, $tekst) {
    echo ' 
    <!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>
              '.$titel.'
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->
 <!-- Begin content -->
    <div class="row content">
    <div class="container">

        <h3>'.$titel.'</h3>
        <div>'.$tekst.'</div>
      </div>
  </div>
  <!-- End content -->';
}

?>