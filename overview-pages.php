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

    $query = 'SELECT paginaId, titel, zichtbaar, naam, pagina.templateId
                FROM pagina
                INNER JOIN template on pagina.templateId = template.templateId
                ORDER BY naam, zichtbaar, titel';

    $result = $conn->query($query);

    ?>
    <!-- End navbar -->
        <!-- Begin toppage -->
        <div class="row toppage">
        </div>
        <div class="row kopjerow">
            <div class="container">
                <div class="col-md-12">
                    <div class="kopje-content">
                        <h4>Overzicht alle pagina's</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- End toppage -->

    <div id="content">
        <form method="post" id="leden_add_form">

            <div class="row content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 block">
                            <table id="all_pages">
                                <thead>
                                    <tr>
                                        <td>
                                            <b>Soort pagina:</b>
                                        </td>
                                        <td>
                                            <b>Titel van de pagina:</b>
                                        </td>
                                        <td>
                                            <b>Is de pagina zichtbaar voor bezoekers?</b>
                                        </td>
                                        <td>
                                            <b>Link naar edit pagina</b>
                                        </td>
                                    </tr>
                                </thead>
                                <?php
                                if($result->num_rows > 0){
                                    while($rec = $result->fetch_assoc()) {
                                        $titel = $rec['titel'];
                                        $pageId = $rec['paginaId'];
                                        $zichtbaar = $rec['zichtbaar'];
                                        $templateName = $rec['naam'];
                                        $templateId = $rec['templateId'];

                                        ?>
                                        <tbody class="page-row">
                                        <tr>
                                            <td>
                                                <?=$templateName?>
                                            </td>
                                            <td>
                                                <?=$titel?>
                                            </td>
                                            <td>
                                                <?=($zichtbaar) ? 'Ja' : 'Nee';?>
                                            </td>
                                            <td>
                                                <a href="Edit/<?=$pageId?>">Naar de edit pagina</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo 'Er is iets foutgegaan.';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
}
include 'footer.php' ?>

