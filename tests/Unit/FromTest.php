<?php

namespace Clarkeash\Converter\Tests\Unit;

use Clarkeash\Converter\Contracts\Metric;
use Clarkeash\Converter\Convert;
use Clarkeash\Converter\From;
use Clarkeash\Converter\To;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class FromTest extends TestCase
{
    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_errors_if_method_does_not_exist()
    {
        $converter = new Convert;

        $from = new From($converter, new class implements Metric {});

        $from->from(200)->nope();
    }

    /** @test */
    public function it_returns_to_if_method_exists()
    {
        $converter = new Convert;

        $from = new From($converter, new class implements Metric {
            public function example()
            {
                return 42;
            }
        });

        Assert::assertInstanceOf(To::class, $from->from(200)->example());
    }

    /** @test */
    public function it_supports_multiple_terms()
    {
        $converter = new Convert;

        $from = new From($converter, new class implements Metric {
            public function example()
            {
                return 50;
            }

            public function another()
            {
                return 10;
            }
        });


        Assert::assertEquals(10, $from->from(2)->example()->to()->another());
        Assert::assertEquals(10, $from->of(2)->example()->to()->another());
    }
}
