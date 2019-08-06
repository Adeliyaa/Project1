<?php

namespace App;

use App\Abstraction\Animal;
use App\Interfaces\IParameterParser;
use App\Interfaces\IView;

require 'vendor/autoload.php';

class Application
{
    /**
     * Implement action(logic)
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

        $room = new Room();

        $insert = new Insert();
        $feed = new AnimalFeeder;

        /** @var Animal $pets */
        $feed->feedPets($pets);

        $insert->dispensePet($pets,$box,$room);

        $box->petsDoToilet();
        $room->petsDoToilet();

        $view->view(new BoxPresenter($box),new RoomPresenter($room));

        if ($box->isNeedClear()) {
            $box->clearCrap();
        }

        if ($room->isNeedClear()) {
            $room->clearCrap();
        }
    }
}

