<?php

namespace App;

class FoodFactory
{
    /**
     * create food for pets
     * @param $portion_amount
     * @return array
     */
    static public function create($portion_amount)
    {
        $foodPortion = [];

        while($portion_amount > 0) {
            array_push($foodPortion, new Food(200));

            $portion_amount--;
        }
        return $foodPortion;
    }
}
