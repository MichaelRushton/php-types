# PHP Types

A PHP library to manipulate arrays, numbers, and strings using a fluent interface.

## Installation

```bash
composer require michaelrushton/types
```

## Documentation

The classes in this library are wrappers for the native [array](https://www.php.net/manual/en/ref.array.php), [math](https://www.php.net/manual/en/ref.math.php), and [string](https://www.php.net/manual/en/ref.strings.php) functions. Method names mostly use the native function names but with any underscores and `str` or `array` prefixes removed.

```php
use MichaelRushton\Types\Str;

echo new Str('this is a string')
->ucwords()
->replace(' ', '')
->lcfirst();
// thisIsAString
```

\
Two notable exceptions to the naming convention in the `Arr` class are `advance` which is used to call `next` and `contains` which is used to call `in_array`.

```php
use MichaelRushton\Types\Arr;

$arr = new Arr([true, false]);

$arr->contains(true);
// true

$arr->advance();
// false
```

\
Methods are chainable even when switching between arrays, numbers, and strings.

```php
echo new Str('here are words')
->explode(' ')
->merge(['and', 'more', 'words'])
->implode(' ');
// here are words and more words
```

\
The `value` property will return the underlying value.

```php
$str = new Str('example')->toupper()->value;

var_dump($str);
// string(7) 'EXAMPLE'
```

\
If the final method in the chain does not require any arguments then calling it as a property will also return the underlying value.

```php
$str = new Str('example')->toupper;

var_dump($str);
// string(7) 'EXAMPLE'
```

\
Use the `pipe` method to pipe the object through a callback, returning the given value.

```php
$length = new Str(' test ')->pipe(fn (Str $str) => $str->trim()->len);
// 4
```

\
Use the `through` method to pass the object through a callback, returning the object.

```php
$str = new Str('test')->through(function (Str $str)
{
    error_log($str->value);
});
```

## Extending the library

To extend the library, extend the base classes and override the `ARR_CLASS`, `NUM_CLASS`, and `STR_CLASS` constants.

```php
use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

class StrExtended extends Str
{

    public const string ARR_CLASS = ArrExtended::class;
    public const string NUM_CLASS = NumExtended::class;

    public function camelcase(): static
    {

        return $this->ucwords()
        ->replace(' ', '')
        ->lcfirst();

    }

};

class NumExtended extends Num
{
    public const string STR_CLASS = StrExtended::class;

    public function add10(): static
    {
        return $this->add(10);
    }
};

class ArrExtended extends Arr
{
    public const string NUM_CLASS = NumExtended::class;
    public const string STR_CLASS = StrExtended::class;
};

echo $str = new StrExtended('this is a string')->camelcase();
// thisIsAString

echo $str->len()->add10();
// 23
```
