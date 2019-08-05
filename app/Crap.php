<?php
namespace App;


class Crap
{
    public $amount_of_crap;

    public function __construct($food)
    {
        $this->amount_of_crap = $food->amount_of_feed;
    }

    public function getExcrement()
    {
        return $this->amount_of_crap;
    }
}
