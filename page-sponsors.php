  <!-- Begin navbar -->
  <?php
  require 'header.php';

    if (isset($_GET['sponsor_name'])) {
        $sponsor = $_GET['sponsor_name'];
    }else{
        $sponsor = 'Error';
    }
  ?>
  <!-- End navbar -->

  <!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>
              <?=$sponsor ?>
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->

  <!-- Begin content -->
  <div class="row content">
    <div class="container">

        <?='<p>'.$sponsor.'</p>' ?>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel consequat metus, sed blandit justo. Pellentesque sed semper tortor, euismod lacinia tortor. Sed ornare est tellus, quis scelerisque ex tincidunt egestas. Vivamus quis fermentum tortor. Nulla sed leo nec arcu eleifend volutpat quis at nibh. Praesent vitae dictum augue. Proin consequat velit quis magna bibendum, a feugiat justo venenatis. Aenean finibus nisi eu faucibus volutpat. Curabitur congue tristique mauris consectetur venenatis. Vestibulum vitae rutrum orci, id tincidunt velit. Donec finibus eget purus ut porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec cursus felis ut metus sodales, sed rutrum leo porta. Praesent bibendum mattis lacus.</p>
      <img src="images/dekleinezaal.jpg" class="img-responsive right">

      <p>Vivamus quis enim leo. Praesent facilisis elementum lorem, at vestibulum eros ullamcorper eget. Praesent rutrum nulla lacus, at luctus elit venenatis vitae. Maecenas massa nunc, aliquam nec tellus eu, interdum vestibulum velit. Morbi risus lectus, laoreet finibus ex a, ornare tempor odio. Sed vel tempus nisl. Nam eget dapibus augue. Integer id neque neque.</p>

      <p>Sed posuere erat at orci rutrum viverra. Vestibulum eu nulla ac purus gravida scelerisque vel a eros. Integer eu augue ut enim imperdiet varius quis et orci. Phasellus vitae orci diam. Nulla facilisi. Ut pellentesque egestas turpis non tempor. Nulla volutpat, metus a sodales consequat, dolor lacus sodales diam, eget elementum tortor justo at dolor. Aliquam vel interdum neque. Etiam pulvinar euismod metus, a fermentum enim rutrum iaculis. Donec odio orci, sagittis quis gravida sollicitudin, maximus id mauris. Maecenas ac luctus erat.</p>

      <p>Nullam ut dapibus augue, laoreet vulputate ante. Maecenas vel massa vitae est congue scelerisque. In hendrerit venenatis mi, ut gravida enim euismod malesuada. Maecenas sem nunc, euismod quis lorem sit amet, fermentum lobortis tellus. Donec feugiat venenatis est vel tristique. Sed facilisis ligula quis arcu hendrerit, id congue nisi consequat. Mauris rutrum sapien lorem. Duis fringilla dapibus luctus. Quisque ornare mauris sit amet arcu consequat, a tempus ante pulvinar. Nam sit amet nulla at dolor porttitor tincidunt eget mattis ante. Duis euismod ultrices arcu eget pretium. Donec quis pulvinar quam. Nunc vitae ipsum sit amet nibh luctus gravida a eget enim.</p>

      <p>Vestibulum imperdiet fringilla nulla, vitae congue elit luctus ac. Aliquam dapibus lobortis leo ac egestas. Cras feugiat enim eu hendrerit sodales. Aliquam tincidunt pretium pharetra. In augue ante, mattis ac lorem id, feugiat scelerisque dolor. Maecenas pellentesque nisi non risus interdum lacinia. Sed eget arcu turpis. Suspendisse et nunc ante. Phasellus iaculis mauris non cursus ullamcorper. Phasellus fringilla orci sit amet massa pulvinar tincidunt.</p>

      <p>Curabitur eget turpis eu diam efficitur euismod vel tincidunt velit. Fusce maximus nisl sit amet turpis cursus, pharetra tempus justo maximus. Etiam molestie ultricies orci, sit amet finibus ipsum pharetra in. Ut efficitur hendrerit nisi quis bibendum. Pellentesque ultrices odio ac tincidunt pellentesque. Mauris ac orci dapibus nisi sagittis ullamcorper eu et lectus. Nullam at interdum libero. Suspendisse posuere sit amet sem nec dapibus. Maecenas dolor purus, dignissim eget euismod a, viverra quis sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed tincidunt elementum libero sed interdum. Sed bibendum, massa a sodales lacinia, arcu leo tempus leo, eu malesuada tellus quam quis lacus. Maecenas ut egestas tortor, a maximus eros.</p>

      <p>Donec rutrum turpis tellus, sit amet mollis ipsum laoreet ut. Nunc convallis mollis quam sit amet lacinia. Donec congue ultricies nibh vitae pulvinar. Praesent mattis, ex et blandit eleifend, nulla justo semper augue, et porttitor metus ex id lacus. Ut id mauris quis eros ultrices hendrerit. Proin quis eros eros. Quisque tincidunt arcu augue, ac tempus nibh ullamcorper rhoncus. Cras euismod aliquam gravida. Etiam auctor, quam non tempor accumsan, ante metus ultricies magna, ut ultrices odio neque sit amet nisl. Aenean quis ante eget metus fringilla cursus. Maecenas quis gravida urna. Fusce rutrum quis velit id ultricies. Maecenas dapibus enim a scelerisque lacinia. Vivamus aliquam ligula et diam tincidunt pulvinar.</p>
    </div>
  </div>
  <!-- End content -->

  <?php include('sponsors_block.php'); ?>

  <?php include('footer.php'); ?>
