<?php
function geef_html($titel, $tekst, $paginaId=false) {
    echo ' 
    <!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>
              '.$titel.'
          </h4>';

            if(isset($_SESSION['gebruikersnaam'])&&isset($_SESSION['id'])){
                echo '<a href="Edit/'.$paginaId.'">Edit pagina</a>';
            }

        echo '
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->
 <!-- Begin content -->
    <div class="row content contactrow">
    <div class="container">
        <div>'.$tekst.'</div>
  </div>
  <!-- End content -->';

    echo '
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
<!-- End contactform -->';
?>
    
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

<?php
}
?>