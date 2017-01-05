<?php

// NIET AAN DEZE GEGEVENS ZITTEN!!
if($_SERVER['SERVER_NAME'] == '194.171.20.107')
{
    echo '<base href="//194.171.20.107/" />';


    // Database connectie
    $conn = new mysqli('localhost', 'root', 'groep5Password', 'devishal');
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
}

// DEZE GEGEVENS MOGEN/MOETEN VERANDERD WORDEN NAAR JE EIGEN LOKALE GEGEVENS.
// DAARNA NIET UPLOADEN NAAR GITHUB AUB
elseif($_SERVER['SERVER_NAME'] == 'localhost')
{
    // De link die staat na localhost:8080/ Bij mij staat er bijv localhost:8080/deVishal/index.php, dan moet je het
    // stukje wat bij mij /deVishal/ is, hier plaatsen
    echo '<base href="/deVishal/" />';

    // Database connectie
    $conn = new mysqli('127.0.0.1', 'root', '', 'devishal');
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
}
?>