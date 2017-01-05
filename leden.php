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
            <h4>Ledenoverzicht</h4>
          </div>
        </div>
      </div>
    </div>
    <!-- End toppage -->

    <!-- Begin content -->
    <div class="row content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 block">
            <input type="text" id="myInput" onkeyup="ledenFilter()" placeholder="Zoeken naar leden...">

            <ul id="filter">
			<?php
            
				$query = 'SELECT contact.voornaam, contact.achternaam, lid.website FROM lid INNER JOIN contact ON contact.contactId = lid.contactId ORDER BY contact.achternaam';
				$result = mysqli_query($conn, $query);
				if (mysqli_num_rows($result)>0) {
					while($rec = mysqli_fetch_assoc($result)) {
						toon_lid($rec['voornaam'], $rec['achternaam'], $rec['website']);
					}
				}
				else {
					echo  'Helaas, geen gegevens gevonden.';
				}
				mysqli_close($conn);
			?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="push"></div>
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

    <script>
    function ledenFilter() {
      // Declare variables
      var input, filter, ul, li, a, i;
      input = document.getElementById('myInput');
      filter = input.value.toUpperCase();
      ul = document.getElementById("filter");
      li = ul.getElementsByTagName('li');

      // Loop through all list items, and hide those who don't match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
    </script>
  </body>
  </html>
