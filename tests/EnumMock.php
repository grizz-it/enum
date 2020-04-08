<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Enum\Tests;

use GrizzIt\Enum\Enum;

/**
 * @method static EnumMock FOO()
 * @method static EnumMock BAR()
 */
class EnumMock extends Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}
