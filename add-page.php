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

        <div id="tentoonstelling" style="display: none;" >
            <h4><input type="text" name="title" value="" placeholder="Vul de titel in..." title="Aanpassen van de titel" /></h4>

                        <textarea name="editor1" id="editor1" rows="10" cols="80" title="Editor om aan te passen">Vul hier uw tekst in en plaats foto's voor uw nieuwe pagina met betrekking tot tentoonstellingen!
                        </textarea>

            <table style="white-space: nowrap;">
                <tr>
                    <td><label for="sponsor">Sponsoren weergeven aan de onderkant?</label></td>
                    <td><input type="checkbox" name="sponsor" id="sponsor" /></td>
                </tr>
                <tr>
                    <td><label for="zichtbaar">Moet de pagina zichtbaar zijn voor bezoekers?</label></td>
                    <td>
                        <input type="checkbox" name="zichtbaar" id="zichtbaar" />
                    </td>
                </tr>
                <tr class="hide">
                    <td><label for="homepage">Moet de pagina op de homepage in het licht gezet worden?&nbsp;</label></td>
                    <td><input type="checkbox" name="homepage" id="homepage" /></td>
                </tr>
                <tr class="hide">
                    <td><label for="menu">In welk menu moet het terecht komen?</label></td>
                    <td>
                        <?php get_all_menuItems() ?>
                    </td>
                </tr>
                <tr class="hide">
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
            </table>

            <div class="form-group">
                <div class="input-group">
                    <input type="submit" id="preview" value="Preview" formaction="preview.php" formmethod="post" class="btn btn-info">
                    <input type="submit" id="save" value="Opslaan" formaction="edit-save.php" class="btn btn-info">
                </div>
            </div>
        </div>

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
    CKEDITOR.replace( 'editor1' );
    $(function () {
        $(".hide").hide();

        $('#zichtbaar').change(function() {
            //$(".hide").show();
        });

        $("#add_options").on('change', function(){
            switch (this.value) {
                case '1':
                    $('#tentoonstelling').show();
                    break;
                case '2':
                    alert(this.value);
                    break;
                case '3':
                    alert(this.value);
                    break;
                case '4':
                    alert(this.value);
                    break;
                case '5':
                    alert(this.value);
                    break;
                default:
                    alert('Geen juiste keuze...');
                    break;
            }
        });

        $("#menu").on('change', function() {
            $.ajax({
                type: 'post',
                url: 'functions.php',
                data: { command: 'get_submenuItems', test: this.value },
                success: function (data) {
                    $("#submenu").html(data);
                }
            });
        });


        /*$('form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: 'authenticatie.php',
                data: $('form').serialize() + "&command=inloggen",
                success: function (data) {
                    if (~data.indexOf("error")){
                        alert(data);
                    }
                    else {
                        $(".replaceable").html(data);
                    }
                }
            });
        });*/
    });
</script>