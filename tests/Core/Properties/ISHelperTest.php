<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Properties;

use MiBo\Properties\Length;
use MiBo\Properties\Traits\InternationSystemProperty;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Small;
use PHPUnit\Framework\TestCase;

/**
 * Class ISHelperTest
 *
 * @package MiBo\Properties\Tests\Core\Properties
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
#[CoversClass(InternationSystemProperty::class)]
#[Small]
class ISHelperTest extends TestCase
{
    public function testCreateFromStatic(): void
    {
        self::assertSame("nanometer", Length::NANO(0)->getUnit()->getName());
    }
}
