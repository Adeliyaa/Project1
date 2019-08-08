<?php

namespace App;

use App\Abstraction\Animal;

class Room
{
    /** @var array pet that are in room */
    private $petInRoom= [];

    /** @var array storage for craps */
    private $all_craps = [];

    /** @var int limit of excrement */
    private static $room_limit_crap;

    /**
     * Room constructor.
     */
    public function __construct()
    {
        self::$room_limit_crap = Config::get('room_limit_crap');
    }

    /**
     * get pets that are in Room
     * @return array
     */
    public function getPetInRoomArr():array
    {
        return $this->petInRoom;
    }

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
     * do sum of all amount of craps in room
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
     * check is room need clear
     * @return bool
     */
    public function isNeedClear():bool
    {
        if ($this->getCrapAmount() >= self::$room_limit_crap) {
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
