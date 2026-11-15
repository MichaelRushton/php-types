<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use ArrayAccess;
use Iterator;
use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Traits\Convert;
use MichaelRushton\Types\Traits\Pipe;
use MichaelRushton\Types\Traits\Through;
use Stringable;

class Arr implements ArrInterface, ArrayAccess, Iterator
{
    use Convert;
    use Pipe;
    use Through;

    public const string NUM_CLASS = Num::class;
    public const string STR_CLASS = Str::class;

    public protected(set) array $value;

    public function __construct(array|ArrInterface $value = [])
    {
        $this->value = static::convert($value);
    }

    public function advance(): mixed
    {
        return static::object(next($this->value));
    }

    public function all(callable $callback): bool
    {
        return array_all($this->value, $callback);
    }

    public function any(callable $callback): bool
    {
        return array_any($this->value, $callback);
    }

    public function arsort(int $flags = SORT_REGULAR): static
    {

        arsort($this->value, $flags);

        return $this;

    }

    public function asort(int $flags = SORT_REGULAR): static
    {

        asort($this->value, $flags);

        return $this;

    }

    public function changekeycase(int $case = CASE_LOWER): static
    {
        return new static(array_change_key_case($this->value, $case));
    }

    public function chunk(
        int|NumInterface $length,
        bool $preserve_keys = false
    ): static {
        return new static(array_chunk($this->value, static::convert($length), $preserve_keys));
    }

    public function column(
        string|int|Stringable|StrInterface|NumInterface|null $column_key,
        string|int|Stringable|StrInterface|NumInterface|null $index_key = null
    ): static {

        return new static(array_column(
            $this->value,
            static::convert($column_key),
            static::convert($index_key)
        ));

    }

    public function combine(array|ArrInterface $values): static
    {
        return new static(array_combine($this->value, static::convert($values)));
    }

    public function contains(
        mixed $needle,
        bool $strict = false
    ): bool {
        return \in_array(static::convert($needle), $this->value, $strict);
    }

    public function count(int $mode = COUNT_NORMAL): NumInterface
    {
        return new (static::NUM_CLASS)(\count($this->value, $mode));
    }

    public function countvalues(): static
    {
        return new static(array_count_values($this->value));
    }

    public function current(): mixed
    {
        return static::object(current($this->value));
    }

    public function diff(array|ArrInterface ...$arrays): static
    {
        return new static(array_diff($this->value, ...static::convert($arrays)));
    }

    public function diffassoc(array|ArrInterface ...$arrays): static
    {
        return new static(array_diff_assoc($this->value, ...static::convert($arrays)));
    }

    public function diffkey(array|ArrInterface ...$arrays): static
    {
        return new static(array_diff_key($this->value, ...static::convert($arrays)));
    }

    public function diffuassoc(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_diff_uassoc(
            $this->value,
            ...[
                ...static::convert($arrays),
                $key_compare_func,
            ]
        ));

    }

    public function diffukey(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_diff_ukey(
            $this->value,
            ...[
                ...static::convert($arrays),
                $key_compare_func,
            ]
        ));

    }

    public function end(): mixed
    {
        return static::object(end($this->value));
    }

    public static function fill(
        int|NumInterface $start_index,
        int|NumInterface $count,
        mixed $value
    ): static {

        return new static(array_fill(
            static::convert($start_index),
            static::convert($count),
            $value
        ));

    }

    public function fillkeys(mixed $value): static
    {
        return new static(array_fill_keys($this->value, $value));
    }

    public function filter(
        ?callable $callback = null,
        int|NumInterface $mode = 0
    ): static {
        return new static(array_filter($this->value, $callback, static::convert($mode)));
    }

    public function find(callable $callback): mixed
    {
        return static::object(array_find($this->value, $callback));
    }

    public function findkey(callable $callback): StrInterface|NumInterface|null
    {
        return static::object(array_find_key($this->value, $callback));
    }

    public function first(): mixed
    {
        return static::object(array_first($this->value));
    }

    public function flip(): static
    {
        return new static(array_flip($this->value));
    }

    public function implode(string|Stringable|StrInterface $separator): StrInterface|static
    {
        return new (static::STR_CLASS)(implode(static::convert($separator), $this->value));
    }

    public function intersect(array|ArrInterface ...$arrays): static
    {
        return new static(array_intersect($this->value, ...static::convert($arrays)));
    }

    public function intersectassoc(array|ArrInterface ...$arrays): static
    {
        return new static(array_intersect_assoc($this->value, ...static::convert($arrays)));
    }

    public function intersectkey(array|ArrInterface ...$arrays): static
    {
        return new static(array_intersect_key($this->value, ...static::convert($arrays)));
    }

    public function intersectuassoc(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_intersect_uassoc(
            $this->value,
            ...[
                ...static::convert($arrays),
                $key_compare_func,
            ]
        ));

    }

    public function intersectukey(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_intersect_ukey(
            $this->value,
            ...[
                ...static::convert($arrays),
                $key_compare_func,
            ]
        ));

    }

    public function islist(): bool
    {
        return array_is_list($this->value);
    }

    public function jsonencode(
        int|NumInterface $flags = 0,
        int|NumInterface $depth = 512
    ): StrInterface|false {

        $return = json_encode($this->value, $flags, $depth);

        return false === $return ? $return : new (static::STR_CLASS)($return);

    }

    public function key(): StrInterface|NumInterface|null
    {
        return static::object(key($this->value));
    }

    public function keyexists(mixed $key): bool
    {
        return \array_key_exists(static::convert($key), $this->value);
    }

    public function keyfirst(): StrInterface|NumInterface|null
    {
        return static::object(array_key_first($this->value));
    }

    public function keylast(): StrInterface|NumInterface|null
    {
        return static::object(array_key_last($this->value));
    }

    public function keys(
        mixed $filter_value = null,
        bool $strict = false
    ): static {
        return new static(array_keys($this->value, ...\func_get_args()));
    }

    public function krsort(int $flags = SORT_REGULAR): static
    {

        krsort($this->value, $flags);

        return $this;

    }

    public function ksort(int $flags = SORT_REGULAR): static
    {

        ksort($this->value, $flags);

        return $this;

    }

    public function last(): mixed
    {
        return static::object(array_last($this->value));
    }

    public static function localeconv(): static
    {
        return new static(localeconv());
    }

    public function map(
        ?callable $callback,
        array|ArrInterface ...$arrays
    ): static {
        return new static(array_map($callback, $this->value, ...static::convert($arrays)));
    }

    public function max(): mixed
    {
        return static::object(max(static::convert($this->value)));
    }

    public function merge(array|ArrInterface ...$arrays): static
    {
        return new static(array_merge($this->value, ...static::convert($arrays)));
    }

    public function mergerecursive(array|ArrInterface ...$arrays): static
    {
        return new static(array_merge_recursive($this->value, ...static::convert($arrays)));
    }

    public function min(): mixed
    {
        return static::object(min(static::convert($this->value)));
    }

    public function multisort(
        mixed $array1_sort_order = SORT_ASC,
        mixed $array1_sort_flags = SORT_REGULAR,
        mixed ...$rest
    ): static {

        array_multisort(
            $this->value,
            static::convert($array1_sort_order),
            static::convert($array1_sort_flags),
            ...static::convert($rest)
        );

        return $this;

    }

    public function natcasesort(): static
    {

        natcasesort($this->value);

        return $this;

    }

    public function natsort(): static
    {

        natsort($this->value);

        return $this;

    }

    public function next(): void
    {
        next($this->value);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->value[static::convert($offset)]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return static::object($this->value[static::convert($offset)] ?? null);
    }

    public function offsetSet(
        mixed $offset,
        mixed $value
    ): void {
        null === $offset ? $this->value[] = $value : $this->value[static::convert($offset)] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->value[static::convert($offset)]);
    }

    public function pad(
        int|NumInterface $length,
        mixed $value
    ): static {
        return new static(array_pad($this->value, static::convert($length), $value));
    }

    public function pop(): mixed
    {
        return static::object(array_pop($this->value));
    }

    public function pregfilter(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static {

        $return = preg_filter(
            static::convert($pattern),
            static::convert($replacement),
            $this->value,
            static::convert($limit),
            $count
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function preggrep(
        string|Stringable|StrInterface $pattern,
        int $flags = 0
    ): static {
        return new static(preg_grep((string) $pattern, $this->value, $flags) ?: []);
    }

    public function pregreplace(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static {

        $return = preg_replace(
            static::convert($pattern),
            static::convert($replacement),
            $this->value,
            static::convert($limit),
            $count
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function pregreplacecallback(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static {

        $return = preg_replace_callback(
            static::convert($pattern),
            $callback,
            $this->value,
            static::convert($limit),
            $count
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): ?static {

        $return = preg_replace_callback_array(
            static::convert($pattern),
            $this->value,
            static::convert($limit),
            $count,
            $flags
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function prev(): mixed
    {
        return static::object(prev($this->value));
    }

    public function product(): NumInterface
    {
        return new (static::NUM_CLASS)(array_product($this->value));
    }

    public function push(mixed ...$values): NumInterface
    {
        return new (static::NUM_CLASS)(array_push($this->value, ...$values));
    }

    public function rand(int|NumInterface $num = 1): static|NumInterface|StrInterface|null
    {
        return static::object(array_rand($this->value, $num));
    }

    public function reduce(
        callable $callback,
        mixed $initial = null
    ): mixed {
        return array_reduce($this->value, $callback, $initial);
    }

    public function replace(array|ArrInterface ...$replacements): static
    {
        return new static(array_replace($this->value, ...static::convert($replacements)));
    }

    public function replacerecursive(array|ArrInterface ...$replacements): static
    {
        return new static(array_replace_recursive($this->value, ...static::convert($replacements)));
    }

    public static function range(
        string|int|float|Stringable|StrInterface|NumInterface $start,
        string|int|float|Stringable|StrInterface|NumInterface $end,
        int|float|NumInterface $step = 1
    ): static {

        return new static(range(
            static::convert($start),
            static::convert($end),
            static::convert($step)
        ));

    }

    public function reset(): mixed
    {
        return static::object(reset($this->value));
    }

    public function reverse(bool $preserve_keys = false): static
    {
        return new static(array_reverse($this->value, $preserve_keys));
    }

    public function rsort(int $flags = SORT_REGULAR): static
    {

        rsort($this->value, $flags);

        return $this;

    }

    public function rewind(): void
    {
        reset($this->value);
    }

    public function search(
        mixed $needle,
        bool $strict = false
    ): StrInterface|NumInterface|false|static {
        return static::object(array_search($needle, $this->value, $strict));
    }

    public function seek(int|NumInterface $offset): static
    {

        reset($this->value);

        $offset = static::convert($offset);

        while ($offset--) {
            next($this->value);
        }

        return $this;

    }

    public function serialize(): StrInterface
    {
        return new (static::STR_CLASS)(serialize($this->value));
    }

    public function shift(): mixed
    {
        return static::object(array_shift($this->value));
    }

    public function shuffle(): static
    {

        shuffle($this->value);

        return $this;

    }

    public function slice(
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        bool $preserve_keys = false
    ): static {

        return new static(\array_slice(
            $this->value,
            static::convert($offset),
            static::convert($length),
            $preserve_keys
        ));

    }

    public function sort(int $flags = SORT_REGULAR): static
    {

        sort($this->value, $flags);

        return $this;

    }

    public function splice(
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        mixed $replacement = []
    ): static {

        return new static(array_splice(
            $this->value,
            static::convert($offset),
            static::convert($length),
            static::convert($replacement)
        ));

    }

    public function substrreplace(
        string|array|Stringable|StrInterface|ArrInterface $replace,
        int|array|NumInterface|ArrInterface $offset,
        int|array|NumInterface|ArrInterface|null $length = null
    ): static {

        return new static(substr_replace(
            $this->value,
            static::convert($replace),
            static::convert($offset),
            static::convert($length)
        ));

    }

    public function sum(): NumInterface
    {
        return new (static::NUM_CLASS)(array_sum($this->value));
    }

    public function uasort(callable $callback): static
    {

        uasort($this->value, $callback);

        return $this;

    }

    public function udiff(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_udiff(
            $this->value,
            ...[
                ...static::convert($arrays),
                $value_compare_func,
            ]
        ));

    }

    public function udiffassoc(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_udiff_assoc(
            $this->value,
            ...[
                ...static::convert($arrays),
                $value_compare_func,
            ]
        ));

    }

    public function udiffuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_udiff_uassoc(
            $this->value,
            ...[
                ...static::convert($arrays),
                $value_compare_func,
                $key_compare_func,
            ]
        ));

    }

    public function uintersect(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_uintersect(
            $this->value,
            ...[
                ...static::convert($arrays),
                $value_compare_func,
            ]
        ));

    }

    public function uintersectassoc(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_uintersect_assoc(
            $this->value,
            ...[
                ...static::convert($arrays),
                $value_compare_func,
            ]
        ));

    }

    public function uintersectuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        return new static(array_uintersect_uassoc(
            $this->value,
            ...[
                ...static::convert($arrays),
                $value_compare_func,
                $key_compare_func,
            ]
        ));

    }

    public function uksort(callable $callback): static
    {

        uksort($this->value, $callback);

        return $this;

    }

    public function unique(int $flags = SORT_STRING): static
    {

        return new static(array_unique($this->value, $flags));

    }

    public function unshift(mixed ...$values): static
    {

        array_unshift($this->value, ...$values);

        return $this;

    }

    public function usort(callable $callback): static
    {

        usort($this->value, $callback);

        return $this;

    }

    public function valid(): bool
    {
        return null !== key($this->value);
    }

    public function values(): static
    {
        return new static(array_values($this->value));
    }

    public function walk(
        callable $callback,
        mixed $arg = null
    ): static {

        array_walk($this->value, $callback, $arg);

        return $this;

    }

    public function walkrecursive(
        callable $callback,
        mixed $arg = null
    ): static {

        array_walk_recursive($this->value, $callback, $arg);

        return $this;

    }

    protected static function object(mixed $value): mixed
    {

        return match (true) {
            \is_array($value) => new static($value),
            \is_int($value) || \is_float($value) => new (static::NUM_CLASS)($value),
            \is_string($value) => new (static::STR_CLASS)($value),
            default => $value,
        };

    }

    public function __get(string $name): mixed
    {
        return $this->$name()->value;
    }
}
