<?php


namespace App;

class HtmlView
{

    public function HtmlView($output)
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
    }
}