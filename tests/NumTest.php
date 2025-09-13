<?php

declare(strict_types=1);

use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('abs', function () {

    $num = new Num(-1);

    expect($num->abs())
    ->toBe($num);

    expect($num())
    ->toBe(abs(-1));

});

test('acos', function () {

    $num = new Num(0.5);

    expect($num->acos())
    ->toBe($num);

    expect($num())
    ->toBe(acos(0.5));

});

test('acosh', function () {

    $num = new Num(1.5);

    expect($num->acosh())
    ->toBe($num);

    expect($num())
    ->toBe(acosh(1.5));

});

test('add', function ($num2) {

    $num = new Num(10);

    expect($num->add($num2))
    ->toBe($num);

    expect($num())
    ->toBe(25);

})
->with([15, new Num('f', 16)]);

test('asin', function () {

    $num = new Num(1);

    expect($num->asin())
    ->toBe($num);

    expect($num())
    ->toBe(asin(1));

});

test('asinh', function () {

    $num = new Num(1);

    expect($num->asinh())
    ->toBe($num);

    expect($num())
    ->toBe(asinh(1));

});

test('atan', function () {

    $num = new Num(1);

    expect($num->atan())
    ->toBe($num);

    expect($num())
    ->toBe(atan(1));

});

test('atan2', function ($x) {

    $num = new Num(1);

    expect($num->atan2($x))
    ->toBe($num);

    expect($num())
    ->toBe(atan2(1, 15));

})
->with([15, new Num('f', 16)]);

test('atanh', function () {

    $num = new Num(0.5);

    expect($num->atanh())
    ->toBe($num);

    expect($num())
    ->toBe(atanh(0.5));

});

test('base', function ($base) {

    $num = new Num(1, $base);

    expect($b = $num->base())
    ->toBeInstanceOf(Num::class);

    expect($b)
    ->not->tobe($num);

    expect($b())
    ->toBe($base);

    expect($num->base($return))
    ->toBe($num);

    expect($return)
    ->not->tobe($num);

    expect($return())
    ->toBe($base);

})
->with([10, 16]);

test('baseconvert', function ($base) {

    $num = new Num(10);

    expect($num->baseconvert($base))
    ->toBe($num);

    expect($num())
    ->toBe('a');

})
->with([16, new Num(16)]);

test('bin', function () {

    $num = new Num(2);

    expect($num->bin())
    ->toBe($num);

    expect($num())
    ->toBe('10');

});

test('ceil', function () {

    $num = new Num(0.5);

    expect($num->ceil())
    ->toBe($num);

    expect($num())
    ->toBe(ceil(0.5));

});

test('chr', function () {

    $num = new Num(1);

    expect($str = $num->chr())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe($expected = chr(1));

    expect($num->chr($return))
    ->toBe($num);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe($expected);

});

test('clone', function () {

    $num1 = new Num(1);

    expect($num2 = $num1->clone())
    ->toBeInstanceOf(Num::class);

    expect($num2)
    ->not->toBe($num1);

    expect($num2())
    ->toBe(1);

    expect($num1->clone($num2))
    ->toBe($num1);

    expect($num2)
    ->toBeInstanceOf(Num::class);

    expect($num2)
    ->not->toBe($num1);

    expect($num2())
    ->toBe(1);

});

test('cos', function () {

    $num = new Num(1);

    expect($num->cos())
    ->toBe($num);

    expect($num())
    ->toBe(cos(1));

});

test('cosh', function () {

    $num = new Num(1);

    expect($num->cosh())
    ->toBe($num);

    expect($num())
    ->toBe(cosh(1));

});

test('dec', function () {

    $num = new Num('a', 16);

    expect($num->dec())
    ->toBe($num);

    expect($num())
    ->toBe(10);

});

test('deg2rad', function () {

    $num = new Num(1);

    expect($num->deg2rad())
    ->toBe($num);

    expect($num())
    ->toBe(deg2rad(1));

});

test('echo', function () {

    $num = new Num(1);

    expect($num->echo())
    ->toBe($num);

    $this->expectOutputString('1');

});

test('exp', function () {

    $num = new Num(1);

    expect($num->exp())
    ->toBe($num);

    expect($num())
    ->toBe(exp(1));

});

test('expm1', function () {

    $num = new Num(1);

    expect($num->expm1())
    ->toBe($num);

    expect($num())
    ->toBe(expm1(1));

});

test('fdiv', function ($num2) {

    $num = new Num(1);

    expect($num->fdiv($num2))
    ->toBe($num);

    expect($num())
    ->toBe(fdiv(1, 15));

})
->with([15, new Num('f', 16)]);

test('floor', function () {

    $num = new Num(0.5);

    expect($num->floor())
    ->toBe($num);

    expect($num())
    ->toBe(floor(0.5));

});

test('fmod', function ($num2) {

    $num = new Num(30.5);

    expect($num->fmod($num2))
    ->toBe($num);

    expect($num())
    ->toBe(fmod(30.5, 15));

})
->with([15, new Num('f', 16)]);

test('fpow', function ($exponent) {

    $num = new Num(1.5);

    expect($num->fpow($exponent))
    ->toBe($num);

    expect($num())
    ->toBe(fpow(1.5, 15));

})
->with([15, new Num('f', 16)]);

test('hex', function () {

    $num = new Num(16);

    expect($num->hex())
    ->toBe($num);

    expect($num())
    ->toBe('10');

});

test('hypot', function ($y) {

    $num = new Num(1);

    expect($num->hypot($y))
    ->toBe($num);

    expect($num())
    ->toBe(hypot(1, 15));

})
->with([15, new Num('f', 16)]);

test('intdiv', function ($num2) {

    $num = new Num(30);

    expect($num->intdiv($num2))
    ->toBe($num);

    expect($num())
    ->toBe(intdiv(30, 15));

})
->with([15, new Num('f', 16)]);

test('is_finite', function ($number) {

    $num = new Num($number);

    expect($num->isfinite())
    ->toBe($expected = is_finite($number));

    expect($num->isfinite($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

})
->with([1, INF]);

test('is_infinite', function ($number) {

    $num = new Num($number);

    expect($num->isinfinite())
    ->toBe($expected = is_infinite($number));

    expect($num->isinfinite($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

})
->with([1, INF]);

test('is_nan', function ($number) {

    $num = new Num($number);

    expect($num->isnan())
    ->toBe($expected = is_nan($number));

    expect($num->isnan($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

})
->with([1, NAN]);

test('log', function ($base) {

    $num = new Num(10);

    expect($num->log($base))
    ->toBe($num);

    expect($num())
    ->toBe(log(10, 15));

})
->with([15, new Num('f', 16)]);

test('log10', function () {

    $num = new Num(0.5);

    expect($num->log10())
    ->toBe($num);

    expect($num())
    ->toBe(log10(0.5));

});

test('log1p', function () {

    $num = new Num(1);

    expect($num->log1p())
    ->toBe($num);

    expect($num())
    ->toBe(log1p(1));

});

test('max', function ($value) {

    $num = Num::max($value, new Num(16));

    expect($num)
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(16);

})
->with([15, new Num('f', 16)]);

test('min', function ($value) {

    $num = Num::min($value, new Num(16));

    expect($num)
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(15);

})
->with([15, new Num('f', 16)]);

test('mul', function ($num2) {

    $num = new Num(10);

    expect($num->mul($num2))
    ->toBe($num);

    expect($num())
    ->toBe(150);

})
->with([15, new Num('f', 16)]);

test('number_format', function ($decimals, $decimal_separator, $thousands_separator) {

    $num = new Num(1000);

    expect($str = $num->format($decimals, $decimal_separator, $thousands_separator))
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe($expected = number_format(1000, 1, ' ', '-'));

    expect($num->format($decimals, $decimal_separator, $thousands_separator, $return))
    ->toBe($num);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe($expected);

})
->with([
    [1, ' ', '-'],
    [new Num(1), new Str(' '), new Str('-')],
]);

test('oct', function () {

    $num = new Num(8);

    expect($num->oct())
    ->toBe($num);

    expect($num())
    ->toBe('10');

});

test('pi', function () {

    expect($num = Num::pi())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(M_PI);

});

test('pow', function ($exponent) {

    $num = new Num(1.5);

    expect($num->pow($exponent))
    ->toBe($num);

    expect($num())
    ->toBe(pow(1.5, 15));

})
->with([15, new Num('f', 16)]);

test('print_r', function () {

    $num = new Num(1);

    expect($num->printr())
    ->toBe($num);

    $this->expectOutputString($expected = print_r(1, true));

    $num->printr($return);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe($expected);

});

test('rad2deg', function () {

    $num = new Num(1);

    expect($num->rad2deg())
    ->toBe($num);

    expect($num())
    ->toBe(rad2deg(1));

});

test('round', function ($precision, $mode) {

    $num = new Num(1.555);

    expect($num->round($precision, $mode))
    ->toBe($num);

    expect($num())
    ->toBe(round(1.555, (int) (string) $precision, $mode));

})
->with([0, 1, 2, new Num(1), new Num(2), new Num(3)])
->with([PHP_ROUND_HALF_UP, PHP_ROUND_HALF_DOWN, PHP_ROUND_HALF_EVEN, PHP_ROUND_HALF_ODD]);

test('serialize', function () {

    $num = new Num(1);

    expect($num->serialize())
    ->toBe($expected = serialize(1));

    expect($num->serialize($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

});

test('sin', function () {

    $num = new Num(1);

    expect($num->sin())
    ->toBe($num);

    expect($num())
    ->toBe(sin(1));

});

test('sinh', function () {

    $num = new Num(1);

    expect($num->sinh())
    ->toBe($num);

    expect($num())
    ->toBe(sinh(1));

});

test('sqrt', function () {

    $num = new Num(0.5);

    expect($num->sqrt())
    ->toBe($num);

    expect($num())
    ->toBe(sqrt(0.5));

});

test('sub', function ($num2) {

    $num = new Num(25);

    expect($num->sub($num2))
    ->toBe($num);

    expect($num())
    ->toBe(10);

})
->with([15, new Num('f', 16)]);

test('tan', function () {

    $num = new Num(1);

    expect($num->tan())
    ->toBe($num);

    expect($num())
    ->toBe(tan(1));

});

test('tanh', function () {

    $num = new Num(1);

    expect($num->tanh())
    ->toBe($num);

    expect($num())
    ->toBe(tanh(1));

});

test('vardump', function () {

    $num = new Num(1);

    expect($num->vardump())
    ->toBe($num);

    $this->expectOutputString("int(1)\n");

});

test('magic get', function () {

    $num = new Num(-1);

    expect($num->abs)
    ->toBe(abs(-1));

});

test('magic to string', function () {

    $num = new Num(1.1);

    expect((string) $num)
    ->toBe('1.1');

});
