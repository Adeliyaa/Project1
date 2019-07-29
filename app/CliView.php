<?php


namespace App;

use App\Interfaces\IView;

class CliView implements IView
{

    public function view(array $output)
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
        echo "You ask to add: ".$output['puppy_count']." dog(s) and ".$output['kitty_count']." cat(s)!"."\n";
        echo "Successfully added: ".$output['#dogInBox']." dog(s) and ".$output['#catInBox']." cat(s)!"."\n";
        if ($output['catNotAddedBox']>0 || $output['dogNotAddedBox']>0) {
            echo $output['catNotAddedBox']." cat(s) and ".$output['dogNotAddedBox']." dog(s) that are(is) not added!"."\n";
        } else {
            echo "All pets are added to box!"."\n";
        }
        if ($output['catCanAddedBox'] > 0 || $output['dogCanAddedBox']>0) {
            echo $output['catCanAddedBox']." cat(s) and ".$output['dogCanAddedBox']." dog(s) can be added to box"."\n";
        } else {
            echo "No more pets can be added!";
        }

    }
}