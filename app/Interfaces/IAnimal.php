<?php
namespace App\Interfaces;

use App\Abstraction\Animal;
use App\Abstraction\ParameterParser;
use App\Food;

interface IAnimal
{
    public function voice() :void;
    public function crawl() :bool;
    public function eat(Food $food);
    public function toilet(): \Generator;
}
