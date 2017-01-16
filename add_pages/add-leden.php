<?php
require '../functions.php';
?>
<div id="content">
    <form method="post" id="leden_add_form">

        <div class="row content">
            <div class="container">
                <p>Voeg hier nieuwe leden toe</p>
                <div class="row">
                    <div class="col-md-12 block">
                        <table id="add_leden">
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="name">Vul hier de naam in van het lid:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name[]" id="name" />
                                    </td>
                                    <td>
                                        <label for="webpage">Vul hier de website in van het lid:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="webpage[]" id="webpage" />
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" id="add_row">
                                        <img src="images/add_row.png" width="20" height="20" />
                                        <b><i>Voeg een nieuwe rij toe om meer leden toe te voegen</i></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input type="hidden" name="page" value="leden" id="page" />
                <input type="submit" id="save" value="Opslaan" class="btn btn-info">
            </div>
        </div>
    </form>
</div>

<script>
    $(function () {
        $('#add_row').on('click', function () {
            $('#add_leden tbody:last').append('<tr><td><label for="name">Vul hier de naam in van het lid:</label></td>' +
                '<td><input type="text" name="name[]" id="name" /></td>' +
                '<td><label for="webpage">Vul hier de website in van het lid:</label>' +
                '</td><td><input type="text" name="webpage[]" id="webpage" /></td>' +
                '<td class="remove"><img src="images/remove.png" width="20px" height="20px" /></td></tr>');
        });

        $('#add_leden').on('click', '.remove', function () {
            $(this).closest('tr').remove();
        });

        $('#leden_add_form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: 'save-page.php',
                data: $('#leden_add_form').serialize() + '&command=add_leden',
                success: function (data) {
                    alert(data);
                }
            });
        });

    });



</script>