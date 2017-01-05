<?php
include('config.php');

//Controlleerd of server lokaal is of de webserver
function checkLocal()
{
    if($_SERVER['SERVER_NAME'] == '194.171.20.107')
    {
        echo '<base href="/devishal/" />';
    }

    elseif($_SERVER['SERVER_NAME'] == 'localhost')
    {
        echo '<base href="/deVishal/" />';
    }
}

//Haalt de navigatieItems op uit de DB en maakt de Navigatie aan
function navigation($conn)
{
    $query = "SELECT menuItem.naam AS 'menuItem', submenuItem.naam AS 'submenuItem', submenuItem.volgorde FROM menuItem INNER JOIN submenuItem ON submenuItem.menuId = menuItem.menuId ORDER BY menuItem.volgorde, submenuItem.volgorde";
    $result = mysqli_query($conn, $query);
    $vorigmenuItem = '';
    $output = '';
    $submenu = '';
    if (mysqli_num_rows($result)>0) {
        while($rec = mysqli_fetch_assoc($result)) {
            if($vorigmenuItem<>$rec['menuItem']) {
                $output .= $submenu;
                $submenu = '';
                if($vorigmenuItem<>'')
                    $output .= '</ul></li>';
                $output .= '<li class="dropdown full-width">
				<a href="'.$rec['submenuItem'].'" class="dropdown-toggle" data-toggle="dropdown">'.$rec['menuItem'].'</a>
				<ul class="dropdown-menu">';
                $vorigmenuItem = $rec['menuItem'];
            }
            if($rec['volgorde']>-1)
                $submenu = '<li><a href="'.$rec['menuItem'].'/'.$rec['submenuItem'].'">'.$rec['submenuItem'].'</a></li>'.$submenu;
        }
        $output .= $submenu;
        echo $output;
    }
    else
        echo  'Helaas, geen gegevens gevonden.';
    mysqli_close($conn);
}
?>