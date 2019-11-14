<?php

declare(strict_types=1);

namespace Clark\Tests;

use Clark\Factory;
use Clark\User;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    public function testCanBeCreated()
    {
        $bob = (new Factory())->create(
            User::class,
            ["id" => 1, "name" => "Bob"]
        );

        $this->assertEquals("Bob", $bob->name);
        $this->assertEquals(1, $bob->id);
    }

    public function testWontBeCreatedWithMissingProperties()
    {
        $this->expectNotice();

        (new Factory())->create(
            User::class,
            ["name" => "Alice"]
        );
    }

    public function testExtraPropertiesWillNotBeAdded()
    {
        $jane = (new Factory())->create(
            User::class,
            ["id" => 2, "name" => "Jane", "foo" => "bar"]
        );

        $this->assertObjectNotHasAttribute("foo", $jane);
    }
}