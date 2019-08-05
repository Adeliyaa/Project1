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
     * @return int amount of dog
     */
    public function getDogAmount():int ;

    /**
     * @return int amount of cat
     */
    public function getCatAmount():int ;

    /**
     * @return int square of box
     */
    public function getBoxSquare():int ;
}