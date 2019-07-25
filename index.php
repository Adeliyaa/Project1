<?php
require 'vendor/autoload.php';

$start = new \App\Application();
//$cli=new \App\CliView(); //if run by CLI uncomment this
//$cli->CliView($start->start()); //and this also :)
$html=new \App\HtmlView();
$html->HtmlView($start->start());


