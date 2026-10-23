<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Traits\Extend;
use MichaelRushton\Types\Traits\Pipe;
use MichaelRushton\Types\Traits\Through;
use MichaelRushton\Types\Traits\When;
use Stringable;

class Num implements NumInterface, Stringable
{
    use Extend;
    use Pipe;
    use Through;
    use When;

    public protected(set) int|float|string $value {
        get => 10 === $this->base ? $this->value : Convert::fromBase10($this->value, $this->base);
    }

    protected int $base;

    public function __construct(
        int|float|string|StrInterface $number = 0.00,
        int|NumInterface $base = 10
    ) {

        $number = Convert::fromFluentType($number);

        $this->base = Convert::fromFluentType($base);

        $this->value = match (true) {
            10 !== $this->base => Convert::toBase10($number, $this->base),
            \is_string($number) => !str_contains($number, '.') ? (int) $number : (float) $number,
            default => $number,
        };

    }

    public function abs(): static
    {

        $this->value = abs($this->value);

        return $this;

    }

    public function acos(): static
    {

        $this->value = acos($this->value);

        return $this;

    }

    public function acosh(): static
    {

        $this->value = acosh($this->value);

        return $this;

    }

    public function add(int|float|NumInterface $num2): static
    {

        $this->value += Convert::fromFluentType($num2);

        return $this;

    }

    public function asin(): static
    {

        $this->value = asin($this->value);

        return $this;

    }

    public function asinh(): static
    {

        $this->value = asinh($this->value);

        return $this;

    }

    public function atan(): static
    {

        $this->value = atan($this->value);

        return $this;

    }

    public function atan2(float|NumInterface $x): static
    {

        $this->value = atan2($this->value, Convert::fromFluentType($x));

        return $this;

    }

    public function atanh(): static
    {

        $this->value = atanh($this->value);

        return $this;

    }

    public function base(?NumInterface &$return = null): int|NumInterface
    {

        $return = num($this->base);

        return \func_num_args() ? $this : $return;

    }

    public function baseconvert(int|NumInterface $to_base): static
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

        $this->value = ceil($this->value);

        return $this;

    }

    public function chr(?StrInterface &$return = null): StrInterface|static
    {

        $return = str(\chr($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function clone(?NumInterface &$return = null): static
    {

        $return = clone $this;

        return \func_num_args() ? $this : $return;

    }

    public function cos(): static
    {

        $this->value = cos($this->value);

        return $this;

    }

    public function cosh(): static
    {

        $this->value = cosh($this->value);

        return $this;

    }

    public function dec(): static
    {

        $this->base = 10;

        return $this;

    }

    public function deg2rad(): static
    {

        $this->value = deg2rad($this->value);

        return $this;

    }

    public function echo(): static
    {

        echo $this->value;

        return $this;

    }

    public function format(
        int|NumInterface $decimals,
        string|StrInterface|null $decimal_separator = '.',
        string|StrInterface|null $thousands_separator = ',',
        ?StrInterface &$return = null
    ): StrInterface|static {

        $return = str(number_format(
            $this->value,
            Convert::fromFluentType($decimals),
            Convert::fromFluentType($decimal_separator),
            Convert::fromFluentType($thousands_separator)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function exp(): static
    {

        $this->value = exp($this->value);

        return $this;

    }

    public function expm1(): static
    {

        $this->value = expm1($this->value);

        return $this;

    }

    public function fdiv(float|NumInterface $num2): static
    {

        $this->value = fdiv($this->value, Convert::fromFluentType($num2));

        return $this;

    }

    public function floor(): static
    {

        $this->value = floor($this->value);

        return $this;

    }

    public function fmod(float|NumInterface $num2): static
    {

        $this->value = fmod($this->value, Convert::fromFluentType($num2));

        return $this;

    }

    public function fpow(float|NumInterface $exponent): static
    {

        $this->value = fpow($this->value, Convert::fromFluentType($exponent));

        return $this;

    }

    public function hex(): static
    {

        $this->base = 16;

        return $this;

    }

    public function hypot(float|NumInterface $y): static
    {

        $this->value = hypot($this->value, Convert::fromFluentType($y));

        return $this;

    }

    public function intdiv(int|NumInterface $num2): static
    {

        $this->value = intdiv($this->value, Convert::fromFluentType($num2));

        return $this;

    }

    public function isfinite(?bool &$return = null): bool|static
    {

        $return = is_finite($this->value);

        return \func_num_args() ? $this : $return;

    }

    public function isinfinite(?bool &$return = null): bool|static
    {

        $return = is_infinite($this->value);

        return \func_num_args() ? $this : $return;

    }

    public function isnan(?bool &$return = null): bool|static
    {

        $return = is_nan($this->value);

        return \func_num_args() ? $this : $return;

    }

    public function log(float|NumInterface $base = M_E): static
    {

        $this->value = log($this->value, Convert::fromFluentType($base));

        return $this;

    }

    public function log10(): static
    {

        $this->value = log10($this->value);

        return $this;

    }

    public function log1p(): static
    {

        $this->value = log1p($this->value);

        return $this;

    }

    public static function max(
        int|float|array|NumInterface $value,
        int|float|NumInterface ...$values,
    ): NumInterface {
        return num(max(Convert::fromFluentType($value), ...Convert::fromFluentType($values)));
    }

    public static function min(
        int|float|array|NumInterface $value,
        int|float|NumInterface ...$values,
    ): NumInterface {
        return num(min(Convert::fromFluentType($value), ...Convert::fromFluentType($values)));
    }

    public function mul(int|float|NumInterface $num2): static
    {

        $this->value *= Convert::fromFluentType($num2);

        return $this;

    }

    public function oct(): static
    {

        $this->base = 8;

        return $this;

    }

    public static function pi(): NumInterface
    {
        return num(M_PI);
    }

    public function pow(int|float|NumInterface $exponent): static
    {

        $this->value = $this->value ** Convert::fromFluentType($exponent);

        return $this;

    }

    public function printr(?StrInterface &$return = null): static
    {

        $return = print_r($this->value, 0 !== \func_num_args());

        if (\func_num_args()) {
            $return = str($return);
        }

        return $this;

    }

    public function rad2deg(): static
    {

        $this->value = rad2deg($this->value);

        return $this;

    }

    public function round(
        int|NumInterface $precision = 0,
        int $mode = PHP_ROUND_HALF_UP
    ): static {

        $this->value = round($this->value, Convert::fromFluentType($precision), $mode);

        return $this;

    }

    public function serialize(?string &$return = null): string|static
    {

        $return = serialize($this->value);

        return \func_num_args() ? $this : $return;

    }

    public function sin(): static
    {

        $this->value = sin($this->value);

        return $this;

    }

    public function sinh(): static
    {

        $this->value = sinh($this->value);

        return $this;

    }

    public function sqrt(): static
    {

        $this->value = sqrt($this->value);

        return $this;

    }

    public function sub(int|float|NumInterface $num2): static
    {

        $this->value -= Convert::fromFluentType($num2);

        return $this;

    }

    public function tan(): static
    {

        $this->value = tan($this->value);

        return $this;

    }

    public function tanh(): static
    {

        $this->value = tanh($this->value);

        return $this;

    }

    public function vardump(): static
    {

        var_dump($this->value);

        return $this;

    }

    public function __get(string $name): mixed
    {
        return $this->$name()->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
