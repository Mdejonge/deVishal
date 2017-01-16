<!-- Begin footer -->
  <div class="row footer">
    <div class="container">
      <div class="col-md-4 berichten">
        <h5>Recente Berichten</h5>
        	<?php
            require 'dbconnect.php';

            $query = 'SELECT pagina.titel, tentoonstelling.datum_start, tentoonstelling.foto_link 
                      FROM tentoonstelling, pagina 
                      WHERE tentoonstelling.paginaId = pagina.paginaId 
                      AND pagina.zichtbaar 
                      ORDER BY tentoonstelling.datum_start 
                      DESC LIMIT 2';
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
			while($rec = $result->fetch_assoc()) {
				toon_bericht($rec['titel'], $rec['datum_start'], $rec['foto_link']);
			}
		}
		else {
			echo  'Helaas, geen gegevens gevonden.';
		}
		mysqli_close($conn);
		?>
      </div>
      <div class="col-md-4">
        <div class="row nieuwsbrief">
          <h5>Aanmelden nieuwsbrief</h5>
          <form class="form-inline" id="newsletter" name="newsletter">
            <div class="form-group">
              <input type="email" class="form-control" id="nieuwsbrief" placeholder="Email Adres" name="email">
              <input type="submit" class="form-control" id="aanmelden" value="Aanmelden" name="newsletter">
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

<script>
    $('#newsletter').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: 'registerNewsletter.php',
            data: $('form').serialize() + "&command=add",
            success: function (data) {
                alert(data);
            }
        });
    });

</script>
</body>
</html>

<!-- End footer -->