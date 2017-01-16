<?php include_once '../functions.php'; ?>
<div id="content">
    <form method="post" id="form">
        <h4><input type="text" name="title" placeholder="Vul de titel in..." title="Aanpassen van de titel" /></h4>

                <textarea name="editor1" id="editor1" rows="10" cols="80" title="Editor om toe te voegen">Vul hier uw tekst in en plaats foto's voor uw nieuwe content-pagina!</textarea>

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
                    <select id="submenu" name="submenu">
                        <option>Alle submenu-opties</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="form-group">
            <div class="input-group">
                <input type="hidden" name="templateId" value="" id="templateId" />
                <input type="hidden" name="page" value="content" id="page" />
                <input type="submit" id="save" value="Opslaan" class="btn btn-info">
            </div>
        </div>
    </form>
</div>