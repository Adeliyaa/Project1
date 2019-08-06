<?php

namespace App;

use App\Abstraction\Animal;

class Cat extends Animal
{
    private const EXCREMENT_MASS_PERCENTAGE = 0.15;

    /**
     * get voice of cat
     * @return string
     */
    public function voice(): string
    {
        return "Мяу Мяу!!!";
    }

    /**
     * check is cat crawl or not
     * @return bool
     */
    public function crawl(): bool
    {
        return true;
    }

    /**
     * get mass of cat's excrement
     * @return float
     */
    public function getExcrementMass(): float
    {
        return self::EXCREMENT_MASS_PERCENTAGE;
    }
}
