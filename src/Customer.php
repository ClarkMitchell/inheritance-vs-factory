<?php

declare(strict_types=1);

namespace Clark;

final class Customer extends DataTransferObject
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $name
     */
    public $name;
}