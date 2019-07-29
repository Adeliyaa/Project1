<?php


namespace App;

use App\Abstraction\Quantity;

class QuantityHtml extends Quantity
{

    public function numberOfPets(): array
    {
        $quantityOfPets = [];
        if (isset($_GET['puppy_count'])) { //check existence of puppy_count index
            $quantityOfPets['puppy_count'] = $_GET['puppy_count']; //get value for puppy_count from browser
        } else {
            $quantityOfPets['puppy_count'] = 0;
        }

        if (isset($_GET['kitty_count'])) {
            $quantityOfPets['kitty_count']=$_GET['kitty_count'];
        } else {
            $quantityOfPets['kitty_count'] = 0;
        }
        return $quantityOfPets;
    }
}