<?php

$query = 'SELECT tentoonstelling.datum_start, tentoonstelling.datum_eind, tentoonstelling.korte_inleiding, pagina.titel, locatie.naam FROM tentoonstelling, pagina, locatie WHERE tentoonstelling.paginaId = pagina.paginaId AND pagina.zichtbaar AND tentoonstelling.locatieId = locatie.locatieId AND datum_eind >= CURDATE()';
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)>0)
{
echo '<div class="container">';
    while($rec = mysqli_fetch_assoc($result))
    {
    toon_tentoonstelling_agenda($rec['datum_start'], $rec['datum_eind'], $rec['korte_inleiding'], $rec['titel'], $rec['naam']);
    }
    echo '</div></div>';
}



function toon_tentoonstelling_agenda($datum_start, $datum_eind, $korte_inleiding, $titel, $naam_locatie)
{

echo '<div class="row"><p><h3>'.$datum_start.' - '.$datum_eind.'<b> '.$titel.'</b> - '.$naam_locatie.'</h3>'.$korte_inleiding. '</div>';
}
?>