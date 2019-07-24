<?php
namespace App;


use App\Abstraction\Animal;

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

    public function getExcrementsMass(): float
    {
        return self::EXCREMENTS_MASS_PERCENTAGE;
    }
}
