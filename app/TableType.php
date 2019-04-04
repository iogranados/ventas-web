<?php
/**
 * Created by PhpStorm.
 * User: chambo
 * Date: 30/03/19
 * Time: 01:29 PM
 */

namespace App;


class TableType extends Enum
{
    const T001 = "sellers";
    const T002 = "customers";
    const T003 = "products";
}

abstract class Enum {
    static function getKeys(){
        $class = new \ReflectionClass(get_called_class());
        return array_keys($class->getConstants());
    }
}
