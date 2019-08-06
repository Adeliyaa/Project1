<?php

namespace App;

class RoomPresenter
{
    /** @var Room $room */
    public $room ;

    /**
     * RoomPresenter constructor.
     * @param $room
     */
    public function __construct($room) {
        $this->room = $room;
    }

    /**
     * @return string
     * get number of pets in Room
     */
    public function getPetInRoom() :string
    {
        return "Number of pets in room: ".count($this->room->petInRoom);
    }

    /**
     * get number of cats in Room
     * @return string
     */
    public function getCatsInRoom() :string
    {
        return "Number of cats in room: ".$this->room->getCatCount();
    }

    /**
     * get number of dogs in Room
     * @return string
     */
    public function getDogsInRoom() :string
    {
        return "Number of dogs in room: ".$this->room->getDogCount();
    }

    /**
     * check is room need clear
     * @return string
     */
    public function isNeedClear() :string
    {
        if ($this->room->isNeedClear()) {
            return "Room is need clear!";
        } else {
            return "Room is not need clear!";
        }
    }
}
