<?php

// include the bootstrapping file
require '../bootstrap/bootstrap.php';

// echo PUBLIC_DIR.'<br>';
// echo __DIR__.'<br>';
// echo __FILE__.'<br>';
// echo __LINE__.'<br>';

var_dump($_REQUEST);

echo request::get('route', '404');

echo 'I will be playing '. request::get('name', 'with my hands');