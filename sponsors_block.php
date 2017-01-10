<?php
include('dbconnect.php');

?>
<!-- Begin sponsors -->

<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-sponsors">
                <h4>Sponsors</h4>
            </div>
        </div>
    </div>
</div>
<div class="row sponsors">
    <div class='row'>
        <?php

        $query = 'SELECT pagina.titel, sponsor.foto_link, pagina.zichtbaar 
                    FROM sponsor 
                    LEFT JOIN pagina ON pagina.paginaId = sponsor.paginaId 
                    ORDER BY volgorde';

        $result = $conn->query($query);

        if($result->num_rows > 0){
            while($rec = $result->fetch_assoc()) {
                toon_sponsor($rec['titel'], $rec['zichtbaar'], $rec['foto_link']);
            }
        }
        else{
            echo  'Helaas, geen gegevens gevonden.';
        }

        ?>
    </div>
</div>
<!-- End sponsors -->