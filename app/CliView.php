<?php


namespace App;

class CliView
{

    public function CliView(array $output)
    {
        echo "Number of pets that in Box: ".$output['#petsInBox']."\n";
        echo "Number of pets that are not in box: ".$output['#petsNotInBox']."\n";
        echo "Number of dogs that are in box: ".$output['#dogInBox']."\n";
        echo "Number of dogs which are not in box: ".$output['#dogNotInBox']."\n";
        echo "Number of cats that are in box: ".$output['#catInBox']."\n";
        echo "Number of cats that are not in box: ".$output['#catNotInBox']."\n";
        echo "Number of pets that are in box and hungry: ".$output['petBoxHungry']."\n";
        echo "Number of pets that are in box and not: ".$output['petBoxNotHungry']."\n";
        echo "Number of pets that are not in box and hungry: ".$output['petNotBoxHungry']."\n";
        echo "Number of pets that not in box and not hungry: ".$output['petNotBoxNotHungry']."\n";
        if ($output['needCleaning'] == 1) {
            echo "The box is needed cleaning!"."\n";
        } else {
            echo "The box is not needed cleaning!"."\n";
        }

    }
}