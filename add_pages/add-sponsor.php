<?php include_once '../functions.php'; ?>
<div id="sponsor">
    <form method="post" id="form">
        <h4><input type="text" name="title" placeholder="Naam van de sponsor.." title="Aanpassen van de titel" /></h4>

        <textarea name="editor1" id="editor1" rows="10" cols="80" title="Editor om toe te voegen">Vul hier uw tekst in met betrekking tot uw sponsor!</textarea>

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
            <tr>
                <td><label for="image">Upload hier het logo van de sponsor</label></td>
                <td>
                    <input type="file" name="image" id="image">
                </td>
            </tr>
            </tbody>
        </table>

        <div class="form-group">
            <div class="input-group">
                <input type="hidden" name="templateId" value="" id="templateId" />
                <input type="hidden" name="page" value="sponsor" id="page" />
                <input type="submit" id="save" value="Opslaan" class="btn btn-info">
            </div>
        </div>
    </form>
</div>