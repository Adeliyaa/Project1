<?php
require 'vendor/autoload.php';

$start = new \App\Application();
//$cli=new \App\CliView();
//$cli->CliView($start->start());
$html=new \App\HtmlView();
$html->HtmlView($start->start());


