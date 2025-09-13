<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Convert;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('convert to fluent type', function ($value, $expected) {

    expect(Convert::toFluentType($value))
    ->toEqual($expected);

})
->with([
    [['test'], new Arr(['test'])],
    [1, new Num(1)],
    [1.0, new Num(1.0)],
    ['test', new Str('test')],
    [true, true],
    [false, false],
    [null, null],
    [new stdClass(), new stdClass()],
]);

test('convert from fluent type', function ($value, $expected) {

    expect(Convert::fromFluentType($value))
    ->toEqual($expected);

})
->with([
    [new Arr(['test']), ['test']],
    [new Num(1), 1],
    [new Num(1.0), 1.0],
    [new Num('f', 16), 15],
    [new Str('test'), 'test'],
    [['test'], ['test']],
    [1, 1],
    [1.0, 1.0],
    ['test', 'test'],
    [true, true],
    [false, false],
    [null, null],
    [new stdClass(), new stdClass()],
    [[new Arr(['test1']), new Num(1), new Num(1.0), new Str('test2')], [['test1'], 1, 1.0, 'test2']],
]);

test('convert to base 10', function ($number, $from_base, $expected) {

    expect(Convert::toBase10($number, $from_base))
    ->toBe($expected);

})
->with([
    [10, 10, 10],
    [-10, 10, -10],
    [10.5, 10, 10.5],
    [-10.5, 10, -10.5],
    ['10', 10, 10],
    ['-10', 10, -10],
    ['10.5', 10, 10.5],
    ['-10.5', 10, -10.5],
    [10, 8, 8],
    [-10, 8, -8],
    [10.5, 8, 8.625],
    [-10.5, 8, -8.625],
    ['f', 16, 15],
    ['-f', 16, -15],
    ['f.abcdef123456', 16, 15.671111051506465],
    ['-f.abcdef123456', 16, -15.671111051506465],
]);

test('convert from base 10', function ($number, $to_base, $expected) {

    expect(Convert::fromBase10($number, $to_base))
    ->toBe($expected);

})
->with([
    [10, 10, 10],
    [-10, 10, -10],
    [10.5, 10, 10.5],
    [-10.5, 10, -10.5],
    [8, 8, '10'],
    [-8, 8, '-10'],
    [8.625, 8, '10.5'],
    [-8.625, 8, '-10.5'],
    [15, 16, 'f'],
    [-15, 16, '-f'],
    [15.671111051506465, 16, 'f.abcdef123456'],
    [-15.671111051506465, 16, '-f.abcdef123456'],
]);
