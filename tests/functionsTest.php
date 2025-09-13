<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

use function MichaelRushton\Types\arr;
use function MichaelRushton\Types\num;
use function MichaelRushton\Types\str;

test('arr', function ($expected, ...$args) {

    expect($arr = arr(...$args))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected);

})
->with([
    [[]],
    [['test'], ['test']],
    [[['test']], [arr(['test'])]],
]);

test('num', function ($expected, ...$args) {

    expect($num = num(...$args))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected);

})
->with([
    [0.0],
    [1, 1],
    [1.0, 1.0],
    [1, '1'],
    [1.0, '1.0'],
    [1, new Str('1')],
    [1.0, new Str('1.0')],
    [10, 10, 10],
    [-10, -10, 10],
    [10.5, 10.5, 10],
    [-10.5, -10.5, 10],
    [10.5, '10.5', 10],
    [-10.5, '-10.5', 10],
    ['10', 10, 16],
    ['-10', -10, 16],
    ['10.5', 10.5, 16],
    ['-10.5', -10.5, 16],
    ['f', 'f', 16],
    ['-f', '-f', 16],
    ['f.5', 'f.5', 16],
    ['-f.5', '-f.5', 16],
    [10, 10, new Num(10)],
    ['f', 'f', new Num(16)],
]);

test('str', function ($expected, ...$args) {

    expect($str = str(...$args))
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe($expected);

})
->with([
    [''],
    ['test', 'test'],
]);
