<?php
namespace App\Interfaces;

interface IAnimal
{
    public function voice() :void;
    public function crawl() :bool;
    public function eat($amount_of_feed);
    public function toilet();
}
