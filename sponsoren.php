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
	?>
    </div>
  </div>
  <!-- End content -->

  <?php
  require 'footer.php';
  ?>
