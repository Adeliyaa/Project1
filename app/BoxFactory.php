<?php

namespace App;

use App\Interfaces\IFactory;

class BoxFactory implements IFactory
{
    /**
     * create the box by square
     * @param int $boxSquare
     * @return Box
     */
    static public function create(int $boxSquare)
    {
        $box = new Box($boxSquare);

        return $box;
    }
}
