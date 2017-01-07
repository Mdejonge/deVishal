<!-- Begin navbar -->
<?php
require 'header.php';

if(isset($_GET['page_id'])){
    $page_id = $_GET['page_id'];
}

$query = 'SELECT titel, tekst, sponsorfooter
              FROM pagina
              WHERE paginaId = '.$page_id;
$result = $conn->query($query);
if($result->num_rows > 0){
    while($rec = $result->fetch_assoc()) {
        $titel = $rec['titel'];
        $content = $rec['tekst'];
        $footer = $rec['sponsorfooter'];
    }
}
else{
    $titel = '';
    $content = '';
    $footer = '';
}


?>
<!-- End navbar -->

<!-- Begin toppage -->
<div class="row toppage">
</div>
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-content">
                <h4><?=$titel?></h4>
                
            </div>
        </div>
    </div>
</div>
<!-- End toppage -->

<!-- Begin content -->
<div class="row content">
    <div class="container" id="replaceable">
        <script src="ckeditor/ckeditor.js"></script>

        <form target="_blank">
            <input type="hidden" name="page_id" value="<?=$page_id?>" />
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                <?php echo  $content; ?>
            </textarea>
            <input type="submit" id="preview" value="Preview" formaction="preview.php" formmethod="post">
            <input type="submit" id="save" value="Opslaan" formaction="edit-save.php">
            <p>Todo: Zorgen dat plaatjes geüpload worden<br />
            Aangeven of sponsorenbalk weergegeven moet worden <br />
            Titel kunnen veranderen<br />
            Zichtbaarheid aan kunnen vinken</p>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>

    </div>
</div>
<!-- End content -->

<!-- Begin sponsors -->
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-sponsors">
                <h4>Sponsors</h4>
            </div>
        </div>
    </div>
</div>
<div class="row sponsors">
    <div class='row'>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor first">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
    </div>
</div>
<!-- End sponsors -->

<?php include 'footer.php' ?>

<script>
    $(function () {

        $('form').on('submit', function (e) {

            // Btn which was clicked
            var btn = $(document.activeElement);
            // The webpage it should go to
            var link = btn.attr('formaction');

            if(link.indexOf("preview") < 0) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: link,
                    data: $('form').serialize(),
                    success: function (data) {
                        alert(data);
                    }
                });
            }

        });

    });
</script>
