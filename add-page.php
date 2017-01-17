<?php
require 'header.php';
?>

<!-- Begin toppage -->
<script src="ckeditor/ckeditor.js"></script>
<div class="row toppage">
</div>
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-content">
                <h4 id="title">Pagina's toevoegen</h4>
            </div>
        </div>
    </div>
</div>
<!-- End toppage -->

<!-- Begin content -->
<div class="row content">
    <div class="container">
        <?php
        if(logged_in())
        {
        ?>

        <label for="add_options">Wat wilt u toevoegen? </label>

        <select id="add_options">
            <option value="0"></option>
            <option value="1">Tentoonstelling-pagina</option>
            <option value="2">Algemene content-pagina</option>
            <option value="3">Sponsoren-pagina</option>
            <option value="4">Leden toevoegen</option>
            <option value="5">Vrijwilligers toevoegen</option>
        </select>

        <div id="loadcontent" class="add_pages">
        </div>

        <?php
        }
        else {
            ?>
            <script type="text/javascript">
                window.location.href = 'admin.php?location=<?=urlencode($_SERVER['REQUEST_URI'])?>';
            </script>
            <?php
            exit();
        }

        ?>
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

        $("#add_options").on('change', function(){
            switch (this.value) {
                case '1':
                    loadPage('add_pages/add-tentoonstelling.php', "2");
                    break;
                case '2':
                    loadPage('add_pages/add-content.php', "2");
                    break;
                case '3':
                    loadPage('add_pages/add-sponsor.php', "4");
                    break;
                case '4':
                    loadPage('add_pages/add-leden.php', "3");
                    break;
                case '5':
                    loadPage('add_pages/add-vrijwilligers.php', "3");
                    break;
                default:
                    alert('Geen juiste keuze...');
                    break;
            }
        });

        function loadPage($page, $templateId){
            $('#loadcontent').load($page, function() {
                $('#templateId').val($templateId);

                $("#hide").hide();
                $("#homepageHide").hide();

                $('#zichtbaar').change(function () {
                    $("#hide").toggle();
                });

                $('#homepage').change(function () {
                    $("#homepageHide").toggle();
                });

                if(CKEDITOR.instances.editor1){
                    CKEDITOR.instances.editor1.destroy();
                }
                CKEDITOR.replace( 'editor1' );

                $("#menu").on('change', function() {
                    $.ajax({
                        type: 'post',
                        url: 'functions.php',
                        data: { command: 'get_submenuItems', menuId: this.value },
                        success: function (data) {
                            $("#submenu").html(data);
                        }
                    });
                });

                $('#form').on('submit', function (e) {
                    e.preventDefault();

                    var fData = new FormData($("#form")[0]);
                    fData.append('command', 'add');
                    fData.append('editorText', CKEDITOR.instances.editor1.getData());

                    if($('#image').length){
                        fData.append('image', $("input[name=image]")[0].files[0]);
                    }

                    $.ajax({
                        type: 'post',
                        url: 'save-page.php',
                        data: fData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            alert(data);
                        }
                    });
                });
            });
        }
    });
</script>