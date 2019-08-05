<?php


namespace App\Interfaces;


use App\Abstraction\ParameterParser;

interface IFactory
{
    static public function create(int $StuffAmount);
}