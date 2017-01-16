<?php
require 'config.php';
require 'dbconnect.php';

if(isset($_POST['command']))
{
    if($_POST['command'] == 'get_submenuItems'){
        get_all_free_submenuItems($_POST['menuId']);
    }
}

function toon_lid($voornaam, $achternaam, $website) {
    return '<li><a href="'.$website.'" target="_blank">'.$voornaam.' '.$achternaam.'</a></li>';
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
        $naamtekst = '<a href="/'.$naam.'"><span class="span2"><img src="'.$foto_link.'" class="img-responsive sponsor" title="'.$naam.'"></span></a>';
    }
    else {
        $naamtekst = '<span class="span2"><img src="'.$foto_link.'" class="img-responsive sponsor" title="'.$naam.'"></span>';
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

function toon_pagina($nummer, $tekst = '', $sponsorfooter = NULL, $titel = '') {
	global $conn;
	if ($conn->connect_error) {
		die('DB-verbinding mislukt '.$conn->connect_error);
	}
	mysqli_set_charset($conn,'utf8');
	$query = 'SELECT titel, tekst, sponsorfooter, naam FROM pagina INNER JOIN template ON pagina.templateId = template.templateId WHERE paginaId = '.$nummer;
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		while($rec = $result->fetch_assoc()) {
			if(file_exists('templates/'.$rec['naam'].'.php')) {
				require 'templates/'.$rec['naam'].'.php';
			}
			else {
				require 'templates/Error.php';
				//verander titel en tekst naar error iets
			}

            if(empty($tekst))
			    geef_html($rec['titel'], $rec['tekst']);
            else
                geef_html($titel, $tekst);

            if(!isset($sponsorfooter))
            {
                if ($rec['sponsorfooter'] == 1)
                    include 'sponsors_block.php';
            }
            else{
                if($sponsorfooter == 1)
                    include 'sponsors_block.php';
            }
		}
	}
	else {
		echo  'Helaas, geen gegevens gevonden.';
	}
	mysqli_close($conn);
}

function logged_in() {
    if(isset($_SESSION['gebruikersnaam']) && isset($_SESSION['id'])) {
        if(time() > $_SESSION['discard_after']){
            uitloggen();
            return false;
        }
        else{
            // Nieuwe eindtijd sessie, 60 minuten
            $_SESSION['discard_after'] = time() + 1200;
            return true;
        }
    }
    else
        return false;
}

function uitloggen()
{
    unset($_SESSION['gebruikersnaam']);
    unset($_SESSION['id']);
    unset($_SESSION['discard_after']);
    session_destroy();
}

function get_all_menuItems() {
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);

    $query = 'SELECT naam, menuId 
                  FROM menuItem 
                  ORDER BY menuItem.volgorde';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $return = '<select id="menu" name="menu"><option></option>';
        while($rec = $result->fetch_assoc()) {
            $return .= '<option value="'.$rec['menuId'].'">'.$rec['naam'].'</option>';
        }
        $return .= '</select>';
        echo $return;
    }
    else {
        echo  'Helaas, geen gegevens gevonden.';
    }
    mysqli_close($conn);
}

function get_all_free_submenuItems($menuId) {
    global $conn;
    require 'dbconnect.php';

    $query = 'SELECT naam, s.submenuId 
                  FROM submenuItem s
                    LEFT JOIN pagina p ON s.submenuId = p.submenuId
                    WHERE p.submenuId IS NULL
                    AND menuId = '.$menuId.'
                  ORDER BY volgorde';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $return = '<select name="submenu">';
        while($rec = $result->fetch_assoc()) {
            $return .= '<option value="'.$rec['submenuId'].'">'.$rec['naam'].'</option>';
        }
        $return .= '</select>';
        echo $return;
    }
    else {
        echo 'Helaas, geen gegevens gevonden.';
    }
    mysqli_close($conn);
}

function get_all_tentoonstellingPlaces() {
    global $conn;
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
    $query = 'SELECT naam, locatieId 
                  FROM locatie';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $return = '<select id="locatie" name="locatie"><option></option>';
        while($rec = $result->fetch_assoc()) {
            $return .= '<option value="'.$rec['locatieId'].'">'.$rec['naam'].'</option>';
        }
        $return .= '</select>';
        echo $return;
    }
    else {
        echo  'Helaas, geen gegevens gevonden.';
    }
    mysqli_close($conn);
}

function get_all_leden() {
    global $conn;
    $text = '';
    $query = 'SELECT contact.voornaam, contact.achternaam, lid.website 
              FROM lid INNER JOIN contact ON contact.contactId = lid.contactId
              ORDER BY contact.achternaam';
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($rec = $result->fetch_assoc()) {
            $text .= toon_lid($rec['voornaam'], $rec['achternaam'], $rec['website']);
        }
        return $text;
    }
    else {
        return  'Helaas, geen gegevens gevonden.';
    }
}
?>
