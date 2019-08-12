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
        /** @var array $cats */
        $cats = [];

        $breed  = Config::get('cat_breed');
        $gender = Config::get('gender');
        $color  = Config::get('cat_color');
        $name   = Config::get('cat_name');

        $catBreed  = $breed[array_rand($breed,1)];
        $catAge    = Config::get('cat_age');
        $catGender = $gender[array_rand($gender, 1)];
        $catColor  = $color[array_rand($color,1)];
        $catName   = $name[array_rand($name,1)];
        $catSquare = Config::get('cat_square');

        while ($catAmount > 0) {
            array_push($cats,new Cat($catBreed,$catAge,$catGender,$catColor,$catName,$catSquare));

            $catAmount--;
        }
        return $cats;
    }
}
