<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Traits;

use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Interfaces\NumInterface;
use Stringable;

trait Convert
{
    protected static function convert(mixed $value): mixed
    {

        $return = match (true) {
            $value instanceof ArrInterface, $value instanceof NumInterface => $value->value,
            $value instanceof Stringable => (string) $value,
            default => $value
        };

        if (\is_array($return)) {

            foreach ($return as &$element) {
                $element = static::{__FUNCTION__}($element);
            }

        }

        return $return;

    }
}
