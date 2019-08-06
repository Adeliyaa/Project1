<?php

namespace App\Interfaces;

interface IParameterParser
{
    /**
     * get input data
     * return array
    */
    public function __construct();

    /**
     * get amount of dog
     * @return int
     */
    public function getDogAmount():int ;

    /**
     * get amount of cat
     * @return int
     */
    public function getCatAmount():int ;

    /**
     * get square of box
     * @return int
     */
    public function getBoxSquare():int ;
}
