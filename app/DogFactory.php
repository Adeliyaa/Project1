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

        $breed = ['Alaskan Klee Kai','Appenzeller Sennenhunde','Borzoi','Pitbul','Bolognese'];
        $gender =['female', 'male'];
        $color = ['red', 'black', 'white', 'silver','brown'];
        $name = ['Ilya','Bekbolat','Serzhan','Adeliya','Sasha'];

        $dogBreed = $breed[array_rand($breed,1)];
        $dogAge = rand(1,7);
        $dogGender = $gender[array_rand($gender, 1)];
        $dogColor = $color[array_rand($color,1)];
        $dogName = $name[array_rand($name,1)];
        $dogSquare = rand(100,300);

        while ($dogAmount > 0) {
            array_push($dogs,new Dog($dogBreed,$dogAge,$dogGender,$dogColor,$dogName,$dogSquare));
            $dogAmount--;
        }
        return $dogs;
    }
}