<?php

namespace App;

use App\Interfaces\IParameterParser;

class ParameterParserHtml implements IParameterParser
{
    /** @var int number of dogs */
    protected $amountOfDog = 0;

    /** @var int number of cats */
    protected $amountOfCat = 0;

    /** @var int square of box */
    protected $squareOfBox = 0;

    /**
     * ParameterParserHtml constructor.
     * get input data for html
     */
    public function __construct()
    {
        if (isset ($_GET['puppy_count'])) {
            $this->amountOfDog = $_GET['puppy_count'];
        }

        if(isset($_GET['kitty_count'])) {
            $this->amountOfCat = $_GET['kitty_count'];
        }

        if(isset($_GET['box_square'])) {
            $this->squareOfBox = $_GET['box_square'];
        }
    }

    /**
     * get number of dogs
     * @return int
     */
    public function getDogAmount(): int
    {
        return $this->amountOfDog;
    }

    /**
     * get number number of cats
     * @return int
     */
    public function getCatAmount(): int
    {
        return $this->amountOfCat;
    }

    /**
     * get square of box
     * @return int
     */
    public function getBoxSquare(): int
    {
        return $this->squareOfBox;
    }
}