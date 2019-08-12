<?php

namespace App\Interfaces;

use App\Food;

interface IAnimal
{
    /**
     * @return string
     * get voice of pets
     */
    public function voice() :string;

    /**
     * @return bool
     * get if pets are crawl
     */
    public function crawl() :bool;

    /**
     * @param Food $food
     * @return mixed
     * feed pets with food
     */
    public function eat(Food $food);

    /**
     * @return \Generator
     * pets go toilet
     */
    public function toilet(): \Generator;
}
