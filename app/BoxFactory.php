<?php


namespace App;


use App\Interfaces\IFactory;

class BoxFactory implements IFactory
{

    static public function create(int $boxSquare)
    {
        $box = new Box($boxSquare);
        return $box;
    }
}