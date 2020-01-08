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

    public function getAll($names)
    {
        return array_map(function($name) {
            return $this->get($name);
        }, $names);
    }

    private function callRemote($name)
    {
        if ($name ==='Bob') {
            return json_encode(
                [
                    'name' => 'Bob',
                    'id' => 1
                ]
            );
        }

        if ($name ==='Alice') {
            return json_encode(
                [
                    'name' => 'Alice',
                    'id' => 2
                ]
            );
        }
    }
}
