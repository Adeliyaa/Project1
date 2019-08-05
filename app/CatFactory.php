<?php

namespace App;

use App\Interfaces\IFactory;

class CatFactory implements IFactory
{

    static public function create(int $catAmount)
    {
        $breed = ['abyssinian cat','american Bobtail','american curl','american shorthair','american wirehair'];
        $gender =['female', 'male'];
        $color = ['red', 'black', 'white', 'silver','brown'];
        $name = ['Ilya','Bekbolat','Serzhan','Adeliya','Sasha'];


        $cats = [];
        while ($catAmount > 0) {
            array_push($cats,new Cat($breed[array_rand($breed,1)],rand(1,7),$gender[array_rand($gender, 1)],$color[array_rand($color,1)],$name[array_rand($name,1)],rand(140,300),rand(100,200)));
            $catAmount--;
        }
        return $cats;
    }
}