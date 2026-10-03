<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

function arr(array $array = []): Arr
{
    return new (Arr::class())($array);
}

function num(
    int|float|string|Str $number = 0.00,
    int|Num $base = 10
): Num {
    return new (Num::class())($number, $base);
}

function str(string $string = ''): Str
{
    return new (Str::class())($string);
}
