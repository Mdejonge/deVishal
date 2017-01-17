<?php
session_start();
include_once 'functions.php';
include_once 'dbconnect.php';

if(!empty($_POST['location']))
    $location = $_POST['location'];
else
    $location = '';

inloggen($_POST['name'], $_POST['password'], $location);
function inloggen($username, $wachtwoord, $location = false)
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
                    if(!empty($location)){
                        ?>
                        <script type="text/javascript">
                            window.location.href = '<?=$_POST['location']?>';
                        </script>
                        <?php
                        echo 'U wordt doorgestuurd naar de pagina waar u was. Even geduld.
                                U kunt ook <a href="'.$location.'">hier klikken!</a> ';
                        exit();
                    }
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