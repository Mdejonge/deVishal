<?php
function toon_pagina($nummer) {
    $conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die('DB-verbinding mislukt '.$conn->connect_error);
    }
    mysqli_set_charset($conn,'utf8');
    $query = 'SELECT titel, tekst, sponsorfooter, templateId FROM pagina WHERE paginaId = '.$nummer;
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($rec = $result->fetch_assoc()) {
            geef_html($rec['templateId'], $rec['titel'], $rec['tekst']);
            if ($rec['sponsorfooter']=1) {
                include 'sponsors_block.php';
            }
        }
    }
    else {
        echo  'Helaas, geen gegevens gevonden.';
    }
    mysqli_close($conn);
}
function geef_html($templateId, $titel, $tekst) {
    $html = '';
    switch ($templateId) {
        case 1:
            $html = 'template1';
            break;
        case 2:
            $html = '<h1>'.$titel.'</h1></br><div>'.$tekst.'</div>';
        break;
			case 3:
                $html = 'template3';
                break;
			case 4:
                $html = template_4($titel, $tekst);
                break;
			case 5:
                $html = 'template5';
                break;
			default:
                $html = '<h1>'.$titel.'</h1></br><div>'.$tekst.'</div>';
		}
    echo $html;
}

function template_4($titel, $tekst) {
    echo ' 
    <!-- Begin toppage -->
  <div class="row toppage">
  </div>
  <div class="row kopjerow">
    <div class="container">
      <div class="col-md-12">
        <div class="kopje-content">
          <h4>
              '.$titel.'
          </h4>
        </div>
      </div>
    </div>
  </div>
  <!-- End toppage -->
 <!-- Begin content -->
    <div class="row content">
    <div class="container">

        <h3>'.$titel.'</h3>
        <div>'.$tekst.'</div>
      </div>
  </div>
  <!-- End content -->';
}
?>

<?php require 'header.php'; ?>
<?php toon_pagina(2); ?>
<?php require 'footer.php'; ?>