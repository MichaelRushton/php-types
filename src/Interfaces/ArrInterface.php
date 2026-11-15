<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Interfaces;

use Stringable;

interface ArrInterface
{
    public array $value { get; }

    public function advance(): mixed;

    public function all(callable $callback): bool;

    public function any(callable $callback): bool;

    public function arsort(int $flags = SORT_REGULAR): static;

    public function asort(int $flags = SORT_REGULAR): static;

    public function changekeycase(int $case = CASE_LOWER): static;

    public function chunk(
        int|NumInterface $length,
        bool $preserve_keys = false
    ): static;

    public function column(
        string|int|Stringable|StrInterface|NumInterface|null $column_key,
        string|int|Stringable|StrInterface|NumInterface|null $index_key = null
    ): static;

    public function combine(array|ArrInterface $values): static;

    public function contains(
        mixed $needle,
        bool $strict = false
    ): bool;

    public function count(int $mode = COUNT_NORMAL): NumInterface;

    public function countvalues(): static;

    public function current(): mixed;

    public function diff(array|ArrInterface ...$arrays): static;

    public function diffassoc(array|ArrInterface ...$arrays): static;

    public function diffkey(array|ArrInterface ...$arrays): static;

    public function diffuassoc(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function diffukey(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function end(): mixed;

    public static function fill(
        int|NumInterface $start_index,
        int|NumInterface $count,
        mixed $value
    ): static;

    public function fillkeys(mixed $value): static;

    public function filter(
        ?callable $callback = null,
        int|NumInterface $mode = 0
    ): static;

    public function find(callable $callback): mixed;

    public function findkey(callable $callback): StrInterface|NumInterface|null;

    public function first(): mixed;

    public function flip(): static;

    public function implode(string|Stringable|StrInterface $separator): StrInterface|static;

    public function intersect(array|ArrInterface ...$arrays): static;

    public function intersectassoc(array|ArrInterface ...$arrays): static;

    public function intersectkey(array|ArrInterface ...$arrays): static;

    public function intersectuassoc(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function intersectukey(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function islist(): bool;

    public function jsonencode(
        int|NumInterface $flags = 0,
        int|NumInterface $depth = 512
    ): StrInterface|false;

    public function key(): StrInterface|NumInterface|null;

    public function keyexists(mixed $key): bool;

    public function keyfirst(): StrInterface|NumInterface|null;

    public function keylast(): StrInterface|NumInterface|null;

    public function keys(
        mixed $filter_value = null,
        bool $strict = false
    ): static;

    public function krsort(int $flags = SORT_REGULAR): static;

    public function ksort(int $flags = SORT_REGULAR): static;

    public function last(): mixed;

    public static function localeconv(): static;

    public function map(
        ?callable $callback,
        array|ArrInterface ...$arrays
    ): static;

    public function max(): mixed;

    public function merge(array|ArrInterface ...$arrays): static;

    public function mergerecursive(array|ArrInterface ...$arrays): static;

    public function min(): mixed;

    public function multisort(
        mixed $array1_sort_order = SORT_ASC,
        mixed $array1_sort_flags = SORT_REGULAR,
        mixed ...$rest
    ): static;

    public function natcasesort(): static;

    public function natsort(): static;

    public function next(): void;

    public function offsetExists(mixed $offset): bool;

    public function offsetGet(mixed $offset): mixed;

    public function offsetSet(
        mixed $offset,
        mixed $value
    ): void;

    public function offsetUnset(mixed $offset): void;

    public function pad(
        int|NumInterface $length,
        mixed $value
    ): static;

    public function pop(): mixed;

    public function pregfilter(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static;

    public function preggrep(
        string|Stringable|StrInterface $pattern,
        int $flags = 0
    ): static;

    public function pregreplace(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static;

    public function pregreplacecallback(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static;

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): ?static;

    public function prev(): mixed;

    public function product(): NumInterface;

    public function push(mixed ...$values): NumInterface;

    public function rand(int|NumInterface $num = 1): static|NumInterface|StrInterface|null;

    public function reduce(
        callable $callback,
        mixed $initial = null
    ): mixed;

    public function replace(array|ArrInterface ...$replacements): static;

    public function replacerecursive(array|ArrInterface ...$replacements): static;

    public static function range(
        string|int|float|Stringable|StrInterface|NumInterface $start,
        string|int|float|Stringable|StrInterface|NumInterface $end,
        int|float|NumInterface $step = 1
    ): static;

    public function reset(): mixed;

    public function reverse(bool $preserve_keys = false): static;

    public function rsort(int $flags = SORT_REGULAR): static;

    public function rewind(): void;

    public function search(
        mixed $needle,
        bool $strict = false
    ): StrInterface|NumInterface|false|static;

    public function seek(int|NumInterface $offset): static;

    public function serialize(): StrInterface;

    public function shift(): mixed;

    public function shuffle(): static;

    public function slice(
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        bool $preserve_keys = false
    ): static;

    public function sort(int $flags = SORT_REGULAR): static;

    public function splice(
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        mixed $replacement = []
    ): static;

    public function substrreplace(
        string|array|Stringable|StrInterface|ArrInterface $replace,
        int|array|NumInterface|ArrInterface $offset,
        int|array|NumInterface|ArrInterface|null $length = null
    ): static;

    public function sum(): NumInterface;

    public function uasort(callable $callback): static;

    public function udiff(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function udiffassoc(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function udiffuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function uintersect(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function uintersectassoc(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function uintersectuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static;

    public function uksort(callable $callback): static;

    public function unique(int $flags = SORT_STRING): static;

    public function unshift(mixed ...$values): static;

    public function usort(callable $callback): static;

    public function valid(): bool;

    public function values(): static;

    public function walk(
        callable $callback,
        mixed $arg = null
    ): static;

    public function walkrecursive(
        callable $callback,
        mixed $arg = null
    ): static;

    public function pipe(callable $callback): mixed;

    public function through(callable $callback): static;

    public function __get(string $name): mixed;
}
