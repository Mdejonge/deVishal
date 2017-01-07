<?php
require 'header.php';
include_once 'authenticatie.php';

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
          <!--<div class="col-md-4 left">
              <h5>Adres</h5>
          </div>

          <div class="center col-md-4">
              <h5>De Vishal</h5>

          </div>

          <div class="col-md-4 right">
              <h5>Openingstijden</h5>
          </div> -->


          <div class="row">
          <div class="col-md-4">
              <?php

              if(logged_in())
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
                              <div class="col-md-4
                              ">
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
<?php
include_once 'footer.php'
?>
<!-- End footer -->

</body>
</html>