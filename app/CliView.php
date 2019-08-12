<?php

namespace App;

use App\Interfaces\IView;

class CliView implements IView
{
    /**
     * represent outputs by cli
     * @param BoxPresenter $boxPresenter
     * @param RoomPresenter $roomPresenter
     * @return mixed|void
     */
    public function view(BoxPresenter $boxPresenter, RoomPresenter $roomPresenter)
    {
        echo $boxPresenter->getPetsInBox()."\n";
        echo $roomPresenter->getPetInRoom()."\n";
        echo $boxPresenter->getCatsInBox()."\n";
        echo $boxPresenter->getDogsInBox()."\n";
        echo $roomPresenter->getCatsInRoom()."\n";
        echo $roomPresenter->getDogsInRoom()."\n";
        echo $boxPresenter->isNeedClear()."\n";
        echo $roomPresenter->isNeedClear(). "\n";
        echo $boxPresenter->canAddExtraPet()."\n";
    }
}
