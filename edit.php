<!-- Begin navbar -->
<?php
require 'header.php';


if(!logged_in()) {
    ?>
    <script type="text/javascript">
        window.location.href = 'admin.php?location=<?=urlencode($_SERVER['REQUEST_URI'])?>';
    </script>
    <?php
    exit();
}
else{

    if(isset($_GET['page_id'])){
        $page_id = $_GET['page_id'];
    }

    $query = 'SELECT titel, tekst, sponsorfooter, zichtbaar
                  FROM pagina
                  WHERE paginaId = '.$page_id;
    $result = $conn->query($query);
    if($result->num_rows > 0){
        while($rec = $result->fetch_assoc()) {
            $titel = $rec['titel'];
            $content = $rec['tekst'];
            $footer = $rec['sponsorfooter'];
            $zichtbaar = $rec['zichtbaar'];
        }
    }
    else{
        $titel = '';
        $content = '';
        $footer = '';
        $zichtbaar = '';
    }


    ?>
    <!-- End navbar -->

    <form target="_blank" id="form">

    <!-- Begin toppage -->
    <div class="row toppage">
    </div>
    <div class="row kopjerow">
        <div class="container">
            <div class="col-md-12">
                <div class="kopje-content">
                    <h4><input type="text" name="title" value="<?=$titel?>" title="Aanpassen van de titel" /></h4>

                </div>
            </div>
        </div>
    </div>
    <!-- End toppage -->

    <!-- Begin content -->
    <div class="row content">
        <div class="container" id="replaceable">
            <script src="ckeditor/ckeditor.js"></script>

            <textarea name="editor1" id="editor1" rows="10" cols="80" title="Editor om aan te passen">
                <?php echo  $content; ?>
            </textarea>

            <div class="form-group">
                <div class="input-group">
                    <input type="hidden" name="page_id" value="<?=$page_id?>" />
                    <input type="hidden" name="command" value="edit" />

                    <label for="sponsor">Sponsoren weergeven?</label>
                    <input type="checkbox" name="sponsor" id="sponsor" <?php if($footer){ echo 'checked'; }?> /> <br />

                    <label for="zichtbaar">Moet de pagina zichtbaar zijn?</label>
                    <input type="checkbox" name="zichtbaar" id="zichtbaar" <?php if($zichtbaar){ echo 'checked'; }?> />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input type="submit" id="preview" value="Preview" formaction="preview.php" formmethod="post" class="btn btn-info">
                    <input type="submit" id="save" value="Opslaan" formaction="save-page.php" class="btn btn-info">
                </div>
            </div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </div>
    </div>
    <!-- End content -->

    </form>

<?php
}
include 'footer.php' ?>

<script>
    $(function () {

        $('form').on('submit', function (e) {

            // Btn which was clicked
            var btn = $(document.activeElement);
            // The webpage it should go to
            var link = btn.attr('formaction');

            if(link.indexOf("preview") < 0) {
                e.preventDefault();

                var fData = new FormData($("#form")[0]);
                fData.append('editorText', CKEDITOR.instances.editor1.getData());

                $.ajax({
                    type: 'post',
                    url: link,
                    data: fData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        alert(data);
                    }
                });
            }

        });

    });
</script>
