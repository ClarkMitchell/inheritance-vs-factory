<?php

declare(strict_types=1);

namespace Clark;

class Codable
{
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function get($name)
    {
        $object = new $this->class();
        $data = json_decode($this->callRemote($name));

        foreach (get_object_vars($object) as $property => $value) {
            $object->$property = $data->$property;
        }

        return $object;
    }

    private function callRemote($name)
    {
        return json_encode(
            [
                'name' => 'Bob',
                'id' => 1
            ]
        );
    }
}
