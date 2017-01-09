<?php

if(isset($_GET['page_id']))
    $page_id = $_GET['page_id'];
else
    $page_id = 1;

require 'header.php';
toon_pagina($page_id);
require 'footer.php';

?>