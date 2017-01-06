<?php 
	function geef_html($titel, $tekst) {
		$text2 = '';
		$text1 = '
    <!-- Begin toppage -->
    <div class="row toppage">
    </div>
    <div class="row kopjerow">
      <div class="container">
        <div class="col-md-12">
          <div class="kopje-content">
            <h4>'.$titel.'</h4>
          </div>
          <p>'.$tekst.'</p>
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

            <ul id="filter">';
		$query = 'SELECT contact.voornaam, contact.achternaam, lid.website 
              FROM lid INNER JOIN contact ON contact.contactId = lid.contactId
              ORDER BY contact.achternaam';
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
			while($rec = $result->fetch_assoc()) {
				$text2 = toon_lid($rec['voornaam'], $rec['achternaam'], $rec['website']);
			}
		}
		else {
			echo  'Helaas, geen gegevens gevonden.';
		}
		
		$text3 = '
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End content -->

  <!-- Begin footer -->

    <script>
    function ledenFilter() {
      // Declare variables
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      ul = document.getElementById("filter");
      li = ul.getElementsByTagName("li");
      // Loop through all list items, and hide those who dont match the search query
      for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
        } else {
          li[i].style.display = "none";
        }
      }
    }
    </script>';
    echo $text1.$text2.$text3;
	}
?>
