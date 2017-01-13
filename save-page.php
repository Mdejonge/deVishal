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

    $stmt->bind_param("ssiii", $_POST['editor1'], $_POST['title'], $zichtbaar, $sponsor, $_POST['page_id']);

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

    $stmt->bind_param("ssiiii", $_POST['title'], $_POST['editor1'], $zichtbaar, $sponsor, $submenuItemId, $templateId);

    if($stmt->execute() === TRUE)
    {
        echo "Opslaan gelukt!";
    }
    else
        echo "Opslaan mislukt :(... " . $stmt->error;
}

?>