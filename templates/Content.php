<?php 
	function geef_html($titel, $tekst, $paginaId = false) {
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
          </h4>';

		if(isset($_SESSION['gebruikersnaam'])&&isset($_SESSION['id'])){
			echo '<a href="Edit/'.$paginaId.'">Edit pagina</a>';
		}

		echo'
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
        
        <!-- Load Facebook SDK for JavaScript -->
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, \'script\', \'facebook-jssdk\'));
            </script>

            <!-- Your share button code -->
            <div class="fb-share-button"
                 data-href="<?=$_SERVER[\'REQUEST_URI\'];?>"
                 data-layout="button_count"
                 data-size="large"> 
            </div>
      </div>
  </div>
  <!-- End content -->';
	}
?>
