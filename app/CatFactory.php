<?php

namespace App;

use App\Interfaces\IFactory;

class CatFactory implements IFactory
{
    /**
     * create cat(s) by amount
     * @param int $catAmount
     * @return array|mixed
     */
    static public function create(int $catAmount)
    {
        $cats = [];

        $breed = ['abyssinian cat','american Bobtail','american curl','american shorthair','american wirehair'];
        $gender =['female', 'male'];
        $color = ['red', 'black', 'white', 'silver','brown'];
        $name = ['Ilya','Bekbolat','Serzhan','Adeliya','Sasha'];

        $catBreed = $breed[array_rand($breed,1)];
        $catAge = rand(1,7);
        $catGender = $gender[array_rand($gender, 1)];
        $catColor = $color[array_rand($color,1)];
        $catName = $name[array_rand($name,1)];
        $catSquare = rand(100,300);

        while ($catAmount > 0) {
            array_push($cats,new Cat($catBreed,$catAge,$catGender,$catColor,$catName,$catSquare));
            $catAmount--;
        }
        return $cats;
    }
}