<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Enum\Tests;

use PHPUnit\Framework\TestCase;
use GrizzIt\Enum\Enum;

/**
 * @coversDefaultClass \GrizzIt\Enum\Enum
 */
class EnumTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::getOrdinal
     * @covers ::__callStatic
     * @covers ::mapConstants
     * @covers ::__construct
     * @covers ::__toString
     * @covers ::getOptions
     */
    public function testEnum(): void
    {
        $subject = EnumMock::FOO();
        $this->assertInstanceOf(EnumMock::class, $subject);
        $this->assertEquals('foo', $subject);
        $this->assertEquals('BAR', EnumMock::getOrdinal('bar'));
        $this->assertEquals(
            ['FOO' => 'foo', 'BAR' => 'bar'],
            EnumMock::getOptions()
        );
    }
}
