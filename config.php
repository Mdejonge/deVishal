<?php
// NIET AAN DEZE GEGEVENS ZITTEN!!
if($_SERVER['SERVER_NAME'] == '194.171.20.107')
{
    define("HOST", 'localhost');
    define("USER", 'root');
    define("PASSWORD", 'groep5Password');
    define("DATABASE", 'devishal');

    define("ROOT", '//194.171.20.107/');
}

// DEZE GEGEVENS MOGEN/MOETEN VERANDERD WORDEN NAAR JE EIGEN LOKALE GEGEVENS.
// DAARNA NIET UPLOADEN NAAR GITHUB AUB
elseif($_SERVER['SERVER_NAME'] == 'localhost')
{

    define("HOST", '127.0.0.1');
    define("USER", 'root');
    define("PASSWORD", 'usbw');
    define("DATABASE", 'devishal');

    // De link die staat na localhost:8080/ Bij mij staat er bijv localhost:8080/deVishal/index.php, dan moet je het
    // stukje wat bij mij /deVishal/ is, hier plaatsen
    define("ROOT", '/deVishal/');
}




?>