<?php include_once '../functions.php'; ?>
<div id="tentoonstelling">
    <form method="post" id="form">
        <h4><input type="text" name="title" placeholder="Vul de titel in..." title="Aanpassen van de titel" /></h4>

                <textarea name="editor1" id="editor1" rows="10" cols="80" title="Editor om toe te voegen">Vul hier uw tekst in en plaats foto's voor uw nieuwe pagina met betrekking tot tentoonstellingen!
                </textarea>

        <table style="white-space: nowrap;">
            <tbody>
            <tr>
                <td><label for="startDate">Welke datum start de tentoonstelling?</label></td>
                <td><input type="date" name="startDate" id="startDate" placeholder="dd-mm-jjjj" /></td>
            </tr>
            <tr>
                <td><label for="endDate">Welke datum eindigt de tentoonstelling?</label></td>
                <td><input type="date" name="endDate" id="endDate" placeholder="dd-mm-jjjj" /></td>
            </tr>
            <tr>
                <td><label for="menu">Op welke plaats vindt deze tentoonstelling plaats?</label></td>
                <td>
                    <?php get_all_tentoonstellingPlaces() ?>
                </td>
            </tr>
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
                <td><label for="homepage">Moet de pagina op de homepage in het licht gezet worden?&nbsp;</label></td>
                <td><input type="checkbox" name="homepage" id="homepage" /></td>
            </tr>
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
            <tbody id="homepageHide">
            <tr>
                <td><label for="korte_inleiding">Schrijf een korte inleiding voor op de homepage</label></td>
                <td><textarea name="korte_inleiding" id="korte_inleiding"></textarea></td>
            </tr>
            </tbody>
        </table>

        <div class="form-group">
            <div class="input-group">
                <input type="hidden" name="templateId" value="" id="templateId" />
                <input type="hidden" name="page" value="tentoonstelling" id="page" />
                <!--<input type="submit" id="preview" value="Preview" formaction="preview.php" formmethod="post" class="btn btn-info">-->
                <input type="submit" id="save" value="Opslaan" class="btn btn-info">
            </div>
        </div>
    </form>
</div>