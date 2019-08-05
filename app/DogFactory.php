<?php


namespace App;


use App\Abstraction\ParameterParser;
use App\Interfaces\IFactory;

class DogFactory implements IFactory
{
    static public function create(int $dogAmount)
    {

        $breed = ['Alaskan Klee Kai','Appenzeller Sennenhunde','Borzoi','Pitbul','Bolognese'];
        $gender =['female', 'male'];
        $color = ['red', 'black', 'white', 'silver','brown'];
        $name = ['Ilya','Bekbolat','Serzhan','Adeliya','Sasha'];

        $dogs = [];
        while ($dogAmount > 0) {
            array_push($dogs,new Dog($breed[array_rand($breed,1)],rand(1,7),$gender[array_rand($gender, 1)],$color[array_rand($color,1)],$name[array_rand($name,1)],rand(140,300),rand(100,300)));
            $dogAmount--;
        }


        return $dogs;
    }
}