<?php

namespace App;

class AnimalFeeder
{
    /**
     * create food and feed pets
     * @param $pets
     */
    public function feedPets($pets)
    {
        $foodPortion = FoodFactory::create(count($pets));

        foreach ($pets as $pet) {
            $pet->eat(array_pop($foodPortion));
        }
    }
}
