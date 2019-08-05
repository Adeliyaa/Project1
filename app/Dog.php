<?php
namespace App;


use App\Abstraction\Animal;
use App\Abstraction\ParameterParser;

class Dog extends Animal
{
    const EXCREMENTS_MASS_PERCENTAGE = 0.3;

    public function voice(): void
    {
        echo "Гаф Гаф!!!";
    }

    public function crawl(): bool
    {
        return true;
    }

    public function getExcrementMass(): float
    {
        return self::EXCREMENTS_MASS_PERCENTAGE;
    }
}
