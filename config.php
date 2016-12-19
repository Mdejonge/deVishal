<?php

if($_SERVER['SERVER_NAME'] == '194.171.20.107')
{
    // Database connectie
    $conn = new mysqli('localhost', 'root', 'groep5Password', 'devishal');
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
}

elseif($_SERVER['SERVER_NAME'] == 'localhost')
{
    // Database connectie
    $conn = new mysqli('127.0.0.1', 'root', 'usbw', 'devishal');
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
}




?>