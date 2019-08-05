<?php

namespace App;

use App\Abstraction\Animal;
use App\Interfaces\IParameterParser;
use App\Interfaces\IView;

require 'vendor/autoload.php';

class Application
{

    /**
     * @param IView $view
     * @param IParameterParser $params
     */
    public function start(IView $view, IParameterParser $params)
    {
        $dogs = DogFactory::create($params->getDogAmount());

        $cats = CatFactory::create($params->getCatAmount());

        $box = BoxFactory::create($params->getBoxSquare());
        $pets = array_merge($dogs, $cats);
        shuffle($pets);

        $foodPortion = FoodFactory::create(count($pets));

        $room = new Room();

        $insert = new Insert();

        foreach ($pets as $pet) {
            /**
             * @var Animal $pet
             */
            $pet->eat(array_pop($foodPortion));
        }
        /** @var Animal $pets */
        $insert->dispensePet($pets,$box,$room);

        $box->petsDoToilet();
        $room->petsDoToilet();

        $view->view(new BoxPresenter($box),new RoomPresenter($room)); //give the output array to view which can be Cli or Html

        if ($box->isNeedClear()) {
            $box->clearCrap();
        }

        if ($room->isNeedClear()) {
            $room->clearCrap();
        }

    }
}
