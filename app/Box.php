<?php

namespace App;

class Box
{
    public $color; //color of box
    const SQUARE = 1200; //square of box is 1200
    public static $current_space = 0; //initial space when we have add pets in box yet
    const LIMIT_OF_CRAP = 200; //limit of excrement, if excrement is more than, this it needed to be cleaned
    public $petInBox = []; // pets which are in box
    public $petNotInBox= []; // pets which are not in box
    public $catInBox = 0; //counter for cats that are in box
    public $dogInBox = 0; //counter for dogs that are in box
    public $catNotInBox = 0; //cats that are not in box
    public $dogNotInBox = 0; //dogs that are not in box
    public $all_craps= []; //save object of craps of pets that are in box and have crap
    public $sum_of_craps; //sum of excrement
    public $catNotAddedBox = 0;
    public $dogNotAddedBox = 0;
    public $catCanAddedBox = 0;
    public $dogCanAddedBox = 0;

    public function addAnimals($pets = [],$quantity = [])
    {
        $puppy_count = $quantity['puppy_count'];
        $kitty_count = $quantity['kitty_count'];

        /**
         * Array Sort by square(asc) to put as much as possible pets to box
         */
        $squares = [];
        foreach ($pets as $my_object) {
            $squares[] = $my_object->square; //any object field
        }

        array_multisort($squares, SORT_ASC, $pets);


        foreach ($pets as $my_object) {
            if ($my_object->square + $this::$current_space <= self::SQUARE) { //sum of squares of each pets must be
                //less or equal to SQUARE of box

                if ($my_object instanceof Cat) {
                    if ($this->catInBox < $kitty_count) {
                        array_push($this->petInBox, $my_object);
                        $this->catInBox++;
                        $my_object->isPetInBox = 1;
                        $this::$current_space = $my_object->square + $this::$current_space;//change the current space of box
                    }
                }

                if ($my_object instanceof Dog) {
                    if ($this->dogInBox < $puppy_count) {
                        array_push($this->petInBox, $my_object);
                        $this->dogInBox++; //if sum is <= square of box then add the array of petInBox
                        $my_object->isPetInBox = 1;
                        $this::$current_space = $my_object->square + $this::$current_space;//change the current space of box
                    }
                }
            }
        }

        $this->catNotAddedBox = $kitty_count-$this->catInBox;
        $this->dogNotAddedBox = $puppy_count-$this->dogInBox;


        /**
         * Pets which are not in box
         * their isPetInBox mode is 0
         */
        foreach ($pets as $my_object) {
            if ($my_object->isPetInBox == 0) {
                array_push($this->petNotInBox, $my_object);
            }
        }


            foreach ($this->petNotInBox as $petNotInBox) {
                if ($petNotInBox->square + $this::$current_space <= self::SQUARE) {
                    if ($petNotInBox instanceof Cat) {
                        $this->catCanAddedBox++;
                    }
                    if ($petNotInBox instanceof Dog) {
                        $this->dogCanAddedBox++;
                    }
                    $this::$current_space = $petNotInBox->square + $this::$current_space;//change the current space of box
                }
            }


        foreach ($pets as $my_object) {
            if ($my_object->isPetInBox == 0) {
                if ($my_object instanceof Cat) {
                    $this->catNotInBox++;
                }
                if ($my_object instanceof Dog) {
                    $this->dogNotInBox++;
                }
            }
        }
//
//        foreach ($pets as $my_object) {
//            if ($my_object instanceof Cat) {
//                    if ($my_object->isPetInBox == 0) {
//                        if (count($this->catInBox) <= $kitty_count) {
//                            array_push($this->catInBox, $my_object);
//                        }
//                        elseif ($my_object->isPetInBox == 1) {
//                            array_push($this->catNotInBox, $my_object);
//                        }
//                    }
//            }
//            if ($my_object instanceof Dog) {
//                if ($my_object->isPetInBox == 0) {
//                    array_push($this->dogInBox, $my_object);
//                }
//                elseif ($my_object->isPetInBox == 1) {
//                    array_push($this->dogNotInBox, $my_object);
//                }
//            }
//        }


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
                //echo "The pet with id ".$petInBox->id_of_animal. "is taken out of box!";
                return;
            }
        }
        //echo "This animal is already out of box!";
    }

    /**
     * Represent all pets which are in box
     */
    public function showAnimals()
    {
        foreach ($this->petInBox as $my_pet) {
            //var_dump($my_pet); //any object field
//            echo $my_pet->name. " with id ". $my_pet->id_of_animal;
//            echo "<br/>";
        }
    }

    /**
     * CLear all excrement from box
     */
    public function clearCrap()
    {
        $sum_of_craps = array_sum($this->all_craps); //all_craps is array which save all excrement of pets which get a food and are in box
        if ($sum_of_craps > self::LIMIT_OF_CRAP) {
            return 1;
        } else {
            return 0;
        }
    }
}
