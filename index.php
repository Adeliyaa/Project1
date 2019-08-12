<?php

use App\ParameterParserHtml;

require 'vendor/autoload.php';

define('ROOT', __DIR__ . '/');

$htmlView = new \App\HtmlView();
$start    = new \App\Application();
$params   = new ParameterParserHtml();

$start->start($htmlView,$params);

