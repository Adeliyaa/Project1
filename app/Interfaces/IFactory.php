<?php

namespace App\Interfaces;

interface IFactory
{
    /**
     * methods for creating instances (pets and box)
     * @param int $StuffAmount
     * @return mixed
     */
    static public function create(int $StuffAmount);
}
