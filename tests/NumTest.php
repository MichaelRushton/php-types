<?php

declare(strict_types=1);

use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('abs', function (): void {

    $num = new Num(-1);

    expect($num->abs())
    ->toBe($num);

    expect($num->value)
    ->toBe(abs(-1));

});

test('acos', function (): void {

    $num = new Num(0.5);

    expect($num->acos())
    ->toBe($num);

    expect($num->value)
    ->toBe(acos(0.5));

});

test('acosh', function (): void {

    $num = new Num(1.5);

    expect($num->acosh())
    ->toBe($num);

    expect($num->value)
    ->toBe(acosh(1.5));

});

test('add', function ($num2): void {

    $num = new Num(10);

    expect($num->add($num2))
    ->toBe($num);

    expect($num->value)
    ->toBe(25);

})
->with([15, new Num('f', 16)]);

test('asin', function (): void {

    $num = new Num(1);

    expect($num->asin())
    ->toBe($num);

    expect($num->value)
    ->toBe(asin(1));

});

test('asinh', function (): void {

    $num = new Num(1);

    expect($num->asinh())
    ->toBe($num);

    expect($num->value)
    ->toBe(asinh(1));

});

test('atan', function (): void {

    $num = new Num(1);

    expect($num->atan())
    ->toBe($num);

    expect($num->value)
    ->toBe(atan(1));

});

test('atan2', function ($x): void {

    $num = new Num(1);

    expect($num->atan2($x))
    ->toBe($num);

    expect($num->value)
    ->toBe(atan2(1, 15));

})
->with([15, new Num('f', 16)]);

test('atanh', function (): void {

    $num = new Num(0.5);

    expect($num->atanh())
    ->toBe($num);

    expect($num->value)
    ->toBe(atanh(0.5));

});

test('base', function ($base): void {

    $num = new Num(1, $base);

    expect($b = $num->base())
    ->toBeInstanceOf(Num::class);

    expect($b)
    ->not->tobe($num);

    expect($b->value)
    ->toBe($base);

    expect($num->base($return))
    ->toBe($num);

    expect($return)
    ->not->tobe($num);

    expect($return->value)
    ->toBe($base);

})
->with([10, 16]);

test('baseconvert', function ($base): void {

    $num = new Num(10);

    expect($num->baseconvert($base))
    ->toBe($num);

    expect($num->value)
    ->toBe('a');

})
->with([16, new Num(16)]);

test('bin', function (): void {

    $num = new Num(2);

    expect($num->bin())
    ->toBe($num);

    expect($num->value)
    ->toBe('10');

});

test('ceil', function (): void {

    $num = new Num(0.5);

    expect($num->ceil())
    ->toBe($num);

    expect($num->value)
    ->toBe(ceil(0.5));

});

test('chr', function (): void {

    $num = new Num(1);

    expect($str = $num->chr())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe($expected = \chr(1));

    expect($num->chr($return))
    ->toBe($num);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return->value)
    ->toBe($expected);

});

test('clone', function (): void {

    $num1 = new Num(1);

    expect($num2 = $num1->clone())
    ->toBeInstanceOf(Num::class);

    expect($num2)
    ->not->toBe($num1);

    expect($num2->value)
    ->toBe(1);

    expect($num1->clone($num2))
    ->toBe($num1);

    expect($num2)
    ->toBeInstanceOf(Num::class);

    expect($num2)
    ->not->toBe($num1);

    expect($num2->value)
    ->toBe(1);

});

test('cos', function (): void {

    $num = new Num(1);

    expect($num->cos())
    ->toBe($num);

    expect($num->value)
    ->toBe(cos(1));

});

test('cosh', function (): void {

    $num = new Num(1);

    expect($num->cosh())
    ->toBe($num);

    expect($num->value)
    ->toBe(cosh(1));

});

test('dec', function (): void {

    $num = new Num('a', 16);

    expect($num->dec())
    ->toBe($num);

    expect($num->value)
    ->toBe(10);

});

test('deg2rad', function (): void {

    $num = new Num(1);

    expect($num->deg2rad())
    ->toBe($num);

    expect($num->value)
    ->toBe(deg2rad(1));

});

test('echo', function (): void {

    $num = new Num(1);

    expect($num->echo())
    ->toBe($num);

    $this->expectOutputString('1');

});

test('exp', function (): void {

    $num = new Num(1);

    expect($num->exp())
    ->toBe($num);

    expect($num->value)
    ->toBe(exp(1));

});

test('expm1', function (): void {

    $num = new Num(1);

    expect($num->expm1())
    ->toBe($num);

    expect($num->value)
    ->toBe(expm1(1));

});

test('fdiv', function ($num2): void {

    $num = new Num(1);

    expect($num->fdiv($num2))
    ->toBe($num);

    expect($num->value)
    ->toBe(fdiv(1, 15));

})
->with([15, new Num('f', 16)]);

test('floor', function (): void {

    $num = new Num(0.5);

    expect($num->floor())
    ->toBe($num);

    expect($num->value)
    ->toBe(floor(0.5));

});

test('fmod', function ($num2): void {

    $num = new Num(30.5);

    expect($num->fmod($num2))
    ->toBe($num);

    expect($num->value)
    ->toBe(fmod(30.5, 15));

})
->with([15, new Num('f', 16)]);

test('fpow', function ($exponent): void {

    $num = new Num(1.5);

    expect($num->fpow($exponent))
    ->toBe($num);

    expect($num->value)
    ->toBe(fpow(1.5, 15));

})
->with([15, new Num('f', 16)]);

test('hex', function (): void {

    $num = new Num(16);

    expect($num->hex())
    ->toBe($num);

    expect($num->value)
    ->toBe('10');

});

test('hypot', function ($y): void {

    $num = new Num(1);

    expect($num->hypot($y))
    ->toBe($num);

    expect($num->value)
    ->toBe(hypot(1, 15));

})
->with([15, new Num('f', 16)]);

test('intdiv', function ($num2): void {

    $num = new Num(30);

    expect($num->intdiv($num2))
    ->toBe($num);

    expect($num->value)
    ->toBe(intdiv(30, 15));

})
->with([15, new Num('f', 16)]);

test('is_finite', function ($number): void {

    $num = new Num($number);

    expect($num->isfinite())
    ->toBe($expected = is_finite($number));

    expect($num->isfinite($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

})
->with([1, INF]);

test('is_infinite', function ($number): void {

    $num = new Num($number);

    expect($num->isinfinite())
    ->toBe($expected = is_infinite($number));

    expect($num->isinfinite($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

})
->with([1, INF]);

test('is_nan', function ($number): void {

    $num = new Num($number);

    expect($num->isnan())
    ->toBe($expected = is_nan($number));

    expect($num->isnan($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

})
->with([1, NAN]);

test('log', function ($base): void {

    $num = new Num(10);

    expect($num->log($base))
    ->toBe($num);

    expect($num->value)
    ->toBe(log(10, 15));

})
->with([15, new Num('f', 16)]);

test('log10', function (): void {

    $num = new Num(0.5);

    expect($num->log10())
    ->toBe($num);

    expect($num->value)
    ->toBe(log10(0.5));

});

test('log1p', function (): void {

    $num = new Num(1);

    expect($num->log1p())
    ->toBe($num);

    expect($num->value)
    ->toBe(log1p(1));

});

test('max', function ($value): void {

    $num = Num::max($value, new Num(16));

    expect($num)
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(16);

})
->with([15, new Num('f', 16)]);

test('min', function ($value): void {

    $num = Num::min($value, new Num(16));

    expect($num)
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(15);

})
->with([15, new Num('f', 16)]);

test('mul', function ($num2): void {

    $num = new Num(10);

    expect($num->mul($num2))
    ->toBe($num);

    expect($num->value)
    ->toBe(150);

})
->with([15, new Num('f', 16)]);

test('number_format', function ($decimals, $decimal_separator, $thousands_separator): void {

    $num = new Num(1000);

    expect($str = $num->format($decimals, $decimal_separator, $thousands_separator))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe($expected = number_format(1000, 1, ' ', '-'));

    expect($num->format($decimals, $decimal_separator, $thousands_separator, $return))
    ->toBe($num);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return->value)
    ->toBe($expected);

})
->with([
    [1, ' ', '-'],
    [new Num(1), new Str(' '), new Str('-')],
]);

test('oct', function (): void {

    $num = new Num(8);

    expect($num->oct())
    ->toBe($num);

    expect($num->value)
    ->toBe('10');

});

test('pi', function (): void {

    expect($num = Num::pi())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(M_PI);

});

test('pow', function ($exponent): void {

    $num = new Num(1.5);

    expect($num->pow($exponent))
    ->toBe($num);

    expect($num->value)
    ->toBe(1.5 ** 15);

})
->with([15, new Num('f', 16)]);

test('print_r', function (): void {

    $num = new Num(1);

    expect($num->printr())
    ->toBe($num);

    $this->expectOutputString($expected = print_r(1, true));

    $num->printr($return);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return->value)
    ->toBe($expected);

});

test('rad2deg', function (): void {

    $num = new Num(1);

    expect($num->rad2deg())
    ->toBe($num);

    expect($num->value)
    ->toBe(rad2deg(1));

});

test('round', function ($precision, $mode): void {

    $num = new Num(1.555);

    expect($num->round($precision, $mode))
    ->toBe($num);

    expect($num->value)
    ->toBe(round(1.555, (int) (string) $precision, $mode));

})
->with([0, 1, 2, new Num(1), new Num(2), new Num(3)])
->with([PHP_ROUND_HALF_UP, PHP_ROUND_HALF_DOWN, PHP_ROUND_HALF_EVEN, PHP_ROUND_HALF_ODD]);

test('serialize', function (): void {

    $num = new Num(1);

    expect($num->serialize())
    ->toBe($expected = serialize(1));

    expect($num->serialize($return))
    ->toBe($num);

    expect($return)
    ->toBe($expected);

});

test('sin', function (): void {

    $num = new Num(1);

    expect($num->sin())
    ->toBe($num);

    expect($num->value)
    ->toBe(sin(1));

});

test('sinh', function (): void {

    $num = new Num(1);

    expect($num->sinh())
    ->toBe($num);

    expect($num->value)
    ->toBe(sinh(1));

});

test('sqrt', function (): void {

    $num = new Num(0.5);

    expect($num->sqrt())
    ->toBe($num);

    expect($num->value)
    ->toBe(sqrt(0.5));

});

test('sub', function ($num2): void {

    $num = new Num(25);

    expect($num->sub($num2))
    ->toBe($num);

    expect($num->value)
    ->toBe(10);

})
->with([15, new Num('f', 16)]);

test('tan', function (): void {

    $num = new Num(1);

    expect($num->tan())
    ->toBe($num);

    expect($num->value)
    ->toBe(tan(1));

});

test('tanh', function (): void {

    $num = new Num(1);

    expect($num->tanh())
    ->toBe($num);

    expect($num->value)
    ->toBe(tanh(1));

});

test('vardump', function (): void {

    $num = new Num(1);

    expect($num->vardump())
    ->toBe($num);

    $this->expectOutputString("int(1)\n");

});

test('implements num interface', function (): void {

    $num = new Num();

    expect($num)
    ->toBeInstanceOf(NumInterface::class);

});

test('magic get', function (): void {

    $num = new Num(-1);

    expect($num->abs)
    ->toBe(abs(-1));

});

test('magic to string', function (): void {

    $num = new Num(1.1);

    expect((string) $num)
    ->toBe('1.1');

});

test('public value', function (): void {

    $num = new Num(1);

    expect($num->value)
    ->toBe(1);

});
