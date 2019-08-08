<?php

namespace App;

use App\Interfaces\IFactory;

class DogFactory implements IFactory
{
    /**
     * create dogs
     * @param int $dogAmount
     * @return array|mixed
     */
    static public function create(int $dogAmount)
    {
        $dogs = [];

        $breed  = Config::get('dog_breed');
        $gender = Config::get('gender');
        $color  = Config::get('dog_color');
        $name   = Config::get('dog_name');

        $dogBreed  = $breed[array_rand($breed,1)];
        $dogAge    = Config::get('dog_age');
        $dogGender = $gender[array_rand($gender, 1)];
        $dogColor  = $color[array_rand($color,1)];
        $dogName   = $name[array_rand($name,1)];
        $dogSquare = Config::get('dog_square');

        while ($dogAmount > 0) {
            array_push($dogs,new Dog($dogBreed,$dogAge,$dogGender,$dogColor,$dogName,$dogSquare));

            $dogAmount--;
        }
        return $dogs;
    }
}
