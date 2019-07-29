<?php


namespace App\Interfaces;


interface IView
{
    /**
     * the function view represent output to Clii or Html
    */
    public function view(array $output);

}