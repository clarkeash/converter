<?php

namespace Clarkeash\Converter\Tests\Feature;

use Clarkeash\Converter\Convert;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class SizeConverterTest extends TestCase
{
    /** @test */
    public function it_converts_bytes_into_kb()
    {
        $result = Convert::size()->from(2000)->bytes()->to()->kilobytes();
        Assert::assertEquals(2, $result);

        $converter = new Convert;
        $result = $converter->size()->from(4000)->bytes()->to()->kilobytes();
        Assert::assertEquals(4, $result);
    }
}
