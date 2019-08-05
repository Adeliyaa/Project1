<?php


namespace App;


use App\Abstraction\Animal;

class BoxPresenter
{
    /** @var Box $box */
    public $box ;
    public function __construct($box) {
        $this->box = $box;
    }
    public function getPetsInBox() {
        $petsInBox= "Number of pets in box: ".count($this->box->petInBox);
        return $petsInBox;
    }

    public function getCatsInBox() {
        $catInBox= "Number of cats in box: ".$this->box->catInBox;
        return $catInBox;

    }

    public function getDogsInBox() {
        $dogInBox= "Number of dogs in box: ".$this->box->dogInBox;
        return $dogInBox;

    }

    public function isNeedClear()
    {
        if ($this->box->isNeedClear()) {
            return "Box is need clear!";
        } else {
            return "Box is not need clear!";
        }
    }


}