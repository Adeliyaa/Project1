<?php

namespace App;

class Application
{

    public function start()
    {

        $output = [];
        require 'vendor/autoload.php';
        $box = new \App\Box();
        $pets = [
            new \App\Cat('1', 'abyssinian cat', '4', 'female', 'yellow', 'Bobby', '120', '140', '170'),
            new \App\Cat('2', 'american Bobtail', '6', 'male', 'Black', 'Ilya', '145', '156', '190'),
            new \App\Cat('3', 'american curl', '8', 'male', 'cream', "Bolatbek", "280", '200', '250'),
            new \App\Cat('4', 'american shorthair', '4', 'female', 'Gold', 'Sasha', '187', '138', '150'),
            new \App\Cat('5', 'american wirehair', '8', 'female', 'red', 'John', '540', '290', '300'),
            new \App\Cat('6', 'birlman cat', '3', 'male', 'brown', 'Greg', '450', '300', '300'),
            new \App\Cat('7', 'chartreux cat', '5', 'male', 'silver', 'Serzhan', '390', '400', '400'),
            new \App\Dog('8', 'pitbul', '4', 'female', 'yellow', 'Tom', '120', '140', '170'),
            new \App\Dog('9', 'pitbul', '4', 'female', 'yellow', 'Bobby', '120', '140', '300'),
            new \App\Dog('10', 'pitbul', '6', 'male', 'Black', 'Ilya', '145', '156', '180'),
            new \App\Dog('11', 'pitbul', '4', 'female', 'Gold', 'Sasha', '187', '138', '230'),
            new \App\Dog('12', 'pitbul', '5', 'male', 'silver', 'Serzhan', '390', '400', '410'),
            new \App\Dog('13', 'pitbul', '3', 'male', 'brown', 'Greg', '450', '300', '320'),
            new \App\Dog('14', 'pitbul', '4', 'female', 'Gold', 'Sasha', '187', '138', '150')
        ];

//function sort_objects_by_total($a, $b) {
//    if($a->square == $b->square){ return 0 ; }
//    return ($a->square < $b->square) ? -1 : 1;
//}
//
//usort($pets, 'sort_objects_by_total');

//$squares = array();
//foreach ($pets as $my_object) {
//    $squares[] = $my_object->square; //any object field
//}
//
//array_multisort($squares, SORT_ASC, $pets);
//
////return $pets;
//
//foreach ($pets as $my_object) {
//    echo $my_object->square; //any object field
//    echo '  ';
//}


//var_dump($pets);

        $box->addAnimals($pets);
//        echo count($box->petInBox);
//        echo count($box->petNotInBox);
//        echo count($box->dogInBox);
//        echo count($box->dogNotInBox);

        $output['#petsInBox']=count($box->petInBox);
        $output['#petsNotInBox'] = count($box->petNotInBox);
        $output['#dogInBox']=count($box->dogInBox);
        $output['#dogNotInBox']=count($box->dogNotInBox);
        $output['#catInBox']=count($box->catInBox);
        $output['#catNotInBox']=count($box->catNotInBox);

        /**
         * Calculate how much food needs for pets
         */
        foreach ($pets as $pet) {
            $pet->needFood = $pet->max_satiety - $pet->satiety;
        }

        /**
         * Sort pets by need foods to distribute foods to pets and as much as possible pets got food
         */
        usort($pets, function ($first_pet, $second_pet) {
            return $first_pet->needFood > $second_pet->needFood;
        });
        /**
         * Pets that get a feed:
        */
        foreach ($pets as $pet) {
            //echo $pet->needFood. " ";
            $pet->eat(\App\Feed::AMOUNT_OF_FEED);
        }

//        echo Animal::$petBoxHungry;
//        echo Animal::$petBoxNotHungry;
        $output['petBoxNotHungry']=Dog::$petBoxNotHungry;
        $output['petNotBoxHungry']= Dog::$petNotBoxHungry;
        $output['petBoxHungry']= Dog::$petBoxHungry;
        $output['petNotBoxNotHungry']= Dog::$petNotBoxNotHungry;
        //return $output;

        $box->showAnimals();
        $box->takeAnimals(14);
        /**
         * crap(excrement) can or can not be, since if pet is not in satiety, it will not give excrement
         * all_craps saves excrement's as object of class Crap of each pets that are in box
         */
        foreach ($pets as $pet) {
            $crap = $pet->toilet();
            if ($pet->isPetInBox) {
                if ($crap) {
                    array_push($box->all_craps);
                }
            }
        }
        $output['needCleaning']=$box->clearCrap();
        return $output;
    }
}
