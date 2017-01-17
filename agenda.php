<?php
	include 'header.php';
	$query = 'SELECT tentoonstelling.datum_start, tentoonstelling.datum_eind, tentoonstelling.korte_inleiding, pagina.titel, locatie.naam FROM tentoonstelling, pagina, locatie WHERE tentoonstelling.paginaId = pagina.paginaId AND pagina.zichtbaar AND tentoonstelling.locatieId = locatie.locatieId AND datum_eind >= CURDATE()';
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result)>0) {
		echo '<!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>
              Agenda
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->
 <!-- Begin content -->
    <div class="row content">
    <div class="container">';
		while($rec = mysqli_fetch_assoc($result)) {
			toon_tentoonstelling_agenda($rec['datum_start'], $rec['datum_eind'], $rec['korte_inleiding'], $rec['titel'], $rec['naam']);
		}
		echo '</div></div>';
	}
	function toon_tentoonstelling_agenda($datum_start, $datum_eind, $korte_inleiding, $titel, $naam_locatie) {
		$oldLocale = setlocale(LC_TIME, 'nl_NL');
		$format = "%e %B '%y";
		echo '<h3>'.strftime($format, strtotime($datum_start)).' - '.strftime($format, strtotime($datum_eind)).'<b> '.$titel.'</b> - '.$naam_locatie.'</h3><div><p>'.$korte_inleiding. '</p></div>';
		setlocale(LC_TIME, $oldLocale);
	}
	include 'footer.php'
?>
