# Num

## API reference

```php
public function __construct(
    int|float|string|Str $number = 0.00,
    int|self $base = 10
)
```

```php
public function abs(): static
```

```php
public function acos(): static
```

```php
public function acosh(): static
```

```php
public function add(int|float|self $num2): static
```

```php
public function asin(): static
```

```php
public function asinh(): static
```

```php
public function atan(): static
```

```php
public function atan2(float|self $x): static
```

```php
public function atanh(): static
```

```php
public function base(?self &$return = null): int|self
```

```php
public function baseconvert(int|self $to_base): static
```

```php
public function bin(): static
```

```php
public function ceil(): static
```

```php
public function chr(?Str &$return = null): Str|static
```

```php
public function clone(?self &$return = null): static
```

```php
public function cos(): static
```

```php
public function cosh(): static
```

```php
final public function dec(): static
```

```php
public function deg2rad(): static
```

```php
public function echo(): static
```

```php
public function exp(): static
```

```php
public function expm1(): static
```

```php
final public static function extend(string|self $class): void
```

```php
public function fdiv(float|self $num2): static
```

```php
public function floor(): static
```

```php
public function fmod(float|self $num2): static
```

```php
public function fpow(float|self $exponent): static
```

```php
public function format(
    int|self $decimals,
    string|Str|null $decimal_separator = '.',
    string|Str|null $thousands_separator  = ',',
    ?Str &$return = null
): Str|static
```

```php
public function hex(): static
```

```php
public function hypot(float|self $y): static
```

```php
public function intdiv(int|self $num2): static
```

```php
public function isfinite(?bool &$return = null): bool|static
```

```php
public function isinfinite(?bool &$return = null): bool|static
```

```php
public function isnan(?bool &$return = null): bool|static
```

```php
public function log(float|self $base = M_E): static
```

```php
public function log10(): static
```

```php
public function log1p(): static
```

```php
public static function max(
    int|float|array|self $value,
    int|float|self ...$values,
): self
```

```php
public static function min(
    int|float|array|self $value,
    int|float|self ...$values,
): self
```

```php
public function mul(int|float|self $num2): static
```

```php
public function oct(): static
```

```php
public static function pi(): self
```

```php
public function pow(int|float|self $exponent): static
```

```php
public function printr(?Str &$return = null): static
```

```php
public function rad2deg(): static
```

```php
public function round(
    int|self $precision = 0,
    int $mode = PHP_ROUND_HALF_UP
): static
```

```php
public function serialize(?string &$return = null): string|static
```

```php
public function sin(): static
```

```php
public function sinh(): static
```

```php
public function sqrt(): static
```

```php
public function sub(int|float|self $num2): static
```

```php
public function tan(): static
```

```php
public function tanh(): static
```

```php
public function vardump(): static
```
