<?php
require 'config.php';
require 'dbconnect.php';

if(isset($_POST['command']))
{
    if($_POST['command'] == 'get_submenuItems'){
        get_all_free_submenuItems($_POST['menuId']);
    }
}

/*
 * Het netjes tonen van een lid
 */
function toon_lid($voornaam, $achternaam, $website) {
    return '<li><a href="'.$website.'" target="_blank">'.$voornaam.' '.$achternaam.'</a></li>';
}

/*
 * Het netjes tonen van vrijwilligers
 */
function toon_vrijwilliger($voornaam, $achternaam, $foto_link, $tekst) {
    $output =
        '<li>
						<a onclick="toggle_visibility('."'".$voornaam.'_'.$achternaam."'".')">'.$voornaam.' '.$achternaam.'</a>
						<span id="'.$voornaam.'_'.$achternaam.'">
							<div class="row">';
    if(!empty($foto_link)) $output .=
        '<div class="col-md-1 description">
									<img src="'.$foto_link.'" class="img-responsive">
								</div>';
    if(!empty($tekst)) $output .=
        '<div class="col-md-11 description">'.$tekst.'</div>
							</div>
						</span>
					</li>';
    echo $output; ?>
<?php
    
    
}

/*
 * Het netjes tonen van sponsoren op de algemene sponsorenpagina
 */
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

/*
 * Het netjes tonen van sponsoren in de footer
 */
function toon_sponsor($naam, $zichtbaar, $foto_link) {
    $naamtekst = '';
    if($zichtbaar==1) {
        $naamtekst = '<a href="Sponsoren/'.$naam.'"><span class="span2"><img src="'.$foto_link.'" class="img-responsive sponsor" title="'.$naam.'"></span></a>';
    }
    else {
        $naamtekst = '<span class="span2"><img src="'.$foto_link.'" class="img-responsive sponsor" title="'.$naam.'"></span>';
    }
    echo
    '<div class="col-sm-3 col-md-3">',
    $naamtekst,
    '</div>';
}

/*
 * Het netjes tonen van de berichten (Tentoonstellingen) in de footer
 */
function toon_bericht($naam, $startdatum, $foto_link) {
    echo '<div class="row bericht">
		      	<a href="Tentoonstelling/'.$naam.'">
		            	<div class="col-xs-5 col-sm-5 col-md-5">
		              		<img src="'.$foto_link.'" class="img-responsive">
		            	</div>
		            	<div class="col-xs-7 col-sm-7 col-md-7">
		              		<span>'.$naam.'</span>
		              		<p>'.$startdatum.'</p>
		            	</div>
		            </a>
		      </div>';
}

/*
 * Het tonen van een pagina vanuit de database óf als preview
 * @var $tekst is optioneel: alleen bij de preview wordt het gebruikt
 * @var $sponsorfooter is optioneel: alleen bij de preview wordt het gebruikt
 * @var $titel is optioneel: alleen bij de preview wordt het gebruikt
 */
function toon_pagina($nummer, $tekst = '', $sponsorfooter = NULL, $titel = '') {
	global $conn;
	if ($conn->connect_error) {
		die('DB-verbinding mislukt '.$conn->connect_error);
	}
	mysqli_set_charset($conn,'utf8');
	$query = 'SELECT titel, tekst, sponsorfooter, naam, paginaId FROM pagina INNER JOIN template ON pagina.templateId = template.templateId WHERE paginaId = '.$nummer;
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
			    geef_html($rec['titel'], $rec['tekst'], $rec['paginaId']);
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

/*
 * Functie om te checken of je nog ingelogd bent. Zoja, dan wordt er 20 minuten vanaf het moment
 * van checken bijgerekend
 */
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

/*
 * Functie om uit te loggen
 */
function uitloggen()
{
    unset($_SESSION['gebruikersnaam']);
    unset($_SESSION['id']);
    unset($_SESSION['discard_after']);
    session_destroy();
}

/*
 * Functie om alle menuItems uit de database te verkrijgen
 */
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

/*
 * Functie om alle niet-gebruikte menuItems uit de database te verkrijgen
 */
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
        echo '<option>Geen resultaten gevonden. Kies een ander menu-item of zet op niet zichtbaar.</option>';
    }
    mysqli_close($conn);
}

/*
 * Functie om alle tentoonstellingsplaatsen uit de database te verkrijgen
 */
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

/*
 * Functie om alle leden uit de DB te verkrijgen
 */
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

/*
 * Functie om alle vrijwilligers uit de DB te verkrijgen
 */
function get_vrijwilligers()
{
    global $conn;
    $text = '';
    $query = "SELECT contact.voornaam, contact.achternaam, vrijwilliger.foto_link, vrijwilliger.tekst 
                          FROM vrijwilliger 
                          INNER JOIN contact ON contact.contactId = vrijwilliger.contactId 
                          ORDER BY contact.achternaam";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($rec = $result->fetch_assoc()) {
            toon_vrijwilliger($rec["voornaam"], $rec["achternaam"], $rec["foto_link"], $rec["tekst"]);
        }
    }
    else {
        echo  "Helaas, geen gegevens gevonden." ;
    }
    mysqli_close($conn);
}

/*
 * Functie om te controleren of je op een mobiel/tablet zit of op een desktop
 */
function isMobile() {
    return preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackbe‌​rry|iemobile|bolt|bo‌​ost|cricket|docomo|f‌​one|hiptop|mini|oper‌​a mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|‌​webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

/*
 * Functie om een pageId te verkrijgen m.b.v. een pagina naam
 * $searc_page is optioneel: Wordt alleen gebruikt wanneer je zoekt op Titel in de tabel Pagina i.p.v. op submenuItemNaam
 */
function get_page_id($page_name, $search_page=false)
{
    global $conn;

    if ($search_page) {
        $stmt = $conn->prepare('SELECT paginaId
                            FROM pagina 
                            WHERE titel = ?');

        $stmt->bind_param("s", $page_name);

        if ($stmt->execute() === TRUE) {
            $stmt->bind_result($paginaId);
            $row = $stmt->fetch();
            if ($paginaId == NULL)
                return false;
            else
                return $paginaId;
        }

        return false;
    } else {
        $stmt = $conn->prepare('SELECT pagina.paginaId
                                FROM submenuItem 
                                INNER JOIN pagina 
                                ON submenuItem.submenuId = pagina.submenuId
                                WHERE naam = ?');

        $stmt->bind_param("s", $page_name);

        if ($stmt->execute() === TRUE) {
            $stmt->bind_result($paginaId);
            $row = $stmt->fetch();
            if ($paginaId == NULL)
                return false;
            else
                return $paginaId;
        }

        return false;
    }
}
?>
