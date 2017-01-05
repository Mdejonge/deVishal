  <!-- Begin navbar -->
  <?php
    require 'header.php';
  ?>
  <!-- End navbar -->

  <!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>Sponsors</h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->

  <!-- Begin content -->
  <div class="row sponsorpage">
    <div class="container">
      <?php

		$query = 'SELECT pagina.titel, pagina.tekst, sponsor.foto_link, pagina.zichtbaar 
                  FROM sponsor 
                  LEFT JOIN pagina ON pagina.paginaId = sponsor.paginaId 
                  ORDER BY volgorde';
		$result = $conn->query($query);
		if ($result->num_rows > 0 ) {
			while($rec = $result->fetch_assoc()) {
				toon_sponsors($rec['titel'], $rec['tekst'], $rec['zichtbaar'], $rec['foto_link']);
			}
		}
		else {
			echo  'Helaas, geen gegevens gevonden.';
		}
		mysqli_close($conn);
	?>
    </div>
  </div>
  <!-- End content -->

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
      <div class="col-md-4">
        <div class="row nieuwsbrief">
          <h5>Aanmelden nieuwsbrief</h5>
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
        </div>
      </div>
      <div id="copyright">
        &copy; 2016 Copyright. De vishal
      </div>
    </div>
    <!-- End footer -->
  </body>
  </html>
