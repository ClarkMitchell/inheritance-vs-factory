<?php

declare(strict_types=1);

namespace Clark\Tests;

use Clark\Customer;
use PHPUnit\Framework\TestCase;

final class DataTransferObjectTest extends TestCase
{
    public function testCanBeConstructed()
    {
        $jill = new Customer(["id" => 3, "name" => "Jill"]);

        $this->assertEquals("Jill", $jill->name);
        $this->assertEquals(
            ["id" => 3, "name" => "Jill"],
            $jill->toArray()
        );
    }

    public function testWontBeConstructedWithMissingProperties()
    {
        $this->expectNotice();

        new Customer(["name" => "Jack"]);
    }

    public function testExtraPropertiesWillNotBeAdded()
    {
        $bill = new Customer(["id" => 4, "name" => "Bill", "foo" => "bar"]);

        $this->assertObjectNotHasAttribute("foo", $bill);
    }
}