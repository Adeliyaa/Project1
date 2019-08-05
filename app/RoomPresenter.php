<?php


namespace App;


class RoomPresenter
{
    /** @var Room $room */
    public $room ;
    public function __construct($room) {
        $this->room = $room;
    }
    public function getPetInRoom() {
        $petInRoom= "Number of pets in room: ".count($this->room->petInRoom);
        return $petInRoom;
    }

    public function getCatsInRoom() {
        $catsInRoom= "Number of cats in room: ".$this->room->catInRoom;
        return $catsInRoom;

    }

    public function getDogsInRoom() {
        $dogsInRoom= "Number of dogs in room: ".$this->room->dogInRoom;
        return $dogsInRoom;

    }

    public function isNeedClear()
    {
        if ($this->room->isNeedClear()) {
            return "Box is need clear!";
        } else {
            return "Box is not need clear!";
        }
    }
}