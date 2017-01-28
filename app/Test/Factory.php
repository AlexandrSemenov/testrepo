<?php

namespace App\Test;


class Factory
{
    public static function build($class)
    {
        $class = 'App\\Test\\' . $class;
        if(class_exists($class))
        {
            return new $class();
        }else{
            throw new \Exception('такого класса нет');
        }
    }
}