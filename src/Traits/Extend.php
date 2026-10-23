<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Traits;

use InvalidArgumentException;

trait Extend
{
    protected static $class = self::class;

    public static function class(): string
    {
        return static::$class;
    }

    public static function extend(string|object $class): void
    {

        if (\is_string($class) && !is_a($class, static::class, true)) {
            throw new InvalidArgumentException();
        } elseif (\is_object($class) && !is_a($class, static::class)) {
            throw new InvalidArgumentException();
        }

        static::$class = \is_string($class) ? $class : $class::class;

    }
}
