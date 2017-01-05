<?php
session_start();
require 'header.php';
include_once 'authenticatie.php';
include 'config.php';

if(isset($_GET['com']))
{
    if($_GET['com'] == 'uitloggen'){
        uitloggen();
    }
}
?>

<!-- Begin toppage -->
    <div class="row toppage">
    </div>
    <div class="row kopjerow">
      <div class="container">
        <div class="col-md-12">
          <div class="kopje-content">
            <h4>Admin pagina</h4>
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
              <?php

              if(isset($_SESSION['gebruikersnaam']) && isset($_SESSION['id']))
              {
                  echo 'u bent ingelogd';
                  // TODO: Pagina voor admin maken
              }
              else
              {
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      function test_input($data) {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          return $data;
                      }

                      $username = test_input($_POST["name"]);
                      $password = test_input($_POST["password"]);

                      if(inloggen($username, $password, $conn)){
                          echo '<meta http-equiv="refresh" content="0">';
                          exit();
                      }
                  }

                  ?>
                  <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                      <div class="row contactrow">
                          <div class="container">
                              <div class="col-md-6">
                                  <div class="formcontact">
                                      <div class="form-group">
                                          <label for="name">Gebruikersnaam:</label>
                                          <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                              <input type="text" class="form-control" id="name" name="name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="password">Wachtwoord:</label>
                                          <div class="input-group">
                                              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                              <input type="password" class="form-control" id="password" name="password">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="input-group">
                                          <input type="submit" class="btn btn-info" id="verstuur" value="Verzenden">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                  <?php
              }
              ?>
          </div>
        </div>
      </div>
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

?>