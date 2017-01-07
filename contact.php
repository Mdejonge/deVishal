<!-- Begin navbar -->
<?php
require 'header.php';

?>
<meta property="og:url"           content=<?=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?> />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Contactpagina van De Vishal in Haarlem!" />
<meta property="og:description"   content="Dit is mijn beschrijving" />
<meta property="og:image"         content="" />
<?php

    $query = 'SELECT titel, tekst, sponsorfooter, paginaId
              FROM pagina
              WHERE paginaId = 5';
    $result = $conn->query($query);
    if($result->num_rows > 0){
        while($rec = $result->fetch_assoc()) { 
            $titel = $rec['titel'];
            $content = $rec['tekst'];
            $footer = $rec['sponsorfooter'];
            $paginaId = $rec['paginaId'];
        }
    }
    else{
        $titel = '';
        $content = '';
        $footer = '';
        $paginaId = '';
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
                <?php
                if(isset($_SESSION['gebruikersnaam']) && isset($_SESSION['id'])){
                    echo '<a href="edit.php?page_id='.$paginaId.'">Edit pagina</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- End toppage -->

<!-- Begin content -->
<div class="row content contactrow">
    <div class="container">
        <?=$content?>

            <!-- Load Facebook SDK for JavaScript -->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

            <!-- Your share button code -->
            <div class="fb-share-button"
                 data-href="<?=$_SERVER['REQUEST_URI'];?>"
                 data-layout="button_count"
                 data-size="large">
            </div>
    </div>
</div>

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

<?php include('sponsors_block.php'); ?>

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

<?php include('footer.php'); ?>
