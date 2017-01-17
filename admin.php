<?php
require 'header.php';

if(isset($_GET['com']))
{
    if($_GET['com'] == 'uitloggen') {
        uitloggen();
    }
}
if(isset($_GET['location'])){
    $location = $_GET['location'];
}
else
    $location = '';

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
          <div class="col-md-4 replaceable">
              <?php
              if(logged_in())
              {
                  echo 'Welcome ' . $_SESSION['gebruikersnaam'];
                  ?>
                  
                  <ul>
                      <li><a href="add-page.php">Pagina's toevoegen / Leden toevoegen</a></li>
                      <li><a href="overview-pages.php">Overzicht van alle pagina's</a></li>
                  </ul>
                  
                  <?php
              }
              else
              {
                  ?>
                  <form method="post" action="authenticatie.php">
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

<script>
    $(function () {
        $('form').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: 'authenticatie.php',
                    data: $('form').serialize() + "&command=inloggen&location=<?=$location?>",
                    success: function (data) {
                        if (~data.indexOf("error")){
                            alert(data);
                        }
                        else {
                            $(".replaceable").html(data);
                        }
                    }
                });
        });
    });
</script>