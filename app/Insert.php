<?php

namespace App;

use App\Abstraction\Animal;

class Insert
{
    /**
     * Insert pets to box or room
     * @param Animal $pets
     * @param Box $box
     * @param Room $room
     */
    public function dispensePet($pets,$box,$room) {
        /** Array Sort by square(asc) to put as much as possible pets to box */
        $squares = [];
        /** @var Animal $pet */
        foreach ($pets as $pet) {
            $squares[] = $pet->getPetSquare(); //any object field
        }
        array_multisort($squares, SORT_ASC, $pets);

        foreach ($pets as $pet) {
            if ($box->hasPlace($pet)) {
                $box->addPets($pet);
            } else {
                $room->addPets($pet);
            }
        }
    }
}
