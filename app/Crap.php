<?php
namespace App;


class Crap
{
    public $amount_of_crap;

    public function __construct($amount_of_crap)
    {
        $this->amount_of_crap = $amount_of_crap;
    }

    public function getExcrements()
    {
        return $this->amount_of_crap;

    }
}
