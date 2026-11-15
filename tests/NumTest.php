<?php

declare(strict_types=1);

use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('implements num interface', function (): void {

    expect(new Num(1))
    ->toBeInstanceOf(NumInterface::class);

});

test('implements stringable', function (): void {

    expect(new Num(1))
    ->toBeInstanceOf(Stringable::class);

});

test('value', function ($value, $expected): void {

    expect(new Num($value)->value)
    ->toBe($expected);

})
->with([
    [1, 1],
    [1.5, 1.5],
    [new Num(1), 1],
]);

test('abs', function (): void {

    expect($num = new Num(-1)->abs())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(abs(-1));

});

test('acos', function (): void {

    expect($num = new Num(0.5)->acos())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(acos(0.5));

});

test('acosh', function (): void {

    expect($num = new Num(1.5)->acosh())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(acosh(1.5));

});

test('add', function ($num2): void {

    expect($num = new Num(10)->add($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(10 + 15);

})
->with([15, new Num(15)]);

test('asin', function (): void {

    expect($num = new Num(1)->asin())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(asin(1));

});

test('asinh', function (): void {

    expect($num = new Num(1)->asinh())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(asinh(1));

});

test('atan', function (): void {

    expect($num = new Num(1)->atan())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(atan(1));

});

test('atan2', function ($x): void {

    expect($num = new Num(1)->atan2($x))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(atan2(1, 15));

})
->with([15, new Num(15)]);

test('atanh', function (): void {

    expect($num = new Num(0.5)->atanh())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(atanh(0.5));

});

test('bin', function (): void {

    expect($str = new Num(2)->bin())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(decbin(2));

});

test('ceil', function (): void {

    expect($num = new Num(0.5)->ceil())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(ceil(0.5));

});

test('chr', function (): void {

    expect($str = new Num(33)->chr())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(\chr(33));

});

test('cos', function (): void {

    expect($num = new Num(1)->cos())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(cos(1));

});

test('cosh', function (): void {

    expect($num = new Num(1)->cosh())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(cosh(1));

});

test('deg2rad', function (): void {

    expect($num = new Num(1)->deg2rad())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(deg2rad(1));

});

test('exp', function (): void {

    expect($num = new Num(1)->exp())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(exp(1));

});

test('expm1', function (): void {

    expect($num = new Num(1)->expm1())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(expm1(1));

});

test('fdiv', function ($num2): void {

    expect($num = new Num(1)->fdiv($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(fdiv(1, 15));

})
->with([15, new Num(15)]);

test('floor', function (): void {

    expect($num = new Num(0.5)->floor())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(floor(0.5));

});

test('format', function ($decimals, $decimal_separator, $thousands_separator): void {

    expect($str = new Num(1000.5)->format($decimals, $decimal_separator, $thousands_separator))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(number_format(1000.5, 1, ' ', '-'));

})
->with([
    [1, ' ', '-'],
    [new Num(1), new Str(' '), new Str('-')],
]);

test('format default', function (): void {

    expect($str = new Num(1000.5)->format())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(number_format(1000.5));

});

test('fmod', function ($num2): void {

    expect($num = new Num(30.5)->fmod($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(fmod(30.5, 15));

})
->with([15, new Num(15)]);

test('fpow', function ($exponent): void {

    expect($num = new Num(1.5)->fpow($exponent))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(fpow(1.5, 15));

})
->with([15, new Num(15)]);

test('hex', function (): void {

    expect($str = new Num(16)->hex())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(dechex(16));

});

test('hypot', function ($y): void {

    expect($num = new Num(1)->hypot($y))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(hypot(1, 15));

})
->with([15, new Num(15)]);

test('intdiv', function ($num2): void {

    expect($num = new Num(30)->intdiv($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(intdiv(30, 15));

})
->with([15, new Num(15)]);

test('isfinite', function ($value): void {

    expect(new Num($value)->isfinite())
    ->toBe(is_finite($value));

})
->with([15, INF]);

test('isinfinite', function ($value): void {

    expect(new Num($value)->isinfinite())
    ->toBe(is_infinite($value));

})
->with([15, INF]);

test('isnan', function ($value): void {

    expect(new Num($value)->isnan())
    ->toBe(is_nan($value));

})
->with([15, NAN]);

test('json_encode', function (): void {

    $num = new Num(1);

    expect($str = $num->jsonencode(JSON_PRETTY_PRINT))
    ->toBeInstanceof(Str::class);

    expect($str->value)
    ->toBe(json_encode(1, JSON_PRETTY_PRINT));

});

test('log', function ($num2): void {

    expect($num = new Num(10)->log($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(log(10, 15));

})
->with([15, new Num(15)]);

test('log10', function (): void {

    expect($num = new Num(0.5)->log10())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(log10(0.5));

});

test('log1p', function (): void {

    expect($num = new Num(1)->log1p())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(log1p(1));

});

test('max', function ($value): void {

    expect($num = Num::max($value, 16, new Num(17)))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(max(15, 16, 17));

})
->with([15, new Num(15)]);

test('min', function ($value): void {

    expect($num = Num::min($value, 16, new Num(17)))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(min(15, 16, 17));

})
->with([15, new Num(15)]);

test('mul', function ($num2): void {

    expect($num = new Num(2)->mul($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(2 * 15);

})
->with([15, new Num(15)]);

test('oct', function (): void {

    expect($str = new Num(8)->oct())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(decoct(8));

});

test('pi', function (): void {

    expect($num = Num::pi())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(M_PI);

});

test('pow', function ($exponent): void {

    expect($num = new Num(2)->pow($exponent))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(2 ** 15);

})
->with([15, new Num(15)]);

test('rad2deg', function (): void {

    expect($num = new Num(1)->rad2deg())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(rad2deg(1));

});

test('round', function ($precision, $mode): void {

    expect($num = new Num(1.55)->round($precision, $mode))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(round(1.55, (int) (string) $precision, $mode));

})
->with([0, 1, new Num(0), new Num(1)])
->with(RoundingMode::cases());

test('serialize', function (): void {

    $num = new Num(1);

    expect($str = $num->serialize())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(serialize(1));

});

test('sin', function (): void {

    expect($num = new Num(1)->sin())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(sin(1));

});

test('sinh', function (): void {

    expect($num = new Num(1)->sinh())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(sinh(1));

});

test('sqrt', function (): void {

    expect($num = new Num(0.5)->sqrt())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(sqrt(0.5));

});

test('sub', function ($num2): void {

    expect($num = new Num(10)->sub($num2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(10 - 15);

})
->with([15, new Num(15)]);

test('tan', function (): void {

    expect($num = new Num(1)->tan())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(tan(1));

});

test('tanh', function (): void {

    expect($num = new Num(1)->tanh())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(tanh(1));

});

test('fromBase', function ($number, $from_base, $expected): void {

    expect($num = Num::fromBase($number, $from_base))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe($expected);

})
->with([
    [10, 10, 10],
    [new Num(-10), new Num(10), -10],
    [10.5, 10, 10.5],
    [-10.5, 10, -10.5],
    ['10', 10, 10],
    [new Str('-10'), 10, -10],
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

test('toBase', function ($number, $to_base, $expected): void {

    expect(new Num($number)->toBase($to_base)->value)
    ->toBe($expected);

})
->with([
    [10, 10, 10],
    [-10, new Num(10), -10],
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

test('pipe', function (): void {

    $num1 = new Num(1);

    expect($num1->pipe(function ($num2) use ($num1) {

        expect($num2)
        ->toBe($num1);

        return true;

    }))
    ->toBeTrue();

});

test('through', function (): void {

    $num1 = new Num(-1);

    expect($num1->through(function ($num2) use ($num1, &$abs): void {

        expect($num2)
        ->toBe($num1);

        $abs = $num2->abs()->value;

    }))
    ->toBe($num1);

    expect($abs)
    ->toBe(abs(-1));

});

test('__get', function (): void {

    expect(new Num(-1)->abs)
    ->toBe(abs(-1));

});

test('__toString', function (): void {

    expect((string) new Num(1.5))
    ->toBe('1.5');

});
