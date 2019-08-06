<?php

namespace App;

use App\Abstraction\Animal;

class Box
{
    private static $current_space = 0; // free space in box
    const LIMIT_OF_CRAP = 200; //limit of excrement in box
    public $petInBox = []; // pets which are in box
    public $all_craps= []; // save object of pet's crap in box
    public static $squareOfBox;

    /**
     * Box constructor.
     * @param $squareOfBox
     */
    public function __construct($squareOfBox)
    {
        $this::$squareOfBox = $squareOfBox;
    }


    /**
     * Check is box has extra place for putting pets in it
     * @param Animal $pet
     * @return bool
     */
    public function hasPlace($pet) {
        if ($pet->getPetSquare() + $this::$current_space <= self::$squareOfBox) { //sum of squares of each pets must be
            $this::$current_space = $pet->getPetSquare() + $this::$current_space;//change the current space of box
            return true;
        } else {
            return false;
        }
    }

    /**
     * Add pets to Box
     * @param Animal $pet
     */
    public function addPets($pet)
    {
        /**
         * Array Sort by square(asc) to put as much as possible pets to box
         */
            array_push($this->petInBox, $pet);
            $pet->isPetInBox = 1;
    }

    /**
     * get amount of dog(s) in box
     * @return int
     */
    public function getCatCount() :int
    {
        $catInBox = 0;
        foreach ($this->petInBox as $petInBox) {
            if ($petInBox instanceof Cat) {
                $catInBox++;
            }
        }
        return $catInBox;
    }

    /**
     * get amount of cat(s) in dog
     * @return int
     */
    public function getDogCount() :int
    {
        $dogInBox = 0;
        foreach ($this->petInBox as $petInBox) {
            if ($petInBox instanceof Dog) {
                $dogInBox++;
            }
        }
        return $dogInBox;
    }

    /**
     * Pets in box go to toilet and make a crap
     * @return void
     */
    public function petsDoToilet() :void
    {
        /** @var Animal $pet */
        foreach ($this->petInBox as $pet) {
            foreach ($pet->toilet() as $crap) {
                array_push($this->all_craps,$crap);
            }
        }
    }

    /**
     * Do sum of all amount of craps in box
     * @return int
     */
    public function getCrapAmount() :int
    {
        $sumOfCraps = array_reduce($this->all_craps, function ($sum, $crap) {
            /** @var Crap $crap */
            return $sum + $crap->getExcrement();
        }, 0);
        return $sumOfCraps;
    }

    /**
     * Check is box need clear
     * @return bool
     */
    public function isNeedClear():bool
    {
        if ($this->getCrapAmount() >= self::LIMIT_OF_CRAP) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Clear all craps from box
     * @return void
     */
    public function clearCrap(): void
    {
        $this->all_craps = [];
    }
}
