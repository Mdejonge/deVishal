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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="http://malsup.github.com/jquery.cycle2.js"></script>
        <script src="http://malsup.github.com/jquery.cycle2.carousel.js"></script>

        <div class="slidecontainer">
            <div class="row cycle-slideshow" data-cycle-fx=carousel data-cycle-timeout=4800 data-cycle-speed="400" data-cycle-carousel-visible=4 data-cycle-carousel-fluid=true data-cycle-slides="div">

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

<!--                <div class='span2'><img class="img-responsive" src="/devishal/uploads/logo-autorent.png" ></div>-->
<!--                <div class='span2'><img class="img-responsive" src="/devishal/uploads/logo-autorent.png" ></div>-->
<!--                <div class='span2'><img class="img-responsive" src="/devishal/uploads/logo-autorent.png" ></div>-->
<!--                <div class='span2'><img class="img-responsive" src="/devishal/uploads/logo-autorent.png" ></div>-->
<!--                <div class='span2'><img class="img-responsive" src="/devishal/uploads/logo-rabobank.png" ></div>-->
            </div>
        </div>

    </div>
</div>
<!-- End sponsors -->