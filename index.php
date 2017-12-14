<?php

error_reporting(($_SERVER['SERVER_NAME'] == 'localhost') ? E_ALL : 0);
require 'libs/twink/twink.php';

$twink = new twink();

if($twink->resolveURL() === false){
    // Render 404 if can't resolve URL
    header("HTTP/1.0 404 Not Found");
    $twink->render('404');
    exit;   
}

// Render the templates
$twink->render();