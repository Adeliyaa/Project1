<?php

namespace App;

use App\Interfaces\IParameterParser;

class ParameterParserCli implements IParameterParser
{
    /** @var int number of dog*/
    protected $puppy_count = 0;

    /** @var int number of cat */
    protected $kitty_count = 0;

    /** @var int square of box*/
    protected $box_square  = 0;

    /** @var array store parameters */
    public $params = ['puppy_count::','kitty_count::','box_square::'];

    /**
     * ParameterParserHtml constructor.
     * get input data for html
     */
    public function __construct()
    {
        foreach ($this->params as $param) {
            $param        = str_replace(':', '', $param);
            $this->$param = $this->checkExistence($param);
        }
    }

    /**
     * check existence of parameter
     * @param $parameter
     * @return mixed|null
     */
    public function checkExistence($param)
    {
        $parameters = getopt("",$this->params);

        if (isset($parameters[$param])) {
            return $parameters[$param];
        } else {
            return Config::get($param);
        }
    }

    /**
     * get number of dog(s)
     * @return int
     */
    public function getDogAmount(): int
    {
        return $this->puppy_count;
    }

    /**
     * get number of cat(s)
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
