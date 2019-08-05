<?php


namespace App;

use App\Interfaces\IView;

class HtmlView implements IView
{

    public function view(BoxPresenter $boxPresenter, RoomPresenter $roomPresenter)
    {
        echo $boxPresenter->getPetsInBox()."<br/>"; // в коробке 20 шенков
        echo $roomPresenter->getPetInRoom()."<br/>";//
        echo $boxPresenter->getCatsInBox()."<br/>";
        echo $boxPresenter->getDogsInBox()."<br/>";
        echo $roomPresenter->getCatsInRoom()."<br/>";
        echo $roomPresenter->getDogsInRoom()."<br/>";
        echo $boxPresenter->isNeedClear()."<br/>";
        echo $roomPresenter->isNeedClear()."<br/>";
    }
}