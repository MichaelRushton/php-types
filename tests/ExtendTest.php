<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

class ArrExtended extends Arr
{
    public const string NUM_CLASS = NumExtended::class;
    public const string STR_CLASS = StrExtended::class;
}

class NumExtended extends Num
{
    public const string STR_CLASS = StrExtended::class;
}

class StrExtended extends Str
{
    public const string ARR_CLASS = ArrExtended::class;
    public const string NUM_CLASS = NumExtended::class;
}

test('extend num', function (): void {

    expect(new Num(33)->chr()::class)
    ->toBe(Str::class);

    expect(new NumExtended(33)->chr()::class)
    ->toBe(StrExtended::class);

});

test('extend str', function (): void {

    expect(new Str('test')->len()::class)
    ->toBe(Num::class);

    expect(new StrExtended('test')->len()::class)
    ->toBe(NumExtended::class);

});
