<?php

use App\ParameterParserHtml;

require 'vendor/autoload.php';

$htmlView=new \App\HtmlView(); //instance of Html View
$start = new \App\Application(); //instance of Application
$params = new ParameterParserHtml();
$start->start($htmlView,$params);





