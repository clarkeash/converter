<?php

namespace Clarkeash\Converter\Tests\Unit;

use Clarkeash\Converter\Contracts\Metric;
use Clarkeash\Converter\Convert;
use Clarkeash\Converter\From;
use Clarkeash\Converter\To;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ToTest extends TestCase
{
    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_errors_if_method_does_not_exist()
    {
        $converter = new Convert;

        $from = new From($converter, new class implements Metric {
            public function example()
            {
                return 42;
            }
        });

        $from->from(200)->example()->to()->nope();
    }

    /** @test */
    public function it_returns_value_if_method_exists()
    {
        $converter = new Convert;

        $from = new From($converter, new class implements Metric {
            public function example()
            {
                return 42;
            }

            public function another()
            {
                return 10;
            }
        });

        Assert::assertEquals(8.4, $from->from(2)->example()->to()->another());
    }
}
