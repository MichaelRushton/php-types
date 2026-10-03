<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('can through arr', function (): void {

    $arr = new Arr([1, 2, 3]);

    expect($arr->through(function ($arr): void {
        $arr[] = 4;
    }))
    ->toBe($arr);

    expect($arr())
    ->toBe([1, 2, 3, 4]);

});

test('can through num', function (): void {

    $num = new Num(-1);

    expect($num->through(function ($num): void {
        $num->abs();
    }))
    ->toBe($num);

    expect($num())
    ->toBe(1);

});

test('can through atr', function (): void {

    $str = new Str('test');

    expect($str->through(function ($str): void {
        $str->toupper();
    }))
    ->toBe($str);

    expect($str())
    ->toBe('TEST');

});
