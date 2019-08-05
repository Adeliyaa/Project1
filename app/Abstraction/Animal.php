<?php
namespace App\Abstraction;


use App\Box;
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
    public $name;//name of animal
    public $square; //square of animal
    public $max_satiety;//when animal get food, it reaches max satiety
    public static $current_feed = 0; //static due to current feed must change for all object to compare amount of feed which is constant
    public $isSatiety = 0; //condition of satiety
    public $isPetInBox = 0; //determine is pet or animal in box
    public $stomach=[];


    public function __construct($breed, $age, $gender, $color, $name, $square, $max_satiety)
    {
        $this->breed = $breed;
        $this->age = $age;
        $this->gender = $gender;
        $this->color = $color;
        $this->name = $name;
        $this->square = $square;
        $this->max_satiety = $max_satiety;
    }

    abstract public function voice(): void;

    abstract public function crawl(): bool;

    /**
     * Allocate feed to pets
     * @var Food const $amount_of_feed
     * @return
     */
    public function eat(Food $food)
    {
            array_push($this->stomach, $food);

//            /** @var Food $foodFromArr */
//            $foodFromArr = array_filter($this->stomach, function ($foodEl) use ($food) {
//                /** @var Food $foodEl */
//                return $foodEl->amount_of_feed === $food->amount_of_feed;
//            })[0] ?? null;

//            if($foodFromArr !== null && $foodFromArr->amount_of_feed >= $this->max_satiety )
//            {
//                $this->isSatiety = 1;
//            }
    }

    /**
     * Toilet generate crao if pets
     * @return Generator
     */

    public function toilet(): Generator
    {
        while(!empty($this->stomach)) {
            yield new Crap(array_pop($this->stomach));
        }
    }
}
