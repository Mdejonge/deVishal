<?php

$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
?>