<?php

declare(strict_types=1);

namespace Clark;

class DataTransferObject
{
    public function __construct(array $parameters)
    {
        foreach (get_object_vars($this) as $property => $value) {
            $this->$property = $parameters[$property];
        }
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}