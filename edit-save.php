<?php
include 'functions.php';
include 'dbconnect.php';
// zichtbaar, sponsorfooter, titel nog toevoegen om te veranderen!
$sql = "UPDATE pagina SET tekst = '".$_POST['editor1']."' WHERE paginaId =".$_POST['page_id'];
if($conn->query($sql) === TRUE)
{
    echo "Opslaan gelukt!";
}
else
    echo "Opslaan mislukt :(... " . $conn->error;

?>