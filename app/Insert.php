<?php


namespace App;


use App\Abstraction\Animal;

class Insert
{
    /**
     * @param Animal $pets
     * @param Box $box
     * @param Room $room
     */
    public function dispensePet($pets,$box,$room) {

        /**
         * Array Sort by square(asc) to put as much as possible pets to box
         */
        $squares = [];
        foreach ($pets as $my_object) {
            $squares[] = $my_object->square; //any object field
        }

        array_multisort($squares, SORT_ASC, $pets);

        foreach ($pets as $pet) {
            if ($box->hasPlace($pet)) {
                $box->addPets($pet);
            } else {
                $room->addPets($pet);
            }
        }

        echo "----".count($box->petInBox)."<br/>";
        echo "----".count($room->petInRoom)."<br/>";
        echo "----".$box->catInBox."<br/>";
        echo "----".$box->dogInBox."<br/>";
        echo "----".$room->catInRoom."<br/>";
        echo "----".$room->dogInRoom."<br/>";

    }
}