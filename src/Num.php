<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Traits\Extend;
use Stringable;

class Num implements Stringable
{
    use Extend;

    protected int|float $number;
    protected int $base;

    public function __construct(
        int|float|string|Str $number = 0.00,
        int|self $base = 10
    ) {

        $number = Convert::fromFluentType($number);

        $this->base = Convert::fromFluentType($base);

        $this->number = match (true) {
            10 !== $this->base => Convert::toBase10($number, $this->base),
            \is_string($number) => false === strpos($number, '.') ? (int) $number : (float) $number,
            default => $number,
        };

    }

    public function abs(): static
    {

        $this->number = abs($this->number);

        return $this;

    }

    public function acos(): static
    {

        $this->number = acos($this->number);

        return $this;

    }

    public function acosh(): static
    {

        $this->number = acosh($this->number);

        return $this;

    }

    public function add(int|float|self $num2): static
    {

        $this->number += Convert::fromFluentType($num2);

        return $this;

    }

    public function asin(): static
    {

        $this->number = asin($this->number);

        return $this;

    }

    public function asinh(): static
    {

        $this->number = asinh($this->number);

        return $this;

    }

    public function atan(): static
    {

        $this->number = atan($this->number);

        return $this;

    }

    public function atan2(float|self $x): static
    {

        $this->number = atan2($this->number, Convert::fromFluentType($x));

        return $this;

    }

    public function atanh(): static
    {

        $this->number = atanh($this->number);

        return $this;

    }

    public function base(?self &$return = null): int|self
    {

        $return = num($this->base);

        return \func_num_args() ? $this : $return;

    }

    public function baseconvert(int|self $to_base): static
    {

        $this->base = Convert::fromFluentType($to_base);

        return $this;

    }

    public function bin(): static
    {

        $this->base = 2;

        return $this;

    }

    public function ceil(): static
    {

        $this->number = ceil($this->number);

        return $this;

    }

    public function chr(?Str &$return = null): Str|static
    {

        $return = str(\chr($this->number));

        return \func_num_args() ? $this : $return;

    }

    public function clone(?self &$return = null): static
    {

        $return = clone $this;

        return \func_num_args() ? $this : $return;

    }

    public function cos(): static
    {

        $this->number = cos($this->number);

        return $this;

    }

    public function cosh(): static
    {

        $this->number = cosh($this->number);

        return $this;

    }

    final public function dec(): static
    {

        $this->base = 10;

        return $this;

    }

    public function deg2rad(): static
    {

        $this->number = deg2rad($this->number);

        return $this;

    }

    public function echo(): static
    {

        echo $this->number;

        return $this;

    }

    public function format(
        int|self $decimals,
        string|Str|null $decimal_separator = '.',
        string|Str|null $thousands_separator  = ',',
        ?Str &$return = null
    ): Str|static {

        $return = str(number_format(
            $this->number,
            Convert::fromFluentType($decimals),
            Convert::fromFluentType($decimal_separator),
            Convert::fromFluentType($thousands_separator)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function exp(): static
    {

        $this->number = exp($this->number);

        return $this;

    }

    public function expm1(): static
    {

        $this->number = expm1($this->number);

        return $this;

    }

    public function fdiv(float|self $num2): static
    {

        $this->number = fdiv($this->number, Convert::fromFluentType($num2));

        return $this;

    }

    public function floor(): static
    {

        $this->number = floor($this->number);

        return $this;

    }

    public function fmod(float|self $num2): static
    {

        $this->number = fmod($this->number, Convert::fromFluentType($num2));

        return $this;

    }

    public function fpow(float|self $exponent): static
    {

        $this->number = fpow($this->number, Convert::fromFluentType($exponent));

        return $this;

    }

    public function hex(): static
    {

        $this->base = 16;

        return $this;

    }

    public function hypot(float|self $y): static
    {

        $this->number = hypot($this->number, Convert::fromFluentType($y));

        return $this;

    }

    public function intdiv(int|self $num2): static
    {

        $this->number = intdiv($this->number, Convert::fromFluentType($num2));

        return $this;

    }

    public function isfinite(?bool &$return = null): bool|static
    {

        $return = is_finite($this->number);

        return \func_num_args() ? $this : $return;

    }

    public function isinfinite(?bool &$return = null): bool|static
    {

        $return = is_infinite($this->number);

        return \func_num_args() ? $this : $return;

    }

    public function isnan(?bool &$return = null): bool|static
    {

        $return = is_nan($this->number);

        return \func_num_args() ? $this : $return;

    }

    public function log(float|self $base = M_E): static
    {

        $this->number = log($this->number, Convert::fromFluentType($base));

        return $this;

    }

    public function log10(): static
    {

        $this->number = log10($this->number);

        return $this;

    }

    public function log1p(): static
    {

        $this->number = log1p($this->number);

        return $this;

    }

    public static function max(
        int|float|array|self $value,
        int|float|self ...$values,
    ): self {
        return num(max(Convert::fromFluentType($value), ...Convert::fromFluentType($values)));
    }

    public static function min(
        int|float|array|self $value,
        int|float|self ...$values,
    ): self {
        return num(min(Convert::fromFluentType($value), ...Convert::fromFluentType($values)));
    }

    public function mul(int|float|self $num2): static
    {

        $this->number *= Convert::fromFluentType($num2);

        return $this;

    }

    public function oct(): static
    {

        $this->base = 8;

        return $this;

    }

    public static function pi(): self
    {
        return num(M_PI);
    }

    public function pow(int|float|self $exponent): static
    {

        $this->number = pow($this->number, Convert::fromFluentType($exponent));

        return $this;

    }

    public function printr(?Str &$return = null): static
    {

        $return = print_r($this->number, 0 !== \func_num_args());

        if (\func_num_args()) {
            $return = str($return);
        }

        return $this;

    }

    public function rad2deg(): static
    {

        $this->number = rad2deg($this->number);

        return $this;

    }

    public function round(
        int|self $precision = 0,
        int $mode = PHP_ROUND_HALF_UP
    ): static {

        $this->number = round($this->number, Convert::fromFluentType($precision), $mode);

        return $this;

    }

    public function serialize(?string &$return = null): string|static
    {

        $return = serialize($this->number);

        return \func_num_args() ? $this : $return;

    }

    public function sin(): static
    {

        $this->number = sin($this->number);

        return $this;

    }

    public function sinh(): static
    {

        $this->number = sinh($this->number);

        return $this;

    }

    public function sqrt(): static
    {

        $this->number = sqrt($this->number);

        return $this;

    }

    public function sub(int|float|self $num2): static
    {

        $this->number -= Convert::fromFluentType($num2);

        return $this;

    }

    public function tan(): static
    {

        $this->number = tan($this->number);

        return $this;

    }

    public function tanh(): static
    {

        $this->number = tanh($this->number);

        return $this;

    }

    public function vardump(): static
    {

        var_dump($this->number);

        return $this;

    }

    final public function __get(string $name): mixed
    {
        return $this->$name()();
    }

    final public function __invoke(): int|float|string
    {

        if (10 === $this->base) {
            return $this->number;
        }

        return Convert::fromBase10($this->number, $this->base);

    }

    final public function __toString(): string
    {
        return (string) $this();
    }
}
