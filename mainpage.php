<?php

require 'functions.php';

if(isset($_GET['page_name']))
{
    if(isset($_GET['sponsor']))
        $page_id = get_page_id($_GET['page_name'], true);
    else
        $page_id = get_page_id($_GET['page_name']);
}
elseif(isset($_GET['page_id']))
    $page_id = $_GET['page_id'];
else
    $page_id = 1;

if($page_id == false)
{
    echo "Deze pagina bestaat nog niet";
    exit();
}

require 'header.php';
toon_pagina($page_id);
require 'footer.php';

?>