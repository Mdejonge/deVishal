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

?>