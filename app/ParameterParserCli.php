<?php

namespace App;

use App\Interfaces\IParameterParser;

class ParameterParserCli implements IParameterParser
{
    /** @var int number of dog*/
    protected $amountOfDog = 0;

    /** @var int number of cat */
    protected $amountOfCat = 0;

    /** @var int square of box*/
    protected $squareOfBox = 0;

    /**
     * ParameterParserHtml constructor.
     * get input data for html
     */
    public function __construct()
    {
        $longopts = array ("puppy_count::", "kitty_count::", "box_square::",);
        $parameters = getopt("",$longopts);

        $this->amountOfDog = $this->checkExistence($parameters['puppy_count']);
        $this->amountOfCat = $this->checkExistence($parameters['kitty_count']);
        $this->squareOfBox = $this->checkExistence($parameters['box_square']);
    }

    public function checkExistence($parameter)
    {
        if (isset($parameter)) {
            return $parameter;
        }
    }

    /**
     * get number of dog(s)
     * @return int
     */
    public function getDogAmount(): int
    {
        return $this->amountOfDog;
    }

    /**
     * get number of cat(s)
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