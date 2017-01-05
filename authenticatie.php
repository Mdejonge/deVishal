<?php

function inloggen($username, $wachtwoord, $conn)
{
    $sql = "SELECT id, gebruikersnaam, wachtwoord
            FROM users
            WHERE gebruikersnaam = '$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)>0) {
        while($rec = mysqli_fetch_assoc($result)) {
            if($rec['gebruikersnaam'] === $username && $rec['wachtwoord'] === $wachtwoord)
            {
                $_SESSION['gebruikersnaam'] = $rec['gebruikersnaam'];
                $_SESSION['id'] = $rec['id'];
                return $rec['gebruikersnaam'];
            }
            else
                return false;
        }
    }

    return false;
}

function uitloggen()
{
    unset($_SESSION['gebruikersnaam']);
    unset($_SESSION['id']);
}

?>