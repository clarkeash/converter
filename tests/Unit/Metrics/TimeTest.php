<?php

namespace Clarkeash\Converter\Tests\Unit\Metrics;

use Clarkeash\Converter\Convert;
use Clarkeash\Converter\Metrics\Time;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    /** @test */
    public function check_correct_rates()
    {
        $time = new Time;

        Assert::assertEquals(1, $time->seconds());
        Assert::assertEquals(60, $time->minutes());
        Assert::assertEquals(3600, $time->hours());
        Assert::assertEquals(86400, $time->days());
        Assert::assertEquals(604800, $time->weeks());
        Assert::assertEquals(1209600, $time->fortnights());

        Assert::assertEquals(2592000, $time->months()); // 30 days

        Assert::assertEquals(31536000, $time->years());
        Assert::assertEquals(31622400, $time->leapyears());

        Assert::assertEquals(315360000, $time->decades());
        Assert::assertEquals(630720000, $time->scores());
        Assert::assertEquals(1576800000, $time->jubilees());
        Assert::assertEquals(3153600000, $time->centuries());
        Assert::assertEquals(31536000000, $time->millenniums());
    }

    /** @test */
    public function check_conversions()
    {
        Assert::assertEquals(21, Convert::time()->from(3)->weeks()->to()->days());
    }
}
