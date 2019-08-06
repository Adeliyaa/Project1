<?php

namespace App;

use App\Abstraction\Animal;

class Room
{
    public $petInRoom= []; // pets which are not in box
    public $all_craps = [];
    const LIMIT_OF_CRAP = 300; //limit of excrement, if excrement is more than, this it needed to be cleaned

    /**
     * add pets to room
     * @param $pet
     */
    public function addPets($pet)
    {
        array_push($this->petInRoom, $pet);
    }

    /**
     * pets in room go to toilet and make a crap
     * @var Animal $pet
     * @return void
     */
    public function petsDoToilet() :void
    {
        foreach ($this->petInRoom as $pet) {
            //$this->all_craps = array_merge($this->all_craps, $pet->toilet());
            $craps = $pet->toilet();
            foreach ($craps as $crap) {
                array_push($this->all_craps, $crap);
            }
        }
    }

    /**
     * get amount of dog(s) in room
     * @return int
     */
    public function getCatCount() :int
    {
        $catInRoom = 0;
        foreach ($this->petInRoom as $petInRoom) {
            if ($petInRoom instanceof Cat) {
                $catInRoom++;
            }
        }
        return $catInRoom;
    }

    /**
     * get amount of cat(s) in room
     * @return int
     */
    public function getDogCount() :int
    {
        $dogInRoom = 0;
        foreach ($this->petInRoom as $petInRoom) {
            if ($petInRoom instanceof Dog) {
                $dogInRoom++;
            }
        }
        return $dogInRoom;
    }

    /**
     * @return int
     * Do sum of all amount of craps in room
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
     * @return bool
     * check is room need clear
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
     * clear all craps which are in Room
     */
    public function clearCrap() :void
    {
        $this->all_craps = [];
    }
}