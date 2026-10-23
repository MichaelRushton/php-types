# Num

## API reference

```php
public int|float|string $value { get; }
```

```php
public function abs(): static;
```

```php
public function acos(): static;
```

```php
public function acosh(): static;
```

```php
public function add(int|float|NumInterface $num2): static;
```

```php
public function asin(): static;
```

```php
public function asinh(): static;
```

```php
public function atan(): static;
```

```php
public function atan2(float|NumInterface $x): static;
```

```php
public function atanh(): static;
```

```php
public function base(?NumInterface &$return = null): int|NumInterface;
```

```php
public function baseconvert(int|NumInterface $to_base): static;
```

```php
public function bin(): static;
```

```php
public function ceil(): static;
```

```php
public function chr(?StrInterface &$return = null): StrInterface|static;
```

```php
public function clone(?NumInterface &$return = null): static;
```

```php
public function cos(): static;
```

```php
public function cosh(): static;
```

```php
public function dec(): static;
```

```php
public function deg2rad(): static;
```

```php
public function echo(): static;
```

```php
public function format(
    int|NumInterface $decimals,
    string|StrInterface|null $decimal_separator = '.',
    string|StrInterface|null $thousands_separator = ',',
    ?StrInterface &$return = null
): StrInterface|static;
```

```php
public function exp(): static;
```

```php
public function expm1(): static;
```

```php
public function fdiv(float|NumInterface $num2): static;
```

```php
public function floor(): static;
```

```php
public function fmod(float|NumInterface $num2): static;
```

```php
public function fpow(float|NumInterface $exponent): static;
```

```php
public function hex(): static;
```

```php
public function hypot(float|NumInterface $y): static;
```

```php
public function intdiv(int|NumInterface $num2): static;
```

```php
public function isfinite(?bool &$return = null): bool|static;
```

```php
public function isinfinite(?bool &$return = null): bool|static;
```

```php
public function isnan(?bool &$return = null): bool|static;
```

```php
public function log(float|NumInterface $base = M_E): static;
```

```php
public function log10(): static;
```

```php
public function log1p(): static;
```

```php
public static function max(
    int|float|array|NumInterface $value,
    int|float|NumInterface ...$values,
): NumInterface;
```

```php
public static function min(
    int|float|array|NumInterface $value,
    int|float|NumInterface ...$values,
): NumInterface;
```

```php
public function mul(int|float|NumInterface $num2): static;
```

```php
public function oct(): static;
```

```php
public static function pi(): NumInterface;
```

```php
public function pow(int|float|NumInterface $exponent): static;
```

```php
public function printr(?StrInterface &$return = null): static;
```

```php
public function rad2deg(): static;
```

```php
public function round(
    int|NumInterface $precision = 0,
    int $mode = PHP_ROUND_HALF_UP
): static;
```

```php
public function serialize(?string &$return = null): string|static;
```

```php
public function sin(): static;
```

```php
public function sinh(): static;
```

```php
public function sqrt(): static;
```

```php
public function sub(int|float|NumInterface $num2): static;
```

```php
public function tan(): static;
```

```php
public function tanh(): static;
```

```php
public function vardump(): static;
```

```php
public static function class(): string;
```

```php
public static function extend(string|NumInterface $class): void;
```

```php
public function pipe(callable $callback): mixed;
```

```php
public function through(callable $callback): static;
```

```php
public function when(
    mixed $value,
    ?callable $if_true = null,
    ?callable $if_false = null
): static;
```

```php
public function __get(string $name): mixed;
```

```php
public function __toString(): string;
```
