<?php


namespace App;

use App\Interfaces\IView;

class CliView implements IView
{

    public function view(BoxPresenter $boxPresenter, RoomPresenter $roomPresenter)
    {
        echo $boxPresenter->getPetsInBox()."\n"; // в коробке 20 шенков
        echo $roomPresenter->getPetInRoom()."\n";//
        echo $boxPresenter->getCatsInBox()."\n";
        echo $boxPresenter->getDogsInBox()."\n";
        echo $roomPresenter->getCatsInRoom()."\n";
        echo $roomPresenter->getDogsInRoom()."\n";
        echo $boxPresenter->isNeedClear()."\n";
        echo $roomPresenter->isNeedClear()."\n";

    }
}