<?php
include('functions.php');
include('dbconnect.php');

if(isset($_POST['email']))
{
    $email = $_POST['email'];
//    $check = mysqli_query($conn, "SELECT mailadres FROM klant WHERE mailadres=?");

    $check = "SELECT mailadres FROM klant WHERE mailadres='".$email."'";
    $ins = "INSERT INTO klant (mailadres) VALUES ('".$email."')";
    $checkresult = $conn->query($check);
    $insresult = $conn->query($ins);

    if($checkresult->num_rows > 0)
    {
        echo "U bent al ingeschreven voor de nieuwsbrief!";
    }
    else
    {
        if($insresult === true)
        {
            echo "U bent succesvol aangemeld voor de nieuwsbrief met email: ", $email;
        }
        else
        {
            echo "Error: " . $ins . "<br>" . $conn->error;
        }
    }
}

?>