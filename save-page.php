<?php
include 'functions.php';
include 'dbconnect.php';

if(!isset($_POST['sponsor']))
    $sponsor = 0;
else
    $sponsor = 1;
if(!isset($_POST['zichtbaar']))
    $zichtbaar = 0;
else
    $zichtbaar = 1;

if(isset($_POST['command'])){
    $command = $_POST['command'];
}

if($command == 'edit')
{
    $stmt = $conn->prepare("UPDATE pagina 
        SET tekst = ?, 
            titel = ?,
            zichtbaar = ?,
            sponsorfooter = ?
        WHERE paginaId = ?");

    $stmt->bind_param("ssiii", $_POST['editorText'], $_POST['title'], $zichtbaar, $sponsor, $_POST['page_id']);

    if($stmt->execute() === TRUE)
    {
        echo "Opslaan gelukt!";
    }
    else
        echo "Opslaan mislukt :(... " . $stmt->error;
}
elseif($command == 'add'){

    if(!isset($_POST['homepage']))
        $homepage = 0;
    else
        $homepage = 1;
    if(isset($_POST['submenu']))
        $submenuItemId = $_POST['submenu'];
    if(isset($_POST['templateId']))
        $templateId = $_POST['templateId'];

    $stmt = $conn->prepare("INSERT INTO pagina
                            (titel, tekst, zichtbaar, sponsorfooter, submenuId, templateId)
                            VALUES(?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssiiii", $_POST['title'], $_POST['editorText'], $zichtbaar, $sponsor, $submenuItemId, $templateId);

    if($_FILES['image']){
        $target_file = 'uploads/' . basename($_FILES["image"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uploadOk = 1;
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, het bestand bestaat al.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 2097152) {
            echo "Sorry, de foto is te groot (max 2mb).";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, alleen formaten zoals JPG, JPEG, PNG & GIF zijn toegestaan.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, de foto is niet geüpload.";
            exit();
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Het bestand ". basename( $_FILES["image"]["name"]). " is geüploaded.";
            } else {
                echo "Sorry, er heeft zich een fout voorgedaan.";
                exit();
            }
        }
    }

    if($stmt->execute() === TRUE)
    {
        $echo = "Informatie opgeslagen in de Pagina database.";

        if($_POST['page'] == 'tentoonstelling'){
            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate = date('Y-m-d', strtotime($_POST['endDate']));
            $locationId = $_POST['locatie'];

            $page_id = $stmt->insert_id;
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO tentoonstelling
                                (datum_start, datum_eind, homepage, locatieId, korte_inleiding, paginaId)
                                VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiisi", $startDate, $endDate, $zichtbaar, $locationId, $_POST['korte_inleiding'], $page_id);

            if($stmt->execute() === TRUE)
            {
                $echo .= "\nInformatie opgeslagen in Tentoonstelling database";
            }
            else
                $echo .= "Opslaan mislukt van tweede" . $stmt->error;
        }
        elseif($_POST['page'] == 'sponsor'){
            $page_id = $stmt->insert_id;
            $stmt->close();

            $row = mysqli_query($conn, 'SELECT volgorde, sponsorId FROM sponsor ORDER BY volgorde DESC LIMIT 1');
            $result = mysqli_fetch_array($row);
            $volgorde = $result['volgorde'] +1;

            $stmt = $conn->prepare("INSERT INTO sponsor
                                (foto_link, volgorde, paginaId)
                                VALUES(?, ?, ?)");
            $stmt->bind_param("sii", $target_file, $volgorde, $page_id);

            if($stmt->execute() === TRUE)
            {
                $echo .= "\nInformatie opgeslagen in Sponsor database";
            }
            else
                $echo .= "Opslaan mislukt van sponsor database" . $stmt->error;
        }

        echo $echo;
    }
    else
        echo "Opslaan mislukt :(... " . $stmt->error;
}
elseif($command == 'add_leden') {
    $echo = '';

    foreach ($_POST['name'] as $key => $name) {
        $stmt = $conn->prepare("INSERT INTO contact
                                (voornaam, achternaam)
                                VALUES(?, ?)");

        $parts = explode(' ', $name);
        $voornaam = array_shift($parts);
        $achternaam = implode(' ', $parts);

        $stmt->bind_param("ss", $voornaam, $achternaam);

        if ($stmt->execute() === TRUE) {
            $echo .= "Informatie opgeslagen in de contact database.";
            $contactId = $stmt->insert_id;
            $stmt->close();


        }

        $stmt = $conn->prepare("INSERT INTO lid
                                (website, contactId)
                                VALUES(?, ?)");
        $stmt->bind_param("si", $_POST['webpage'][$key], $contactId);

        if ($stmt->execute() === TRUE) {
            $echo .= "\nInformatie opgeslagen in de leden database";
        } else
            $echo .= "Opslaan mislukt van tweede" . $stmt->error;
    }
    echo $echo;
}
else
{
    echo "Opslaan mislukt :(... " . $stmt->error;
}

?>