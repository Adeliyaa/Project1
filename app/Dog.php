<?php

namespace App;

use App\Abstraction\Animal;

class Dog extends Animal
{
    private const EXCREMENT_MASS_PERCENTAGE = 0.3;

    /**
     * get voice of dog
     * @return string
     */
    public function voice(): string
    {
        return "Гаф Гаф!!!";
    }

    /**
     * check is dog crawl or not
     * @return bool
     */
    public function crawl(): bool
    {
        return true;
    }

    /**
     * get dog's mass excrement
     * @return float
     */
    public function getExcrementMass(): float
    {
        return self::EXCREMENT_MASS_PERCENTAGE;
    }
}
