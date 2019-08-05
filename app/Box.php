<?php

namespace App;

use App\Abstraction\Animal;
use App\Abstraction\ParameterParser;

class Box
{
    public $color; //color of box
    //const SQUARE = 1200; //square of box is 1200
    public static $current_space = 0; //initial space when we have add pets in box yet
    const LIMIT_OF_CRAP = 200; //limit of excrement, if excrement is more than, this it needed to be cleaned
    public $petInBox = []; // pets which are in box
    public $catInBox = 0; //counter for cats that are in box
    public $dogInBox = 0; //counter for dogs that are in box
    public $all_craps= []; //save object of craps of pets that are in box and have crap
    public $sum_of_craps; //sum of excrement
    public static $squareOfBox;

    public function __construct($squareOfBox)
    {
        $this::$squareOfBox = $squareOfBox;
    }

    public function hasPlace($pet) {
        if ($pet->square + $this::$current_space <= self::$squareOfBox) { //sum of squares of each pets must be
            $this::$current_space = $pet->square + $this::$current_space;//change the current space of box
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param Animal $pet
     */
    public function addPets($pet)
    {
        /**
         * Array Sort by square(asc) to put as much as possible pets to box
         */
            array_push($this->petInBox, $pet);
            $pet->isPetInBox = 1;

            if ($pet instanceof Cat) {
                $this->catInBox++;
            } else {
                $this->dogInBox++;
            }
    }

    /**
     * pets in box go to toilet and make a crap
     * @return void
     */
    public function petsDoToilet() :void
    {

        /** @var Animal $pet */
        foreach ($this->petInBox as $pet) {
            //$this->all_craps = array_merge($this->all_craps, $pet->toilet());
            foreach ($pet->toilet() as $crap) {
                array_push($this->all_craps,$crap);
            }
        }
        var_dump($this->all_craps);
    }

    /**
     * @return bool
     * check is box need clear
     */
    public function isNeedClear():bool
    {
        $sumOfCraps = array_reduce($this->all_craps, function ($sum, $crap) {
            /** @var Crap $crap */
            return $sum + $crap->amount_of_crap;
        }, 0);
//
//        echo "<br/>"; ----- through array_map
//        echo array_sum(array_map(function($crap) {
//            return $crap->amount_of_crap;
//        }, $this->all_craps));
//
//        echo "<br/>"; ----- primitive way
//        $sum = 0;
//        foreach ($this->all_craps as $crap) {
//            $sum += $crap->amount_of_crap;
//        }
//        echo $sum;

        if ($sumOfCraps >= self::LIMIT_OF_CRAP) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return void
     * clear all craps from box
     */
    public function clearCrap(): void
    {
        $this->all_craps = [];
    }
}
