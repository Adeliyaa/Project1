<?php


namespace App\Interfaces;


use App\BoxPresenter;
use App\RoomPresenter;

interface IView
{
    /**
     * the function view represent output to Clii or Html
    */
    public function view(BoxPresenter $boxPresenter, RoomPresenter $outBoxPresenter);

}