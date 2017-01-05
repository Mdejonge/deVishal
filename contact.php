<!-- Begin navbar -->
<?php
require 'header.php';
include 'config.php';

$content = '';
$titel = '';
$footer = '';

$query = 'SELECT titel, tekst, sponsorfooter
          FROM pagina';
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)>0) {
    while($rec = mysqli_fetch_assoc($result)) {
        $titel = $rec['titel'];
        $content = $rec['tekst'];
        $footer = $rec['sponsorfooter'];
    }
}
else {
    echo  'Helaas, geen gegevens gevonden.';
}

?>
<!-- End navbar -->

<!-- Begin toppage -->
<div class="row toppage">
</div>
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-content">
                <h4><?=$titel?></h4>
            </div>
        </div>
    </div>
</div>
<!-- End toppage -->

<!-- Begin content -->
<?=$content?>

<!-- Begin contactform -->
<form>
    <div class="row contactrow">
        <div class="container">
            <div class="col-md-6">
                <a class="contactlink">Een vraag of opmerking laten weten</a>
                <div class="formcontact">
                    <div class="form-group">
                        <label for="name">Naam:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail adres:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefoonnummer:</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" id="tel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="formcontact">
                    <br>
                    <div class="form-group">
                        <label for="opmerking">Vraag en / of opmerking:</label>
                        <textarea class="form-control" rows="9" id="opmerking"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-2 btn">
                <div class="formcontact">
                    <input type="submit" class="btn btn-info" id="verstuur" value="Verzenden">
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div id="map"></div>
</div>
<!-- End contactform -->

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
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor first">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
    </div>
</div>
<!-- End sponsors -->

<!-- Begin footer -->
<div class="row footer">
    <div class="container">
        <div class="col-md-4 berichten">
            <h5>Recente Berichten</h5>
            <div class="row bericht">
                <a href="#">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <img src="images/zeelong.jpeg" class="img-responsive">
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <span>Tentoonstelling Zeelong</span>
                        <p>01 november 2016</p>
                    </div>
                </a>
            </div>
            <div class="row bericht">
                <a href="#">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <img src="images/zeelong.jpeg" class="img-responsive">
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <span>Tentoonstelling Zeelong</span>
                        <p>01 november 2016</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 nieuwsbrieven">
            <h5>Aanmelden nieuwsbrief</h5>
            <div class="row nieuwsbrief">
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nieuwsbrief" placeholder="Email Adres">
                        <input type="submit" class="form-control" id="aanmelden" value="Aanmelden">
                    </div>
                </form>
            </div>
            <div class="row social-media">
                <a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-md-4 contact">
            <h5>Contact</h5>
            <img src="images/logo_vishal.png" class="img-responsive">
        <span>
          De vishal<br>
          Grote Markt 20<br>
          2011 RD Haarlem<br>
          Tel: 023-5326856<br>
          E-mail: <a href="mailto:de.vishal@gmail.com">de.vishal@gmail.com</a>
        </span>
        </div>
    </div>
    <div id="copyright">
        &copy; 2016 Copyright. De vishal
    </div>
</div>
<!-- End footer -->

<script>
    $(document).ready(function() {
        initMap();
        $('.formcontact').hide();
        $('.contactlink').click(function() {
            $('.formcontact').stop().slideToggle("500ms");
        });
    });

    function initMap() {
        var myLatLng = {lat: 52.3812555, lng: 4.6371055};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }
</script>
</body>
</html>
