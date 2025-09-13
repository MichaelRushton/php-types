# PHP-Types

A PHP library to manipulate arrays, numbers, and strings using a fluent interface.

## Installation

```bash
composer require michaelrushton/types
```

## Documentation

The classes in this library are wrappers for the native [array](https://www.php.net/manual/en/ref.array.php), [math](https://www.php.net/manual/en/ref.math.php), and [string](https://www.php.net/manual/en/ref.strings.php) functions. Method names mostly use the native function names but with any underscores and `str` or `array` prefixes removed.

```php
use function MichaelRushton\Types\arr;

$array = arr(['d', 'c', 'b', 'a'])
->push('e')
->sort()
->map('strtoupper');

print_r($array());
/*
Array
(
    [0] => A
    [1] => B
    [2] => C
    [3] => D
    [4] => E
)
*/
```

```php
use function MichaelRushton\Types\num;

$num = num(4)
->pow(4)
->fdiv(10)
->floor();

echo $num;
// 25
```

```php
use function MichaelRushton\Types\str;

$string = str('this is a string')
->ucwords()
->replace(' ', '')
->lcfirst();

echo $string;
// thisIsAString
```

\
Two notable exceptions to the naming convention in the `Arr` class are `advance` which is used to call `next` and `contains` which is used to call `in_array`.

```php
$arr = arr([1, 2, 3]);

var_dump($arr->contains(1));
// bool(true)

var_dump($arr->advance());
// int(2)
```

\
Methods are chainable even when switching between arrays, numbers, and strings.

```php
echo str('here are words')
->explode(' ')
->merge(['and', 'more', 'words'])
->count()
->pow(2);
// 36
```

\
Some methods are not chainable by default.

```php
echo str('example')->len();
// 7
```

\
These methods can be made to be chainable by passing a final `$return` argument by reference.

```php
echo str('example')->len($length);
// example

echo $length->add(1);
// 8
```

\
Each class provides a `printr`, `vardump`, and `clone` method to call `print_r`, `var_dump`, and `clone` respectively. The `Num` and `Str` classes provide an `echo` method to call `echo`.

```php
$str = arr(['a', 'b', 'c'])
->printr()
->clone($arr)
->implode(',')
->vardump()
->toupper()
->echo();
/*
Array
(
    [0] => a
    [1] => b
    [2] => c
)
string(5) 'a,b,c'
A,B,C
*/

$arr->printr();
/*
Array
(
    [0] => a
    [1] => b
    [2] => c
)
*/
```

\
To return the underlying value, invoke the object as a function.

```php
$str = str('example')->toupper()();

var_dump($str);
// string(7) 'EXAMPLE'
```

\
If the final method in the chain does not require any arguments then calling it as a property will also return the underlying value.

```php
$str = str('example')->toupper;

var_dump($str);
// string(7) 'EXAMPLE'
```

## Arithmetic in other bases

The `Num` class can work in any base between 2 and 36 by passing the base as the second argument. When working in anything other than base 10 the number will be returned as a string.

```php
$num = num('-f.ab', 16)
->mul(10); // 10 as a base 10 number

var_dump($num());
// string(6) '-9c.ae'

$num = num('-f.ab', 16)
->mul(num(10, 16)); // 10 as a base 16 number

var_dump($num());
// string(5) '-fa.b'
```

\
The `bin`, `oct`, `dec`, and `hex` methods can be used to convert the number to base 2, base 8, base 10, and base 16 respectively. The `baseconvert` method can be used to convert the number to the given base.

```php
$num = num('-f.ab', 16);

echo $num->bin;
// -1111.10101011

echo $num->oct;
// -17.526

echo $num->dec;
// -15.66796875

echo $num->hex;
// -f.ab

echo $num->baseconvert(36);
// -f.o1or
```

## API reference

[Arr](docs/arr.md)\
[Num](docs/num.md)\
[Str](docs/str.md)

## Extending the library

To extend the library call the `extend` static method on any of the classes, passing it a child class.

```php
use MichaelRushton\Types\Str;

Str::extend(new class extends Str
{

    public function camelcase(): static
    {

        return $this->ucwords()
        ->replace(' ', '')
        ->lcfirst();

    }

});

echo str('this is a string')->camelcase;
// thisIsAString
```
