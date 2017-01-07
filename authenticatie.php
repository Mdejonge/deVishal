<?php

function inloggen($username, $wachtwoord, $conn)
{
    global $conn;
    if($stmt = $conn->prepare("SELECT id, gebruikersnaam, wachtwoord
            FROM users
            WHERE gebruikersnaam = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();


        if (mysqli_num_rows($result)>0) {
            while($rec = $result->fetch_assoc()) {
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
    }

    return false;
}

function uitloggen()
{
    unset($_SESSION['gebruikersnaam']);
    unset($_SESSION['id']);
}

?>