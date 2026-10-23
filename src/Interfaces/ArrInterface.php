<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Interfaces;

interface ArrInterface
{
    public array $value { get; }

    public function advance(mixed &$return = null): mixed;

    public function all(
        callable $callback,
        ?bool &$return = null
    ): bool|static;

    public function any(
        callable $callback,
        ?bool &$return = null
    ): bool|static;

    public function arsort(int $flags = SORT_REGULAR): static;

    public function asort(int $flags = SORT_REGULAR): static;

    public function changekeycase(int $case = CASE_LOWER): static;

    public function chunk(
        int|NumInterface $length,
        bool $preserve_keys = false
    ): static;

    public function clone(?ArrInterface &$return = null): static;

    public function column(
        string|StrInterface|int|NumInterface|null $column_key,
        string|StrInterface|int|NumInterface|null $index_key = null
    ): static;

    public function combine(array|ArrInterface $values): static;

    public function contains(
        mixed $needle,
        bool $strict = false,
        ?bool &$return = null
    ): bool|static;

    public function count(
        int $mode = COUNT_NORMAL,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function countvalues(): static;

    public function current(mixed &$return = null): mixed;

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

    public function end(mixed &$return = null): mixed;

    public static function fill(
        int|NumInterface $start_index,
        int|NumInterface $count,
        mixed $value
    ): ArrInterface;

    public function fillkeys(mixed $value): static;

    public function filter(
        ?callable $callback = null,
        int $mode = 0
    ): static;

    public function find(
        callable $callback,
        mixed &$return = null
    ): mixed;

    public function findkey(
        callable $callback,
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null;

    public function first(mixed &$return = null): mixed;

    public function flip(): static;

    public function implode(
        string|StrInterface $separator,
        ?StrInterface &$return = null
    ): StrInterface|static;

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

    public function islist(?bool &$return = null): bool|static;

    public function jsonencode(
        int|NumInterface $flags = 0,
        int|NumInterface $depth = 512,
        string|false|null &$return = null,
    ): string|false|static;

    public function key(
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null;

    public function keyexists(
        mixed $key,
        ?bool &$return = null
    ): bool|static;

    public function keyfirst(
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null;

    public function keylast(
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null;

    public function keys(
        mixed $filter_value = null,
        bool $strict = false
    ): static;

    public function krsort(int $flags = SORT_REGULAR): static;

    public function ksort(int $flags = SORT_REGULAR): static;

    public function last(mixed &$return = null): mixed;

    public static function localeconv(): ArrInterface;

    public function map(
        ?callable $callback,
        array|ArrInterface ...$arrays
    ): static;

    public function max(mixed &$return = null): mixed;

    public function merge(array|ArrInterface ...$arrays): static;

    public function mergerecursive(array|ArrInterface ...$arrays): static;

    public function min(mixed &$return = null): mixed;

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

    public function pop(mixed &$return = null): mixed;

    public function pregfilter(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static;

    public function preggrep(
        string|StrInterface $pattern,
        int $flags = 0
    ): static;

    public function pregreplace(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static;

    public function pregreplacecallback(
        string|StrInterface|array|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static;

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): static;

    public function prev(mixed &$return = null): mixed;

    public function printr(?StrInterface &$return = null): static;

    public function product(?NumInterface &$return = null): NumInterface|static;

    public function push(mixed ...$values): static;

    public function rand(
        int|NumInterface $num = 1,
        StrInterface|NumInterface|ArrInterface|null &$return = null
    ): StrInterface|NumInterface|static|null;

    public function reduce(
        callable $callback,
        mixed $initial = null,
        mixed &$return = null
    ): mixed;

    public function replace(array|ArrInterface ...$replacements): static;

    public function replacerecursive(array|ArrInterface ...$replacements): static;

    public static function range(
        string|StrInterface|int|float|NumInterface $start,
        string|StrInterface|int|float|NumInterface $end,
        int|float|NumInterface $step = 1
    ): ArrInterface;

    public function reset(mixed &$return = null): mixed;

    public function reverse(bool $preserve_keys = false): static;

    public function rsort(int $flags = SORT_REGULAR): static;

    public function rewind(): void;

    public function search(
        mixed $needle,
        bool $strict = false,
        StrInterface|NumInterface|false|null &$return = null
    ): StrInterface|NumInterface|false|static;

    public function seek(int|NumInterface $offset): static;

    public function serialize(?string &$return = null): string|static;

    public function shift(mixed &$return = null): mixed;

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
        mixed $replacement = [],
        ?ArrInterface &$return = null
    ): static;

    public function substrreplace(
        string|StrInterface|array|ArrInterface $replace,
        int|NumInterface|array|ArrInterface $offset,
        int|NumInterface|array|ArrInterface|null $length = null
    ): static;

    public function sum(?NumInterface &$return = null): NumInterface|static;

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

    public function vardump(): static;

    public function walk(
        callable $callback,
        mixed $arg = null
    ): static;

    public function walkrecursive(
        callable $callback,
        mixed $arg = null
    ): static;

    public static function class(): string;

    public static function extend(string|ArrInterface $class): void;

    public function pipe(callable $callback): mixed;

    public function through(callable $callback): static;

    public function when(
        mixed $value,
        ?callable $if_true = null,
        ?callable $if_false = null
    ): static;

    public function __get(string $name): mixed;
}
