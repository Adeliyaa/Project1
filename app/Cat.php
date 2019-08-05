<?php
namespace App;


use App\Abstraction\Animal;
use App\Abstraction\ParameterParser;

class Cat extends Animal
{
    const EXCREMENTS_MASS_PERCENTAGE = 0.15;

    public function voice(): void
    {
        echo "Мяу Мяу!!!";
    }

    public function crawl(): bool
    {
        return true;
    }
    /**
     * @return float
     */
    public function getExcrementMass(): float
    {
        return self::EXCREMENTS_MASS_PERCENTAGE;
    }
}
