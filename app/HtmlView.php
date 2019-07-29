<?php


namespace App;

use App\Interfaces\IView;

class HtmlView implements IView
{

    public function view(array $output)
    {
        echo "Number of pets that in Box: ".$output['#petsInBox']."<br/>";
        echo "Number of pets that are not in box: ".$output['#petsNotInBox']."<br/>";
        echo "Number of dogs that are in box: ".$output['#dogInBox']."<br/>";
        echo "Number of dogs which are not in box: ".$output['#dogNotInBox']."<br/>";
        echo "Number of cats that are in box: ".$output['#catInBox']."<br/>";
        echo "Number of cats that are not in box: ".$output['#catNotInBox']."<br/>";
        echo "Number of pets that are in box and hungry: ".$output['petBoxHungry']."<br/>";
        echo "Number of pets that are in box and not hungry: ".$output['petBoxNotHungry']."<br/>";
        echo "Number of pets that are not in box and hungry: ".$output['petNotBoxHungry']."<br/>";
        echo "Number of pets that not in box and not hungry: ".$output['petNotBoxNotHungry']."<br/>";
        if ($output['needCleaning']==1) {
            echo "The box is needed cleaning!"."<br/>";
        } else {
            echo "The box is not needed cleaning!"."<br/>";
        }
        echo "You ask to add: ".$output['puppy_count']." dog(s) and ".$output['kitty_count']." cat(s)!"."<br/>";
        echo "Successfully added: ".$output['#dogInBox']." dog(s) and ".$output['#catInBox']." cat(s)!"."<br/>";
        echo $output['catNotAddedBox']." cat(s) and ".$output['dogNotAddedBox']." dog(s) that are(is) not added!"."<br/>";
        echo $output['catCanAddedBox']." cat(s) and ".$output['dogCanAddedBox']." dog(s) can be added to box"."<br/>";
    }
}