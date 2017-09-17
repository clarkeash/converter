<?php

namespace Clarkeash\Converter\Tests\Unit;

use Clarkeash\Converter\Convert;
use Clarkeash\Converter\From;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ConvertTest extends TestCase
{
    /**
     * @test
     * @expectedException \Clarkeash\Converter\Exceptions\BadMethodCallException
     */
    public function it_errors_if_no_metric_exists()
    {
        Convert::nope();
    }

    /** @test */
    public function it_returns_an_instance_of_from()
    {
        Assert::assertInstanceOf(From::class, Convert::size());
        Assert::assertInstanceOf(From::class, (new Convert)->size());
    }

    /** @test */
    public function it_can_get_and_set_a_value()
    {
        $convert = new Convert;
        Assert::assertEquals(0, $convert->getValue());

        $convert->setValue(20);
        Assert::assertEquals(20, $convert->getValue());
    }
}
