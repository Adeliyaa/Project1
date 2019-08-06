<?php

use App\ParameterParserHtml;

require 'vendor/autoload.php';

$htmlView = new \App\HtmlView();
$start = new \App\Application();
$params = new ParameterParserHtml();
$start->start($htmlView,$params);





