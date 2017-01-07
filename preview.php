<?php

if(!isset($_POST['sponsor']))
    $sponsor = 0;
else
    $sponsor = 1;

require 'header.php';
toon_pagina($_POST['page_id'], $_POST['editor1'], $sponsor, $_POST['title']);
require 'footer.php';

?>
