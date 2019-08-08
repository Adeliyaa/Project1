<?php

namespace App;

use Exception;

class Config
{
    /**
     * get parameter values
     * @param string $key
     * @return mixed|null
     */
    public static function get(string $key)
    {
        $config = [
            'cat_breed'       => ['abyssinian cat','american Bobtail','american curl','american shorthair','american wirehair'],
            'cat_color'       => ['red', 'black', 'white', 'silver','brown'],
            'cat_name'        => ['Ilya','Bekbolat','Serzhan','Adeliya','Sasha'],
            'cat_age'         => rand(1,7),
            'cat_square'      => rand(50, 250),
            'dog_breed'       => ['Alaskan Klee Kai','Appenzeller Sennenhunde','Borzoi','Pitbul','Bolognese'],
            'dog_color'       => ['red', 'black', 'white', 'silver','brown'],
            'dog_name'        => ['Ilya','Bekbolat','Serzhan','Adeliya','Sasha'],
            'dog_age'         => rand(1, 10),
            'dog_square'      => rand (100, 300),
            'gender'          => ['female', 'male'],
            'box_limit_crap'  => 200,
            'room_limit_crap' => 400,
            'current_space'   => 0,
            'puppy_count'     => 0,
            'kitty_count'     => 0,
            'box_square'      => 1200,
        ];

        try {
            if(isset($config[$key])) {
                $value = $config[$key];

                return $value;
            } else {
                throw new Exception("Key is not exist!");
            }
        }
         catch(Exception $e) {
            echo "\n Exception Caught", $e->getMessage();
        }
    }
}
