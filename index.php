<?php
require 'vendor/autoload.php';

$html=new \App\HtmlView(); //instance of Html View
$start = new \App\Application(); //instance of Application
$quantityHtml = new \App\QuantityHtml();
$start->start($html,$quantityHtml);





