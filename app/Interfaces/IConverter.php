<?php


namespace App\Interfaces;


interface IConverter
{
    public function Convert($string): string;
}