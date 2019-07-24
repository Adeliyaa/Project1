<?php

namespace App;

class Box
{
    public $color;
    const SQUARE = 1200;
    public $current_space = 0;
    const LIMIT_OF_CRAP = 200;
    public $petInBox = [];
    public $petNotInBox= [];
    public $all_craps= [];
    public $sum_of_craps;

    public function addAnimals($pets = [])
    {
        /**
         * Array Sort by square(asc) to put as much as possible pets to box
         */
        $squares = [];
        foreach ($pets as $my_object) {
            $squares[] = $my_object->square; //any object field
        }

        array_multisort($squares, SORT_ASC, $pets);


        foreach ($pets as $my_object) {
            if ($my_object->square + $this->current_space <= self::SQUARE) { //sum of squares of each pets must be
                //less or equal to SQUARE of box
                array_push($this->petInBox, $my_object); //if sum is <= square of box then add the array of petInBox
                $my_object->isPetInBox = 1;
            }
            $this->current_space = $my_object->square + $this->current_space;//change the current space of box
            //when we add each pet
        }

        /**
         * Pets which are in box
         */

        echo "Pets which are in box:";
        foreach ($this->petInBox as $my_pet) {
            //var_dump($my_pet); //any object field
            echo $my_pet->square." ".$my_pet->name;
            echo "<br>";
        }
        echo "# of pets which are in box:".sizeof($this->petInBox);
        echo "<br>";

        /**
         * Pets which are not in box
         * their isPetInBox mode is 0
         */
        foreach ($pets as $my_object) {
            if ($my_object->isPetInBox == 0) {
                array_push($this->petNotInBox, $my_object);
            }
        }

        echo "Pets which are not in box: ";
        foreach ($this->petNotInBox as $my_pet) {
            //var_dump($my_pet)." "; //any object field
            echo $my_pet->square." ".$my_pet->name;
            echo "<br>";
        }
        echo "# of pets which are not in box :".sizeof($this->petNotInBox);
    }

    /**
     * by @param $id_of_animal will be take away of pets from box cause id is unique
     */
    public function takeAnimals($id_of_animal)
    {
        foreach ($this->petInBox as $key => $petInBox) { //check if this pet with @param $id_of_animal is in box, if yes then take away from box
            if ($petInBox->id_of_animal == $id_of_animal) {
//                array_filter($petInBox, function($petInBox) use ($id_of_animal) { return $petInBox->id_of_animall === $id_of_animal; });
                unset($this->petInBox, $key);
                echo "The pet with id ".$petInBox->id_of_animal. "is taken out of box!";
                return;
            }
        }
        echo "This animal is already out of box!";
    }

    /**
     * Represent all pets which are in box
     */
    public function showAnimals()
    {
        echo "Pets which are in box:";
        echo "<br>";
        foreach ($this->petInBox as $my_pet) {
            //var_dump($my_pet); //any object field
            echo $my_pet->name. " with id ". $my_pet->id_of_animal;
            echo "<br/>";
        }
    }

    /**
     * CLear all excrement from box
     */
    public function clearCrap()
    {
        $sum_of_craps = array_sum($this->all_craps); //all_craps is array which save all excrement of pets which got a food
        if ($sum_of_craps > self::LIMIT_OF_CRAP) {
            echo "Box is needed to be cleared!";
        } else {
            echo "Box can be left without clearing! ";
        }
    }
}
