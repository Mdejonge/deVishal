<!-- Begin navbar -->
<?php
require 'header.php';
include 'config.php';
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
<div class="row actueel">
    <div class="container">
        <div class="col-sm-7 col-md-5">
            <img src="images/zeelong.jpeg" class="img-responsive" height="230" width="420">
        </div>
        <div class="col-sm-5 col-md-7">
            <h4>Zeelong</h4>
            <p>Maar liefst 54 % van de zuurstof in de lucht wordt geproduceerd door zeewier en algen.</p>
        </div>
    </div>
</div>
<div class="row actueel">
    <div class="container">
        <div class="col-sm-5 col-md-push-7">
            <img src="images/dekleinezaal.jpg" class="img-responsive" height="230" width="420">
        </div>
        <div class="col-sm-7 col-md-pull-5">
            <h4>De Kleine Zaal</h4>
            <p>Julia Geerlings (1985, Amsterdam) is onafhankelijk curator en schrijver woonachtig in Amsterdam en Parijs.</p>
        </div>
    </div>
</div>
<div class="row actueel">
    <div class="container">
        <div class="col-sm-7 col-md-5">
            <img src="images/zeelong.jpeg" class="img-responsive" height="230" width="420">
        </div>
        <div class="col-sm-5 col-md-7">
            <h4>Zeelong</h4>
            <p>Maar liefst 54 % van de zuurstof in de lucht wordt geproduceerd door zeewier en algen.</p>
        </div>
    </div>
</div>
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
<div class="row kopjerow">
    <div class="container">
        <div class="col-md-12">
            <div class="kopje-sponsors">
                <h4>Sponsors</h4>
            </div>
        </div>
    </div>
</div>
<div class="row sponsors">
    <div class='row'>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor first">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
        <div class="col-sm-3 col-md-3">
            <img src="images/logo-rabobank.png" class="img-responsive sponsor">
        </div>
    </div>
</div>
<!-- End sponsors -->

<!-- Begin footer -->
<div class="row footer">
    <div class="container">
        <div class="col-md-4 berichten">
            <h5>Recente Berichten</h5>
            <div class="row bericht">
                <a href="#">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <img src="images/zeelong.jpeg" class="img-responsive">
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <span>Tentoonstelling Zeelong</span>
                        <p>01 november 2016</p>
                    </div>
                </a>
            </div>
            <div class="row bericht">
                <a href="#">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <img src="images/zeelong.jpeg" class="img-responsive">
                    </div>
                    <div class="col-xs-7 col-sm-7 col-md-7">
                        <span>Tentoonstelling Zeelong</span>
                        <p>01 november 2016</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row nieuwsbrief">
                <h5>Aanmelden nieuwsbrief</h5>
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nieuwsbrief" placeholder="Email Adres">
                        <input type="submit" class="form-control" id="aanmelden" value="Aanmelden">
                    </div>
                </form>
            </div>
            <div class="row social-media">
                <a href="#"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-md-4 contact">
            <h5>Contact</h5>
            <img src="images/logo_vishal.png" class="img-responsive">
        <span>
          De vishal<br>
          Grote Markt 20<br>
          2011 RD Haarlem<br>
          Tel: 023-5326856<br>
          E-mail: <a href="mailto:de.vishal@gmail.com">de.vishal@gmail.com</a>
        </div>
    </div>
    <div id="copyright">
        &copy; 2016 Copyright. De vishal
    </div>
</div>
<!-- End footer -->
</body>
</html>
