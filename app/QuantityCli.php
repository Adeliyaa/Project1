<?php


namespace App;


use App\Abstraction\Quantity;

class QuantityCli extends Quantity
{

    public function numberOfPets(): array
    {
        //in longopts saves all keys which we give the value in terminal
        $longopts  = array(
            "puppy_count::",    //key for giving the quantity of puppy
            // :: mean Необязательное значение, if just : means required , if do not write anything , it is error
            "kitty_count::",    //key for giving the quantity of kitty
        );
        $options = getopt("", $longopts); // the first parameter for one symbol keys, we need keys which are more than one symbol, so we do "", and write in longopts
        return $options;
    }
}