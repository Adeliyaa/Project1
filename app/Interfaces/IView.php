<?php

namespace App\Interfaces;

use App\BoxPresenter;
use App\RoomPresenter;

interface IView
{
    /**
     * represent outputs
     * @param BoxPresenter $boxPresenter
     * @param RoomPresenter $outBoxPresenter
     * @return mixed
     */
    public function view(BoxPresenter $boxPresenter, RoomPresenter $outBoxPresenter);
}
