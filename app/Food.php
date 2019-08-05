<?php
namespace App;


class Food
{
    //const AMOUNT_OF_FEED = 100; //we have only 100 gr of feed and nothing more
    public $amount_of_feed;

    public function __construct($amount_of_feed)
    {
        $this->amount_of_feed = $amount_of_feed;
    }
}
