<?php

namespace App;

class Food
{
    /** @var int feed amount */
    private $amount_of_feed;

    /**
     * Food constructor.
     * @param $amount_of_feed
     */
    public function __construct($amount_of_feed)
    {
        $this->amount_of_feed = $amount_of_feed;
    }

    /**
     * function for getting the amount of food
     * @return int
     */
    public function getFoodAmount()
    {
        return $this->amount_of_feed;
    }
}
