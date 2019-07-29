<?php
require 'vendor/autoload.php';

$cli=new \App\CliView();
$start = new \App\Application();
$start->start($cli);