<!-- Begin navbar -->
<?php
require 'header.php';
?>
<!-- End navbar -->

<!-- Begin slider -->
<div id="homepageslider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <a href="#"><img src="https://static.pexels.com/photos/20967/pexels-photo.jpg" /></a>
        </div>
        <div class="item">
            <a href="#"><img src="https://static.pexels.com/photos/169406/pexels-photo-169406.jpeg" /></a>
        </div>
    </div>
    <a class="left carousel-control" href="#homepageslider" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#homepageslider" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<!-- End slider -->

<!-- Begin actueel -->
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-actueel">
                <h4>Actueel</h4>
            </div>
        </div>
    </div>
</div>
<?php
function toon_bericht_links($naam, $korte_inleiding, $foto_link) {
    echo '<div class="row actueel">
    <div class="container">
        <div class="col-sm-7 col-md-5">
            <img src="'.$foto_link.'" class="img-responsive" height="230" width="420">
        </div>
        <div class="col-sm-5 col-md-7">
        <h4>'.$naam.'</h4>
        <p>'.substr($korte_inleiding, 0, strpos(wordwrap($korte_inleiding, 300), "\n")). " <a href='Tentoonstelling/".$naam."'>Lees Verder...</a>".'</p>
        </div>
    </div>
  </div>';
}
function toon_bericht_rechts($naam, $korte_inleiding, $foto_link) {
    echo '<div class="row actueel">
    <div class="container">
        <div class="col-sm-5 col-md-push-7">
            <img src="'.$foto_link.'" class="img-responsive" height="230" width="420">
        </div>
        <div class="col-sm-7 col-md-pull-5">
        <h4>'.$naam.'</h4>
        <p>'.substr($korte_inleiding, 0, strpos(wordwrap($korte_inleiding, 300), "\n")). " <a href='Tentoonstelling/".$naam."'>Lees Verder...</a>".'</p>
        </div>
    </div>
  </div>';
}
$query = 'SELECT pagina.titel, tentoonstelling.korte_inleiding, tentoonstelling.foto_link FROM tentoonstelling, pagina WHERE tentoonstelling.paginaId = pagina.paginaId AND pagina.zichtbaar ORDER BY tentoonstelling.datum_start DESC LIMIT 3';
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)>0) {
    $count = 0;
    while($rec = mysqli_fetch_assoc($result)) {
        $count++;
        if($count == 1)
        {
            toon_bericht_links($rec['titel'], $rec['korte_inleiding'], $rec['foto_link']);
        }
        else {
            toon_bericht_rechts($rec['titel'], $rec['korte_inleiding'], $rec['foto_link']);
            $count = 0;
        }

    }
}
else {
    echo  'Helaas, geen gegevens gevonden.';
}
mysqli_close($conn);
?>
<!-- End actueel -->

<!-- Begin Instagram -->
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-instagram">
                <h4>Instagram</h4>
            </div>
        </div>
    </div>
</div>
<div class="row instagram">
    <div class="container">
        <!-- LightWidget WIDGET -->
        <div id="instaimg">
            <script src="//lightwidget.com/widgets/lightwidget.js"></script>
            <iframe src="//lightwidget.com/widgets/bfc5f546328d53b1ab81a59a0458a0eb.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
        </div>
    </div>
</div>
<!-- End Instagram -->

<!-- Begin sponsors -->
<?php include('sponsors_block.php'); ?>
<!-- End sponsors -->
<?php
include('footer.php');
?>
