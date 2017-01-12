<?php 
	function geef_html($titel, $tekst) {
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
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->
 <!-- Begin content -->
    <div class="row content">
    <div class="container">
        <h3>'.$titel.'</h3>
        <div>'.$tekst.'</div>
      </div>
  </div>
  <!-- End content -->';
	}
?>
