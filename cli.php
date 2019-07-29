<?php
require 'vendor/autoload.php';

$cli=new \App\CliView();
$start = new \App\Application();
$quantityCli = new \App\QuantityCli();
$start->start($cli,$quantityCli);