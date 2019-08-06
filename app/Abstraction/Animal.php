<?php

namespace App\Abstraction;

use App\Crap;
use App\Food;
use App\Interfaces\IAnimal;
use Generator;

abstract class Animal implements IAnimal
{
    /** @var string the breed of animal */
    protected $breed;

    /** @var int age of animal */
    protected $age;

    /** @var string gender of animal */
    protected $gender;

    /** @var string color of animal */
    protected $color;

    /** @var string name of animal */
    protected $name;

    /** @var int square of animal */
    protected $square;

    /** @var array stomach of each pet  */
    protected $stomach = [];

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
     * get voice of pets
     * @return string
     */
    abstract public function voice(): string ;

    /**
     * get if pets are crawl
     * @return bool
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
     * get stomach of each pet
     * @return array
     */
    public function getStomachArr():array
    {
        return $this->stomach;
    }

    /**
     * Allocate feed to pets
     * @var Food const $amount_of_feed
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

