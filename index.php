<?php
require 'vendor/autoload.php';

$html=new \App\HtmlView(); //instance of Html View
$start = new \App\Application(); //instance of Application
$start->start($html);





