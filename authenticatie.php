<?php
session_start();
include_once 'functions.php';
include_once 'dbconnect.php';

/*if(isset($_POST['command']) == 'inloggen')
    echo inloggen($_POST['name'], $_POST['password']);
else
    echo 'Zonder geldige command mag je hier niet komen.';
*/

inloggen($_POST['name'], $_POST['password']);
function inloggen($username, $wachtwoord)
{
    global $conn;
    if($stmt = $conn->prepare("SELECT id, gebruikersnaam, wachtwoord
            FROM `user`
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
                    // Sessie beïndigen na 20 min inactiviteit
                    $_SESSION['discard_after'] = time() + 1200;
                    echo 'Welcome user' .
                        '<ul>
                            <li><a href="add-page.php">Pagina toevoegen</a></li>
                        </ul>';
                }
                else
                    echo '<div class="error">U heeft geen juiste gebruikersnaam en/of wachtwoord ingevoerd, probeer het opnieuw.</div>';
            }
        }
        else
            echo '<div class="error">Deze gebruikersnaam is niet bekend bij ons. Probeer het opnieuw.</div>';
    }
    else
        echo '<div class="error">Er is iets foutgegaan tijdens het klaarmaken van de statement... '.mysqli_stmt_error($stmt).'</div>';
}

?>