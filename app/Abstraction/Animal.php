<?php

namespace App\Abstraction;

use App\Crap;
use App\Food;
use App\Interfaces\IAnimal;
use Generator;

abstract class Animal implements IAnimal
{
    protected $breed; //the breed of animal
    protected $age; //age og animal
    protected $gender; //gender of animal
    protected $color; //color of animal
    protected $name;//name of animal
    protected $square; //square of animal
    public static $current_feed = 0; //static due to current feed must change for all object to compare amount of feed which is constant
    public $isPetInBox = 0; //determine is pet or animal in box
    public $stomach = [];

    /**
     * Animal constructor.
     * @param $breed
     * @param $age
     * @param $gender
     * @param $color
     * @param $name
     * @param $square
     */
    public function __construct($breed, $age, $gender, $color, $name, $square)
    {
        $this->breed = $breed;
        $this->age = $age;
        $this->gender = $gender;
        $this->color = $color;
        $this->name = $name;
        $this->square = $square;
    }

    /**
     * @return string
     * get voice of pets
     */
    abstract public function voice(): string ;

    /**
     * @return bool
     * get if pets are crawl
     */
    abstract public function crawl(): bool;

    /**
     * get square of pet
     * @return mixed
     */
    public function getPetSquare()
    {
        return $this->square;
    }

    /**
     * Allocate feed to pets
     * @var Food const $amount_of_feed
     * @return
     */
    public function eat(Food $food)
    {
        array_push($this->stomach, $food);
    }

    /**
     * Toilet generate crap
     * @return Generator
     */
    public function toilet(): Generator
    {
        while(!empty($this->stomach)) {
            yield new Crap(array_pop($this->stomach));
        }
    }
}

