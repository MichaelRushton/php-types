<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;

function arr(array $value = []): ArrInterface
{
    return new (Arr::class())($value);
}

function num(
    int|float|string|StrInterface $value = 0.00,
    int|NumInterface $base = 10
): NumInterface {
    return new (Num::class())($value, $base);
}

function str(string $value = ''): StrInterface
{
    return new (Str::class())($value);
}
