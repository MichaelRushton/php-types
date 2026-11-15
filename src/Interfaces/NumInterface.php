<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Interfaces;

use RoundingMode;
use Stringable;

interface NumInterface
{
    public int|float $value { get; }

    public function abs(): static;

    public function acos(): static;

    public function acosh(): static;

    public function add(int|float|NumInterface $num2): static;

    public function asin(): static;

    public function asinh(): static;

    public function atan(): static;

    public function atan2(float|NumInterface $x): static;

    public function atanh(): static;

    public function bin(): StrInterface;

    public function ceil(): static;

    public function chr(): StrInterface;

    public function cos(): static;

    public function cosh(): static;

    public function deg2rad(): static;

    public function format(
        int|NumInterface $decimals = 0,
        string|Stringable|StrInterface|null $decimal_separator = '.',
        string|Stringable|StrInterface|null $thousands_separator = ','
    ): StrInterface;

    public function exp(): static;

    public function expm1(): static;

    public function fdiv(float|NumInterface $num2): static;

    public function floor(): static;

    public function fmod(float|NumInterface $num2): static;

    public function fpow(float|NumInterface $exponent): static;

    public function hex(): StrInterface;

    public function hypot(float|NumInterface $y): static;

    public function intdiv(int|NumInterface $num2): static;

    public function isfinite(): bool;

    public function isinfinite(): bool;

    public function isnan(): bool;

    public function jsonencode(int|NumInterface $flags = 0): StrInterface|false;

    public function log(float|NumInterface $base = M_E): static;

    public function log10(): static;

    public function log1p(): static;

    public static function max(
        int|float|NumInterface $value,
        int|float|NumInterface ...$values,
    ): static;

    public static function min(
        int|float|NumInterface $value,
        int|float|NumInterface ...$values,
    ): static;

    public function mul(int|float|NumInterface $num2): static;

    public function oct(): StrInterface;

    public static function pi(): static;

    public function pow(int|float|NumInterface $exponent): static;

    public function rad2deg(): static;

    public function round(
        int|NumInterface $precision = 0,
        RoundingMode $mode = RoundingMode::HalfAwayFromZero
    ): static;

    public function serialize(): StrInterface;

    public function sin(): static;

    public function sinh(): static;

    public function sqrt(): static;

    public function sub(int|float|NumInterface $num2): static;

    public function tan(): static;

    public function tanh(): static;

    public static function fromBase(
        int|float|string|NumInterface|StrInterface $number,
        int|NumInterface $from_base
    ): static;

    public function toBase(int|NumInterface $to_base): static|StrInterface;

    public function pipe(callable $callback): mixed;

    public function through(callable $callback): static;

    public function __get(string $name): mixed;

    public function __toString(): string;
}
