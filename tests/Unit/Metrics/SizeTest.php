<?php

namespace Clarkeash\Converter\Tests\Unit\Metrics;

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

        // K
        Assert::assertEquals($kilobits = 1000, $size->kilobits());
        Assert::assertEquals($kibibits = 1024, $size->kibibits());
        Assert::assertEquals($kilobytes = 8000, $size->kilobytes());
        Assert::assertEquals($kibibytes = 8192, $size->kibibytes());

        // M
        Assert::assertEquals($megabits = $kilobits * 1000, $size->megabits());
        Assert::assertEquals($mebibits = $kibibits * 1024, $size->mebibits());
        Assert::assertEquals($megabytes = $kilobytes * 1000, $size->megabytes());
        Assert::assertEquals($mebibytes = $kibibytes * 1024, $size->mebibytes());

        // G
        Assert::assertEquals($gigabits = $megabits * 1000, $size->gigabits());
        Assert::assertEquals($gibibits = $mebibits * 1024, $size->gibibits());
        Assert::assertEquals($gigabytes = $megabytes * 1000, $size->gigabytes());
        Assert::assertEquals($gibibytes = $mebibytes * 1024, $size->gibibytes());

        // T
        Assert::assertEquals($terabits = $gigabits * 1000, $size->terabits());
        Assert::assertEquals($tebibits = $gibibits * 1024, $size->tebibits());
        Assert::assertEquals($terabytes = $gigabytes * 1000, $size->terabytes());
        Assert::assertEquals($tebibytes = $gibibytes * 1024, $size->tebibytes());

        // P
        Assert::assertEquals($petabits = $terabits * 1000, $size->petabits());
        Assert::assertEquals($pebibits = $tebibits * 1024, $size->pebibits());
        Assert::assertEquals($petabytes = $terabytes * 1000, $size->petabytes());
        Assert::assertEquals($pebibytes = $tebibytes * 1024, $size->pebibytes());

        // E
        Assert::assertEquals($exabits = $petabits * 1000, $size->exabits());
        Assert::assertEquals($exbibits = $pebibits * 1024, $size->exbibits());
        Assert::assertEquals($exabytes = $petabytes * 1000, $size->exabytes());
        Assert::assertEquals($exbibytes = $pebibytes * 1024, $size->exbibytes());

        // Z
        Assert::assertEquals($zettabits = $exabits * 1000, $size->zettabits());
        Assert::assertEquals($zebibits = $exbibits * 1024, $size->zebibits());
        Assert::assertEquals($zettabytes = $exabytes * 1000, $size->zettabytes());
        Assert::assertEquals($zebibytes = $exbibytes * 1024, $size->zebibytes());

        // Y
        Assert::assertEquals($yottabits = $zettabits * 1000, $size->yottabits());
        Assert::assertEquals($yobibits = $zebibits * 1024, $size->yobibits());
        Assert::assertEquals($yottabytes = $zettabytes * 1000, $size->yottabytes());
        Assert::assertEquals($yobibytes = $zebibytes * 1024, $size->yobibytes());
    }
}
