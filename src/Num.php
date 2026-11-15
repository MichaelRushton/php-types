<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Traits\Convert;
use MichaelRushton\Types\Traits\Pipe;
use MichaelRushton\Types\Traits\Through;
use RoundingMode;
use Stringable;

class Num implements NumInterface, Stringable
{
    use Convert;
    use Pipe;
    use Through;

    public const string STR_CLASS = Str::class;

    public protected(set) int|float $value;

    public function __construct(int|float|NumInterface $value)
    {
        $this->value = static::convert($value);
    }

    public function abs(): static
    {
        return new static(abs($this->value));
    }

    public function acos(): static
    {
        return new static(acos($this->value));
    }

    public function acosh(): static
    {
        return new static(acosh($this->value));
    }

    public function add(int|float|NumInterface $num2): static
    {
        return new static($this->value + static::convert($num2));
    }

    public function asin(): static
    {
        return new static(asin($this->value));
    }

    public function asinh(): static
    {
        return new static(asinh($this->value));
    }

    public function atan(): static
    {
        return new static(atan($this->value));
    }

    public function atan2(float|NumInterface $x): static
    {
        return new static(atan2($this->value, static::convert($x)));
    }

    public function atanh(): static
    {
        return new static(atanh($this->value));
    }

    public function bin(): StrInterface
    {
        return $this->toBase(2);
    }

    public function ceil(): static
    {
        return new static(ceil($this->value));
    }

    public function chr(): StrInterface
    {
        return new (static::STR_CLASS)(\chr($this->value));
    }

    public function cos(): static
    {
        return new static(cos($this->value));
    }

    public function cosh(): static
    {
        return new static(cosh($this->value));
    }

    public function deg2rad(): static
    {
        return new static(deg2rad($this->value));
    }

    public function format(
        int|NumInterface $decimals = 0,
        string|Stringable|StrInterface|null $decimal_separator = '.',
        string|Stringable|StrInterface|null $thousands_separator = ','
    ): StrInterface {

        return new (static::STR_CLASS)(number_format(
            $this->value,
            static::convert($decimals),
            static::convert($decimal_separator),
            static::convert($thousands_separator)
        ));

    }

    public function exp(): static
    {
        return new static(exp($this->value));
    }

    public function expm1(): static
    {
        return new static(expm1($this->value));
    }

    public function fdiv(float|NumInterface $num2): static
    {
        return new static(fdiv($this->value, static::convert($num2)));
    }

    public function floor(): static
    {
        return new static(floor($this->value));
    }

    public function fmod(float|NumInterface $num2): static
    {
        return new static(fmod($this->value, static::convert($num2)));
    }

    public function fpow(float|NumInterface $exponent): static
    {
        return new static(fpow($this->value, static::convert($exponent)));
    }

    public function hex(): StrInterface
    {
        return $this->toBase(16);
    }

    public function hypot(float|NumInterface $y): static
    {
        return new static(hypot($this->value, static::convert($y)));
    }

    public function intdiv(int|NumInterface $num2): static
    {
        return new static(intdiv($this->value, static::convert($num2)));
    }

    public function isfinite(): bool
    {
        return is_finite($this->value);
    }

    public function isinfinite(): bool
    {
        return is_infinite($this->value);
    }

    public function isnan(): bool
    {
        return is_nan($this->value);
    }

    public function jsonencode(int|NumInterface $flags = 0): StrInterface|false
    {

        $return = json_encode($this->value, $flags);

        return false === $return ? $return : new (static::STR_CLASS)($return);

    }

    public function log(float|NumInterface $base = M_E): static
    {
        return new static(log($this->value, static::convert($base)));
    }

    public function log10(): static
    {
        return new static(log10($this->value));
    }

    public function log1p(): static
    {
        return new static(log1p($this->value));
    }

    public static function max(
        int|float|NumInterface $value,
        int|float|NumInterface ...$values,
    ): static {
        return new static(max(static::convert($value), ...static::convert($values)));

    }

    public static function min(
        int|float|NumInterface $value,
        int|float|NumInterface ...$values,
    ): static {
        return new static(min(static::convert($value), ...static::convert($values)));
    }

    public function mul(int|float|NumInterface $num2): static
    {
        return new static($this->value * static::convert($num2));
    }

    public function oct(): StrInterface
    {
        return $this->toBase(8);
    }

    public static function pi(): static
    {
        return new static(M_PI);
    }

    public function pow(int|float|NumInterface $exponent): static
    {
        return new static($this->value ** static::convert($exponent));
    }

    public function rad2deg(): static
    {
        return new static(rad2deg($this->value));
    }

    public function round(
        int|NumInterface $precision = 0,
        RoundingMode $mode = RoundingMode::HalfAwayFromZero
    ): static {
        return new static(round($this->value, static::convert($precision), $mode));
    }

    public function serialize(): StrInterface
    {
        return new (static::STR_CLASS)(serialize($this->value));
    }

    public function sin(): static
    {
        return new static(sin($this->value));
    }

    public function sinh(): static
    {
        return new static(sinh($this->value));
    }

    public function sqrt(): static
    {
        return new static(sqrt($this->value));
    }

    public function sub(int|float|NumInterface $num2): static
    {
        return new static($this->value - static::convert($num2));
    }

    public function tan(): static
    {
        return new static(tan($this->value));
    }

    public function tanh(): static
    {
        return new static(tanh($this->value));
    }

    public static function fromBase(
        int|float|string|NumInterface|StrInterface $number,
        int|NumInterface $from_base
    ): static {

        $number = static::convert($number);

        if (10 === $from_base = static::convert($from_base)) {

            if (\is_string($number)) {
                $number = !str_contains($number, '.') ? (int) $number : (float) $number;
            }

        } else {

            $num = (int) base_convert(ltrim(strtok((string) $number, '.'), '-'), $from_base, 10);

            foreach (str_split(strtok('') ?: '') as $k => $v) {
                $num += base_convert($v, $from_base, 10) * $from_base ** (-1 - $k);
            }

            $number = str_starts_with((string) $number, '-') ? 0 - $num : $num;

        }

        return new static($number);

    }

    public function toBase(int|NumInterface $to_base): static|StrInterface
    {

        if (10 === $to_base = static::convert($to_base)) {
            return new static($this->value);
        }

        $num = base_convert((string) (int) $abs = abs($this->value), 10, $to_base) . '.';

        while ($fraction = fmod($fraction ?? $abs, 1) * $to_base) {
            $num .= base_convert((string) (int) $fraction, 10, $to_base);
        }

        return new (static::STR_CLASS)(rtrim($this->value < 0 ? '-' . $num : $num, '.'));

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
