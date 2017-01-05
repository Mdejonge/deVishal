<?php

$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');

function get_result($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0) {
        return $result;
    }

    return false;
}
?>