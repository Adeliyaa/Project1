<?php

namespace App;

class BoxPresenter
{
    /** @var Box $box */
    public $box ;

    /**
     * BoxPresenter constructor.
     * @param $box
     */
    public function __construct($box)
    {
        $this->box = $box;
    }

    /**
     * get number of pets in Box
     * @return string
     */
    public function getPetsInBox() :string
    {
        return "Number of pets in box: ".count($this->box->petInBox);
    }

    /**
     * get number of cats in Box
     * @return string
     */
    public function getCatsInBox() :string
    {
        return "Number of cats in box: ".$this->box->getCatCount();
    }

    /**
     * get number of dogs in Box
     * @return string
     */
    public function getDogsInBox() :string
    {
        return "Number of dogs in box: ".$this->box->getDogCount();
    }

    /**
     * check is box need clear
     * @return string
     */
    public function isNeedClear() :string
    {
        if ($this->box->isNeedClear()) {
            return "Box is need clear!";
        } else {
            return "Box is not need clear!";
        }
    }
}
