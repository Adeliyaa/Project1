<?php

namespace App;

use App\Interfaces\IParameterParser;

class ParameterParserHtml implements IParameterParser
{
    /** @var int number of dogs */
    protected $puppy_count;

    /** @var int number of cats */
    protected $kitty_count;

    /** @var int square of box */
    protected $box_square;

    /** @var array store parameters */
    public $parameters = ['puppy_count','kitty_count','box_square'];

    /**
     * parameterParserHtml constructor.
     * get input data for html
     */
    public function __construct()
    {
        foreach ($this->parameters as $parameter) {
            $this->$parameter = $this->checkExistence($parameter);
        }
    }

    /**
     * check existence of parameter
     * @param $parameter
     * @return mixed
     */
    public function checkExistence($parameter)
    {
        if (isset($_GET[$parameter])) {
            return $_GET[$parameter];
        } else {
            return Config::get($parameter);
        }
    }

    /**
     * get number of dogs
     * @return int
     */
    public function getDogAmount(): int
    {
        return $this->puppy_count;
    }

    /**
     * get number number of cats
     * @return int
     */
    public function getCatAmount(): int
    {
        return $this->kitty_count;
    }

    /**
     * get square of box
     * @return int
     */
    public function getBoxSquare(): int
    {
        return $this->box_square;
    }
}
