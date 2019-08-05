<?php


namespace App;


use App\Interfaces\IParameterParser;

class ParameterParserCli implements IParameterParser
{
    /**
     * @var int
     */
    protected $amountOfDog = 0;
    /**
     * @var int
     */
    protected $amountOfCat = 0;
    /**
     * @var int
     */
    protected $squareOfBox = 0;

    /**
     * ParameterParserHtml constructor.
     * get input data for html
     */

    public function __construct()
    {
        $longopts = array ("puppy_count::", "kitty_count::", "box_square::",);
        $parameters = getopt("",$longopts);
        if (isset ($parameters['puppy_count'])) {
            $this->amountOfDog = $parameters['puppy_count'];
        } else {
            $this->amountOfDog = 0;
        }
        if(isset($parameters['kitty_count'])) {
            $this->amountOfCat = $parameters['kitty_count'];
        } else {
            $this->amountOfCat = 0;
        }
        if(isset($parameters['box_square'])) {
            $this->squareOfBox = $parameters['box_square'];
        } else {
            $this->squareOfBox = 1200;
        }
    }
//    public function getAmount() {
//        //in longopts saves all keys which we give the value in terminal
//        $longopts = array ("puppy_count::", "kitty_count::", "box_square::",);
//        // :: mean Необязательное значение, if just : means required , if do not write anything , it is error
//        $this->stuffAmount = getopt("", $longopts);  // the first parameter for one symbol keys, we need keys which are more than one symbol, so we do "", and write in longopts
//    }
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