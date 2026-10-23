<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Interfaces;

interface NumInterface
{
    public int|float|string $value { get; }

    public function abs(): static;

    public function acos(): static;

    public function acosh(): static;

    public function add(int|float|NumInterface $num2): static;

    public function asin(): static;

    public function asinh(): static;

    public function atan(): static;

    public function atan2(float|NumInterface $x): static;

    public function atanh(): static;

    public function base(?NumInterface &$return = null): int|NumInterface;

    public function baseconvert(int|NumInterface $to_base): static;

    public function bin(): static;

    public function ceil(): static;

    public function chr(?StrInterface &$return = null): StrInterface|static;

    public function clone(?NumInterface &$return = null): static;

    public function cos(): static;

    public function cosh(): static;

    public function dec(): static;

    public function deg2rad(): static;

    public function echo(): static;

    public function format(
        int|NumInterface $decimals,
        string|StrInterface|null $decimal_separator = '.',
        string|StrInterface|null $thousands_separator = ',',
        ?StrInterface &$return = null
    ): StrInterface|static;

    public function exp(): static;

    public function expm1(): static;

    public function fdiv(float|NumInterface $num2): static;

    public function floor(): static;

    public function fmod(float|NumInterface $num2): static;

    public function fpow(float|NumInterface $exponent): static;

    public function hex(): static;

    public function hypot(float|NumInterface $y): static;

    public function intdiv(int|NumInterface $num2): static;

    public function isfinite(?bool &$return = null): bool|static;

    public function isinfinite(?bool &$return = null): bool|static;

    public function isnan(?bool &$return = null): bool|static;

    public function log(float|NumInterface $base = M_E): static;

    public function log10(): static;

    public function log1p(): static;

    public static function max(
        int|float|array|NumInterface $value,
        int|float|NumInterface ...$values,
    ): NumInterface;

    public static function min(
        int|float|array|NumInterface $value,
        int|float|NumInterface ...$values,
    ): NumInterface;

    public function mul(int|float|NumInterface $num2): static;

    public function oct(): static;

    public static function pi(): NumInterface;

    public function pow(int|float|NumInterface $exponent): static;

    public function printr(?StrInterface &$return = null): static;

    public function rad2deg(): static;

    public function round(
        int|NumInterface $precision = 0,
        int $mode = PHP_ROUND_HALF_UP
    ): static;

    public function serialize(?string &$return = null): string|static;

    public function sin(): static;

    public function sinh(): static;

    public function sqrt(): static;

    public function sub(int|float|NumInterface $num2): static;

    public function tan(): static;

    public function tanh(): static;

    public function vardump(): static;

    public static function class(): string;

    public static function extend(string|NumInterface $class): void;

    public function pipe(callable $callback): mixed;

    public function through(callable $callback): static;

    public function when(
        mixed $value,
        ?callable $if_true = null,
        ?callable $if_false = null
    ): static;

    public function __get(string $name): mixed;

    public function __toString(): string;
}
