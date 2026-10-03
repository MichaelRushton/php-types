<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Traits;

use InvalidArgumentException;

trait Extend
{
    private static $class = self::class;

    final public static function class(): string
    {
        return self::$class;
    }

    final public static function extend(string|self $class): void
    {

        if (\is_string($class) && !is_a($class, self::class, true)) {
            throw new InvalidArgumentException();
        }

        self::$class = \is_string($class) ? $class : $class::class;

    }
}
