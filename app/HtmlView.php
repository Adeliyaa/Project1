<?php

namespace App;

use App\Interfaces\IView;

class HtmlView implements IView
{
    /**
     * represent outputs by html
     * @param BoxPresenter $boxPresenter
     * @param RoomPresenter $roomPresenter
     * @return mixed|void
     */
    public function view(BoxPresenter $boxPresenter, RoomPresenter $roomPresenter)
    {
        echo $boxPresenter->getPetsInBox()."<br/>";
        echo $roomPresenter->getPetInRoom()."<br/>";
        echo $boxPresenter->getCatsInBox()."<br/>";
        echo $boxPresenter->getDogsInBox()."<br/>";
        echo $roomPresenter->getCatsInRoom()."<br/>";
        echo $roomPresenter->getDogsInRoom()."<br/>";
        echo $boxPresenter->isNeedClear()."<br/>";
        echo $roomPresenter->isNeedClear()."<br/>";
        echo $boxPresenter->canAddExtraPet()."<br/>";
    }
}
