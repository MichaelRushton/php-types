<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

abstract class Convert
{
    public static function toFluentType(mixed $value): mixed
    {

        return match (true) {
            \is_array($value) => arr($value),
            \is_int($value) || \is_float($value) => num($value),
            \is_string($value) => str($value),
            default => $value,
        };

    }

    public static function fromFluentType(mixed $value): mixed
    {

        $return = match (true) {
            $value instanceof Arr, $value instanceof Str => $value(),
            $value instanceof Num => (clone $value)->dec,
            default => $value,
        };

        if (\is_array($return)) {

            foreach ($return as &$element) {
                $element = static::{__FUNCTION__}($element);
            }

        }

        return $return;

    }

    public static function toBase10(
        int|float|string $number,
        int $from_base
    ): int|float {

        if (10 === $from_base) {

            if (!\is_string($number)) {
                return $number;
            }

            return false === strpos($number, '.') ? (int) $number : (float) $number;

        }

        $num = (int) base_convert(ltrim(strtok((string) $number, '.'), '-'), $from_base, 10);

        foreach (str_split(strtok('') ?: '') as $k => $v) {
            $num += base_convert($v, $from_base, 10) * pow($from_base, -1 - $k);
        }

        return 0 === strpos((string) $number, '-') ? 0 - $num : $num;

    }

    public static function fromBase10(
        int|float $number,
        int $to_base
    ): int|float|string {

        if (10 === $to_base) {
            return $number;
        }

        $num = base_convert((string) (int) $abs = abs($number), 10, $to_base) . '.';

        while ($fraction = fmod($fraction ?? $abs, 1) * $to_base) {
            $num .= base_convert((string) (int) $fraction, 10, $to_base);
        }

        return rtrim($number < 0 ? '-' . $num : $num, '.');

    }
}
