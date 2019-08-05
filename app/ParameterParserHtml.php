<?php


namespace App;

use App\Interfaces\IParameterParser;

class ParameterParserHtml implements IParameterParser
{
    protected $amountOfDog = 0;
    protected $amountOfCat = 0;
    protected $squareOfBox = 0;
    /**
     * ParameterParserHtml constructor.
     * get input data for html
     */

    public function __construct()
    {
        if (isset ($_GET['puppy_count'])) {
            $this->amountOfDog = $_GET['puppy_count'];
        } else {
            $this->amountOfDog = 0;
        }
        if(isset($_GET['kitty_count'])) {
            $this->amountOfCat = $_GET['kitty_count'];
        } else {
            $this->amountOfCat = 0;
        }
        if(isset($_GET['box_square'])) {
            $this->squareOfBox = $_GET['box_square'];
        } else {
            $this->squareOfBox = 0;
        }
    }

    public function getDogAmount(): int
    {
        return $this->amountOfDog;
    }

    public function getCatAmount(): int
    {
        return $this->amountOfCat;
    }

    public function getBoxSquare(): int
    {
        return $this->squareOfBox;
    }
}