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
            
				$query = 'SELECT contact.voornaam, contact.achternaam, lid.website 
                          FROM lid INNER JOIN contact ON contact.contactId = lid.contactId
                          ORDER BY contact.achternaam';
				$result = $conn->query($query);
				if ($result->num_rows > 0) {
					while($rec = $result->fetch_assoc()) {
						toon_lid($rec['voornaam'], $rec['achternaam'], $rec['website']);
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
    <div class="push"></div>
  </div>
  <!-- End content -->

  <!-- Begin footer -->

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

<?php include('footer.php'); ?>
