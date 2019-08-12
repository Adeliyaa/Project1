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
        $squares = [];

        foreach ($pets as $pet) {
            $squares[] = $pet->getPetSquare();
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
