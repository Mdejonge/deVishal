<?php
include_once 'config.php';


function toon_lid($voornaam, $achternaam, $website) {
    echo '<li><a href="', $website, '">', $voornaam, ' ', $achternaam, '</a></li>';
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
    if($zichtbaar=1) {
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
    $naamtekst;
    if($zichtbaar=1) {
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

?>