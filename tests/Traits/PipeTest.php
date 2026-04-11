<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('can pipe arr', function (): void {

    $arr1 = new Arr([1, 2, 3]);

    expect($arr1->pipe(function ($arr2) use ($arr1) {

        expect($arr2)
        ->toBe($arr1);

        return true;

    }))
    ->toBeTrue();

});

test('can pipe num', function (): void {

    $num1 = new Num(1);

    expect($num1->pipe(function ($num2) use ($num1) {

        expect($num2)
        ->toBe($num1);

        return true;

    }))
    ->toBeTrue();

});

test('can pipe str', function (): void {

    $str1 = new Str('test');

    expect($str1->pipe(function ($str2) use ($str1) {

        expect($str2)
        ->toBe($str1);

        return true;

    }))
    ->toBeTrue();

});
