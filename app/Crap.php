<?php

namespace App;

class Crap
{
    private $amount_of_crap;

    /**
     * Crap constructor.
     * @param Food $food
     */
    public function __construct($food)
    {
        $this->amount_of_crap = $food->getFoodAmount();
    }

    /**
     * get amount of crap
     * @return mixed
     */
    public function getExcrement()
    {
        return $this->amount_of_crap;
    }
}

