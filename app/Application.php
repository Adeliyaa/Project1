<?php

namespace App;

class Application
{
    public function start()
    {
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

        echo "<br/>";
        /**
         * Calculate how much food needs for pets
         */
        foreach ($pets as $pet) {
            $pet->needFood = $pet->max_satiety - $pet->satiety;
            //echo "<br/>";
            echo $pet->name." needs ".$pet->needFood." gr of food"."<br/>";

//    array_push($needFoodarr, ['' => , 'need_food' => $pet->needFood]);
//
//    asort($needFoodarr);
        }

        /**
         * Sort pets by need foods to distribute foods to pets and as much as possible pets got food
         */
        usort($pets, function ($first_pet, $second_pet) {
            return $first_pet->needFood > $second_pet->needFood;
        });

        foreach ($pets as $pet) {
            echo  $pet->needFood. " ";
        }
        echo  "<br/>";
        echo "Pets that got a feed: <br/>";
        foreach ($pets as $pet) {
            //echo $pet->needFood. " ";
            $pet->eat(\App\Feed::AMOUNT_OF_FEED);
        }

        echo "<br/>";
        echo "Pets that don't get a feed:"."<br/>";
        echo " <br/>";
        foreach ($pets as $pet) {
            if ($pet->isSatiety == 0) {
                echo $pet->name." ";
            }
        }

        /**
         * Determine which pet is in box or is not and get food or not
         */
        echo "<br/>";
        foreach ($pets as $pet) {
            if ($pet->isSatiety == 0) {
                if ($pet->isPetInBox == 0) {
                    echo $pet->name." don't get a food and isn't in box";
                    echo "<br/>";
                }
                if ($pet->isPetInBox == 1) {
                    echo $pet->name." don't get a food and is in box";
                    echo "<br/>";
                }
            }
            if ($pet->isSatiety == 1) {
                if ($pet->isPetInBox == 0) {
                    echo $pet->name." get a food and isn't in box";
                    echo "<br/>";
                }
                if ($pet->isPetInBox == 1) {
                    echo $pet->name." get a food and is in box";
                    echo "<br/>";
                }
            }
        }

        /**
         * Determine is pet go to the toilet,
         * if yes, it means that pet will give excrement,
         * and this excrement put to the array of excrements(all_craps)
         */
        foreach ($pets as $pet) {
            $crap = $pet->toilet();
            if ($pet->isPetInBox) {
                if ($crap) {
                    array_push($box->all_craps);
                }
            }
            if ($crap) {
                echo $pet->name."'s amount of excrement is ".$crap->amount_of_crap . " ". "<br/>";
            }
        }
        $box->clearCrap();
        echo "<br/>";
        $box->showAnimals();
        echo "<br/>";
        $box->takeAnimals(14);
    }
}
