<?php
namespace App\Abstraction;


use App\Crap;
use App\Interfaces\IAnimal;

abstract class Animal implements IAnimal
{
    protected $breed; //the breed of animal
    protected $age; //age og animal
    protected $gender; //gender of animal
    protected $color;
    public $name;
    public $square;
    public $satiety;
    public $max_satiety;
    public $isPetInBox = 0;
    public $needFood;
    public static $current_feed = 0; //static due to current feed must change for all object
    public $isSatiety = 0;
    public $excrement= [];
    public $id_of_animal;
    public static $petBoxHungry = 0;
    public static $petBoxNotHungry = 0;
    public static $petNotBoxHungry = 0;
    public static $petNotBoxNotHungry = 0;

    public function __construct($id_of_animal, $breed, $age, $gender, $color, $name, $square, $satiety, $max_satiety)
    {
        $this->id_of_animal = $id_of_animal;
        $this->breed = $breed;
        $this->age = $age;
        $this->gender = $gender;
        $this->color = $color;
        $this->name = $name;
        $this->square = $square;
        $this->satiety = $satiety;
        $this->max_satiety = $max_satiety;
    }

    abstract public function voice(): void;

    abstract public function crawl(): bool;

    abstract public function getExcrementsMass(): float;

    /**
     * allocate feed (which is constant) to pets
    */

    public function eat($amount_of_feed)
    {
            if ($this->needFood + self::$current_feed <= $amount_of_feed) { //sum of squares of each pets must be less or equal to SQUARE of box
                $this->isSatiety = 1;
                if ($this->isPetInBox == 0)
                {
                    $this::$petBoxNotHungry++;
                } else {
                    $this::$petBoxNotHungry++;
                }
                self::$current_feed = $this->needFood + self::$current_feed; //change the current feed of box when we add each pet
            } else {
                if ($this->isPetInBox == 0)
                {
                    $this::$petNotBoxHungry++;
                } else {
                    $this::$petBoxHungry++;
                }
            }
            //self::$current_feed = $this->needFood + self::$current_feed; //change the current feed of box when we add each pet
    }

    /**
     * Toilet checks is pet in satiety
     * if yes , then it will make excrement(crap)
    */

    public function toilet()
    {
        return $this->isSatiety == 1 ? new Crap($this->max_satiety * $this->getExcrementsMass()) : null;
    }
}
