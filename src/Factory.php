<?php

declare(strict_types=1);

namespace Clark;

class Factory
{
    public function create(string $className, array $props): object
    {
        $object = new $className;
        $objectProps = array_keys(get_object_vars($object));

        foreach ($objectProps as $prop) {
            $object->$prop = $props[$prop];
        }

        return $object;
    }
}