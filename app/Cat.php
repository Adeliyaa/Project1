<?php
namespace App;


use App\Abstraction\Animal;

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

    public function getExcrementsMass(): float
    {
        return self::EXCREMENTS_MASS_PERCENTAGE;
    }
}
