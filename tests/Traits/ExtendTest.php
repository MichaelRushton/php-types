<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

use function MichaelRushton\Types\arr;
use function MichaelRushton\Types\num;
use function MichaelRushton\Types\str;

class NewArr extends Arr
{
};
class NewNum extends Num
{
};
class NewStr extends Str
{
};

test('can extend arr', function ($class, $class_name) {

    expect($class::fill(0, 1, 1))
    ->toBeInstanceOf(Arr::class);

    Arr::extend($class);

    expect(arr())
    ->toBeInstanceOf($class_name);

    expect(Arr::fill(0, 1, 1))
    ->toBeInstanceOf($class_name);

})
->with([
    [NewArr::class, NewArr::class],
    [$class = new class () extends Arr {}, $class::class],
]);

test('can extend num', function ($class, $class_name) {

    expect($class::pi())
    ->toBeInstanceOf(Num::class);

    Num::extend($class);

    expect(num())
    ->toBeInstanceOf($class_name);

    expect(Num::pi())
    ->toBeInstanceOf($class_name);

})
->with([
    [NewNum::class, NewNum::class],
    [$class = new class () extends Num {}, $class::class],
]);

test('can extend str', function ($class, $class_name) {

    Str::extend($class);

    expect(str())
    ->toBeInstanceOf($class_name);

})
->with([
    [NewStr::class, NewStr::class],
    [$class = new class () extends Str {}, $class::class],
]);

test('must extend arr', function () {
    Arr::extend(stdClass::class);
})
->throws(InvalidArgumentException::class);

test('must extend num', function () {
    Num::extend(stdClass::class);
})
->throws(InvalidArgumentException::class);

test('must extend str', function () {
    Str::extend(stdClass::class);
})
->throws(InvalidArgumentException::class);

afterAll(function () {
    Arr::extend(Arr::class);
    Num::extend(Num::class);
    Str::extend(Str::class);
});
