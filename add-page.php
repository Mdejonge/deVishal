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

        <!--<form method="post" id="form">
                <h4><input type="text" name="title" placeholder="Vul de titel in..." title="Aanpassen van de titel" /></h4>

            <textarea name="editor1" id="editor1" rows="10" cols="80" title="Editor om toe te voegen">Vul hier uw tekst in en plaats foto's voor uw nieuwe contentpagina!</textarea>

                <table style="white-space: nowrap;">
                    <tbody>
                    <tr>
                        <td><label for="sponsor">Sponsoren weergeven aan de onderkant?</label></td>
                        <td><input type="checkbox" name="sponsor" id="sponsor" /></td>
                    </tr>
                    <tr>
                        <td><label for="zichtbaar">Moet de pagina zichtbaar zijn voor bezoekers? &nbsp;</label></td>
                        <td>
                            <input type="checkbox" name="zichtbaar" id="zichtbaar" />
                        </td>
                    </tr>
                    </tbody>
                    <tbody id="hide">
                    <tr>
                        <td><label for="menu">In welk menu moet het terecht komen?</label></td>
                        <td>
                            <?php get_all_menuItems() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="submenu">En in welk submenu?</label> <br />
                            <i>Wanneer een item er niet tussen staat, komt dat omdat <br />
                                deze al vergeven is aan een andere pagina.</i>
                        </td>
                        <td>
                            <select id="submenu">
                                <option>Alle submenu-opties</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="form-group">
                    <div class="input-group">
                        <input type="hidden" name="templateId" value="" id="templateId" />
                        <input type="hidden" name="page" value="tentoonstelling" id="page" />

                        <input type="submit" id="save" value="Opslaan" formaction="edit-save.php" class="btn btn-info">
                    </div>
                </div>
            </form>-->

        <?php
        }
        else {
            // eruit gooien naar inlogpagina
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
                    alert(this.value);
                    //$('#templateId').val("4");
                    break;
                case '4':
                    alert(this.value);
                    //$('#templateId').val("3");
                    break;
                case '5':
                    alert(this.value);
                    //$('#templateId').val("3");
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

                    $.ajax({
                        type: 'post',
                        url: 'save-page.php',
                        data: $('form').serialize() + "&command=add",
                        success: function (data) {
                            alert(data);
                        }
                    });
                });
            });
        }
    });
</script>