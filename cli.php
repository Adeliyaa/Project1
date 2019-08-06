<?php

use App\ParameterParserCli;

require 'vendor/autoload.php';

$cliView = new \App\CliView();
$start = new \App\Application();
$params = new ParameterParserCli();
$start->start($cliView,$params);