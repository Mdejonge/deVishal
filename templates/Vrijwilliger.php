<?php
function geef_html($titel, $tekst)
{?>
    <!-- Begin toppage -->
    <div class="row toppage">
    </div>
    <div class="row kopjerow">
      <div class="container">
        <div class="col-md-12">
          <div class="kopje-content">
            <h4><?php echo $titel ?></h4>
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
		    <?php echo get_vrijwilligers(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
<!-- End content --><?php

}

?>