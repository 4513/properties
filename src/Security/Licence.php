<?php

declare(strict_types=1);

namespace MiBo\Properties\Security;

use Ramsey\Uuid\Rfc4122\UuidV4;

/**
 * Class Licence
 *
 * @package MiBo\Properties\Security
 *
 * @author Michal Boris <michal.boris27@gmail.com>
 *
 * @since 0.1
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise.
 */
final class Licence
{
    private static function generate(): void
    {
        if (file_exists(__DIR__ . "/licence")) {
            return;
        }

        touch(__DIR__ . "/licence");
        chmod(__DIR__ . "/licence", 0770);

        $uuid = UuidV4::uuid4()->toString();

        file_put_contents(__DIR__ . "/licence", $uuid);
    }

    public static function get(): string
    {
        self::generate();

        return file_get_contents(__DIR__ . "/licence");
    }
}
