<?php


namespace App;


use App\Interfaces\IFactory;

class FoodFactory
{

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