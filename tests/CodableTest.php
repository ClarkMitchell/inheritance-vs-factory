<?php

declare(strict_types=1);

namespace Clark\Tests;

use Clark\Codable;
use Clark\User;
use PHPUnit\Framework\TestCase;

final class CodableTest extends TestCase
{
    public function testCanBeCreated()
    {
        $expectedBob = new User();
        $expectedBob->id = 1;
        $expectedBob->name = "Bob";

        $users = new Codable(User::class);
        $bob = $users->get("Bob");

        $this->assertEquals($expectedBob, $bob);
        $this->assertEquals('Bob', $bob->name);
    }
}
