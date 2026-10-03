<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('when true arr', function (): void {

    expect(
        new Arr([1, 2, 3])
        ->when(
            1,
            fn($arr, $value) => $arr[] = $value,
            fn($arr, $value) => $arr[] = 4
        )()
    )
    ->toBe([1, 2, 3, 1]);

});

test('when false arr', function (): void {

    expect(
        new Arr([1, 2, 3])
        ->when(
            0,
            fn($arr, $value) => $arr[] = 4,
            fn($arr, $value) => $arr[] = $value
        )()
    )
    ->toBe([1, 2, 3, 0]);

});

test('when true num', function (): void {

    expect(
        new Num(1)
        ->when(
            1,
            fn($num, $value) => $num->add($value),
            fn($num, $value) => $num->add(0)
        )()
    )
    ->toBe(2);

});

test('when false num', function (): void {

    expect(
        new Num(1)
        ->when(
            0,
            fn($num, $value) => $num->add(1),
            fn($num, $value) => $num->add($value)
        )()
    )
    ->toBe(1);

});

test('when true str', function (): void {

    expect(
        new Str('test')
        ->when(
            '1',
            fn($str, $value) => $str->pad(5, $value),
            fn($str, $value) => $str->pad(5, $value, STR_PAD_LEFT)
        )()
    )
    ->toBe('test1');

});

test('when false str', function (): void {

    expect(
        new Str('test')
        ->when(
            '0',
            fn($str, $value) => $str->pad(5, $value),
            fn($str, $value) => $str->pad(5, $value, STR_PAD_LEFT)
        )()
    )
    ->toBe('0test');

});
