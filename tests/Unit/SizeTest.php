<?php

namespace Clarkeash\Converter\Tests\Unit;

use Clarkeash\Converter\Metrics\Size;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    /** @test */
    public function check_correct_rates()
    {
        $size = new Size;

        Assert::assertEquals(1, $size->bits());
        Assert::assertEquals(4, $size->nibbles());
        Assert::assertEquals(8, $size->bytes());

        Assert::assertEquals(8000, $size->kilobytes());
        Assert::assertEquals(8192, $size->kibibytes());

        Assert::assertEquals(8000000, $size->megabytes());
        Assert::assertEquals(8388608, $size->mebibytes());

        Assert::assertEquals(8000000000, $size->gigabytes());
        Assert::assertEquals(8589934592, $size->gibibytes());

        Assert::assertEquals(8000000000000, $size->terabytes());
        Assert::assertEquals(8796093022208, $size->tebibytes());

        Assert::assertEquals(8000000000000000, $size->petabytes());
        Assert::assertEquals(9007199254740992, $size->pebibytes());
    }
}
