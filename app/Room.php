<?php


namespace App;


use App\Abstraction\Animal;

class Room
{
    public $petInRoom= []; // pets which are not in box
    public $catInRoom = 0; //cats that are not in box
    public $dogInRoom = 0; //dogs that are not in box
    public $all_craps = [];
    const LIMIT_OF_CRAP = 300; //limit of excrement, if excrement is more than, this it needed to be cleaned


    public function addPets($pet)
    {
        array_push($this->petInRoom, $pet);
        if ($pet instanceof Cat) {
            $this->catInRoom++;
        } else {
            $this->dogInRoom++;
        }
    }

    /**
     * pets in box go to toilet and make a crap
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
     * @return bool
     * check is box need clear
     */
    public function isNeedClear():bool
    {
        $sumOfCraps = array_reduce($this->all_craps, function ($sum, $crap) {
            /** @var Crap $crap */
            return $sum + $crap->amount_of_crap;
        }, 0);

        if ($sumOfCraps >= self::LIMIT_OF_CRAP) {
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