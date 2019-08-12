<?php

namespace App;

use App\Abstraction\Animal;

class Box
{
    /** @var int free space in box */
    private static $current_space;

    /** @var int limit of excrement in box*/
    private static $box_limit_crap;

    /** @var array pets which are in box */
    private $petInBox = [];

    /** @var array storage of pet's crap in box */
    private $all_craps= [];

    /** @var int square of box */
    protected static $squareOfBox;

    /**
     * Box constructor.
     * @param $squareOfBox
     */
    public function __construct($squareOfBox)
    {
        self::$squareOfBox    = $squareOfBox;
        self::$box_limit_crap = Config::get('box_limit_crap');
        self::$current_space  = Config::get('current_space');
    }

    /**
     * get pets that are in box
     * @return array
     */
    public function getPetInBoxArr() :array
    {
        return $this->petInBox;
    }

    /**
     * check is box has extra place for putting pets in it
     * @param Animal $pet
     * @return bool
     */
    public function hasPlace($pet)
    {
        if ($pet->getPetSquare() + $this::$current_space <= self::$squareOfBox) {
            $this::$current_space = $pet->getPetSquare() + $this::$current_space;
            return true;
        } else {
            return false;
        }
    }

    /**
     * add pets to Box
     * @param Animal $pet
     */
    public function addPets($pet)
    {
        /** Array Sort by square(asc) to put as much as possible pets to box */
            array_push($this->petInBox, $pet);
    }

    /**
     * calculate the number of potential pets that can be added to box
     * @return float
     */
    public function numOfPotentialPets()
    {
        $extraPlace  = self::$squareOfBox - $this::$current_space;
        $extraPetNum = floor($extraPlace/150);

        return $extraPetNum;
    }

    /**
     * Check is box can add extra pet
     * @return float|int
     */
    public function canAddExtraPet()
    {
        if ($this->numOfPotentialPets() >= 1) {
            return $this->numOfPotentialPets();
        } else {
            return 0;
        }
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
     * pets in box go to toilet and make a crap
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
     * do sum of all amount of craps in box
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
        if ($this->getCrapAmount() >= self::$box_limit_crap) {
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
