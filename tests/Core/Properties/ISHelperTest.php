<?php

declare(strict_types=1);

namespace MiBo\Properties\Tests\Core\Properties;

use MiBo\Properties\Length;
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
 *
 * @coversDefaultClass \MiBo\Properties\Traits\InternationSystemProperty
 */
class ISHelperTest extends TestCase
{
    /**
     * @small
     *
     * @covers ::__callStatic
     * @covers ::getClassToCreate
     *
     * @return void
     */
    public function testCreateFromStatic(): void
    {
        $this->assertSame("nanometer", Length::NANO(0)->getUnit()->getName());
    }
}
