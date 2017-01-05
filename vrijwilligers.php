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
            <h4>Vrijwilligersoverzicht</h4>
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
            <input type="text" id="myInput" onkeyup="filter()" placeholder="Zoeken naar vrijwilligers...">

		<ul id="filter">
			<?php

				$query = 'SELECT contact.voornaam, contact.achternaam, vrijwilliger.foto_link, vrijwilliger.tekst 
                          FROM vrijwilliger 
                          INNER JOIN contact ON contact.contactId = vrijwilliger.contactId 
                          ORDER BY contact.achternaam';
				$result = $conn->query($query);
				if ($result->num_rows > 0) {
					while($rec = $result->fetch_assoc()) {
						toon_vrijwilliger($rec['voornaam'], $rec['achternaam'], $rec['foto_link'], $rec['tekst']);
					}
				}
				else {
					echo  'Helaas, geen gegevens gevonden.';
				}
			?>
		</ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End content -->
    <script>
    function filter() {
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

    function toggle_visibility(id) {
      var e = document.getElementById(id);
      if(e.style.display == 'block')
      e.style.display = 'none';
      else
      e.style.display = 'block';
    }

    </script>

  <?php include('footer.php');
