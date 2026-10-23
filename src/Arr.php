<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use ArrayAccess;
use Iterator;
use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Traits\Extend;
use MichaelRushton\Types\Traits\Pipe;
use MichaelRushton\Types\Traits\Through;
use MichaelRushton\Types\Traits\When;

class Arr implements ArrInterface, ArrayAccess, Iterator
{
    use Extend;
    use Pipe;
    use Through;
    use When;

    public function __construct(
        public protected(set) array $value = []
    ) {
        $this->value = Convert::fromFluentType($value);
    }

    public function advance(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(next($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function all(
        callable $callback,
        ?bool &$return = null
    ): bool|static {

        $return = array_all($this->value, $callback);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function any(
        callable $callback,
        ?bool &$return = null
    ): bool|static {

        $return = array_any($this->value, $callback);

        return 2 === \func_num_args() ? $this : $return;

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

        $this->value = array_change_key_case($this->value, $case);

        return $this;

    }

    public function chunk(
        int|NumInterface $length,
        bool $preserve_keys = false
    ): static {

        $this->value = array_chunk($this->value, Convert::fromFluentType($length), $preserve_keys);

        return $this;

    }

    public function clone(?ArrInterface &$return = null): static
    {

        $return = clone $this;

        return \func_num_args() ? $this : $return;

    }

    public function column(
        string|StrInterface|int|NumInterface|null $column_key,
        string|StrInterface|int|NumInterface|null $index_key = null
    ): static {

        $this->value = array_column(
            $this->value,
            Convert::fromFluentType($column_key),
            Convert::fromFluentType($index_key)
        );

        return $this;

    }

    public function combine(array|ArrInterface $values): static
    {

        $this->value = array_combine($this->value, Convert::fromFluentType($values));

        return $this;

    }

    public function contains(
        mixed $needle,
        bool $strict = false,
        ?bool &$return = null
    ): bool|static {

        $return = \in_array(Convert::fromFluentType($needle), $this->value, $strict);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function count(
        int $mode = COUNT_NORMAL,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(\count($this->value, $mode));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function countvalues(): static
    {

        $this->value = array_count_values($this->value);

        return $this;

    }

    public function current(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(current($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function diff(array|ArrInterface ...$arrays): static
    {

        $this->value = array_diff($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function diffassoc(array|ArrInterface ...$arrays): static
    {

        $this->value = array_diff_assoc($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function diffkey(array|ArrInterface ...$arrays): static
    {

        $this->value = array_diff_key($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function diffuassoc(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_diff_uassoc(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $key_compare_func,
            ]
        );

        return $this;

    }

    public function diffukey(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_diff_ukey(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $key_compare_func,
            ]
        );

        return $this;

    }

    public function end(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(end($this->value));

        return \func_num_args() ? $this : $return;

    }

    public static function fill(
        int|NumInterface $start_index,
        int|NumInterface $count,
        mixed $value
    ): ArrInterface {
        return arr(array_fill(
            Convert::fromFluentType($start_index),
            Convert::fromFluentType($count),
            $value
        ));
    }

    public function fillkeys(mixed $value): static
    {

        $this->value = array_fill_keys($this->value, $value);

        return $this;

    }

    public function filter(
        ?callable $callback = null,
        int $mode = 0
    ): static {

        $this->value = array_filter($this->value, $callback, $mode);

        return $this;

    }

    public function find(
        callable $callback,
        mixed &$return = null
    ): mixed {

        $return = Convert::toFluentType(array_find($this->value, $callback));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function findkey(
        callable $callback,
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null {

        $return = Convert::toFluentType(array_find_key($this->value, $callback));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function first(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(array_first($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function flip(): static
    {

        $this->value = array_flip($this->value);

        return $this;

    }

    public function implode(
        string|StrInterface $separator,
        ?StrInterface &$return = null
    ): StrInterface|static {

        $return = str(implode(Convert::fromFluentType($separator), $this->value));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function intersect(array|ArrInterface ...$arrays): static
    {

        $this->value = array_intersect($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function intersectassoc(array|ArrInterface ...$arrays): static
    {

        $this->value = array_intersect_assoc($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function intersectkey(array|ArrInterface ...$arrays): static
    {

        $this->value = array_intersect_key($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function intersectuassoc(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_intersect_uassoc(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $key_compare_func,
            ]
        );

        return $this;

    }

    public function intersectukey(
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_intersect_ukey(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $key_compare_func,
            ]
        );

        return $this;

    }

    public function islist(?bool &$return = null): bool|static
    {

        $return = array_is_list($this->value);

        return \func_num_args() ? $this : $return;

    }

    public function jsonencode(
        int|NumInterface $flags = 0,
        int|NumInterface $depth = 512,
        string|false|null &$return = null,
    ): string|false|static {

        $return = json_encode($this->value, $flags, $depth);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function key(
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null {

        $return = Convert::toFluentType(key($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function keyexists(
        mixed $key,
        ?bool &$return = null
    ): bool|static {

        $return = \array_key_exists(Convert::fromFluentType($key), $this->value);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function keyfirst(
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null {

        $return = Convert::toFluentType(array_key_first($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function keylast(
        StrInterface|NumInterface|null &$return = null
    ): StrInterface|NumInterface|static|null {

        $return = Convert::toFluentType(array_key_last($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function keys(
        mixed $filter_value = null,
        bool $strict = false
    ): static {

        $this->value = array_keys($this->value, ...\func_get_args());

        return $this;

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

    public function last(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(array_last($this->value));

        return \func_num_args() ? $this : $return;

    }

    public static function localeconv(): ArrInterface
    {
        return arr(localeconv());
    }

    public function map(
        ?callable $callback,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_map($callback, $this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function max(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(max(Convert::fromFluentType($this->value)));

        return \func_num_args() ? $this : $return;

    }

    public function merge(array|ArrInterface ...$arrays): static
    {

        $this->value = array_merge($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function mergerecursive(array|ArrInterface ...$arrays): static
    {

        $this->value = array_merge_recursive($this->value, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function min(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(min(Convert::fromFluentType($this->value)));

        return \func_num_args() ? $this : $return;

    }

    public function multisort(
        mixed $array1_sort_order = SORT_ASC,
        mixed $array1_sort_flags = SORT_REGULAR,
        mixed ...$rest
    ): static {

        array_multisort(
            $this->value,
            Convert::fromFluentType($array1_sort_order),
            Convert::fromFluentType($array1_sort_flags),
            ...Convert::fromFluentType($rest)
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
        return isset($this->value[Convert::fromFluentType($offset)]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return Convert::toFluentType($this->value[Convert::fromFluentType($offset)] ?? null);
    }

    public function offsetSet(
        mixed $offset,
        mixed $value
    ): void {
        null === $offset ? $this->value[] = $value : $this->value[Convert::fromFluentType($offset)] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->value[Convert::fromFluentType($offset)]);
    }

    public function pad(
        int|NumInterface $length,
        mixed $value
    ): static {

        $this->value = array_pad($this->value, Convert::fromFluentType($length), $value);

        return $this;

    }

    public function pop(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(array_pop($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function pregfilter(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static {

        $this->value = preg_filter(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->value,
            Convert::fromFluentType($limit),
            $count
        );

        $count = num($count);

        return $this;

    }

    public function preggrep(
        string|StrInterface $pattern,
        int $flags = 0
    ): static {

        $this->value = preg_grep((string) $pattern, $this->value, $flags) ?: [];

        return $this;

    }

    public function pregreplace(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static {

        $this->value = (array) preg_replace(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->value,
            Convert::fromFluentType($limit),
            $count
        );

        $count = num($count);

        return $this;

    }

    public function pregreplacecallback(
        string|StrInterface|array|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static {

        $this->value = (array) preg_replace_callback(
            Convert::fromFluentType($pattern),
            $callback,
            $this->value,
            Convert::fromFluentType($limit),
            $count
        );

        $count = num($count);

        return $this;

    }

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): static {

        $this->value = (array) preg_replace_callback_array(
            Convert::fromFluentType($pattern),
            $this->value,
            Convert::fromFluentType($limit),
            $count,
            $flags
        );

        $count = num($count);

        return $this;

    }

    public function prev(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(prev($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function printr(?StrInterface &$return = null): static
    {

        $return = print_r($this->value, 0 !== \func_num_args());

        if (\func_num_args()) {
            $return = str($return);
        }

        return $this;

    }

    public function product(?NumInterface &$return = null): NumInterface|static
    {

        $return = num(array_product($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function push(mixed ...$values): static
    {

        array_push($this->value, ...$values);

        return $this;

    }

    public function rand(
        int|NumInterface $num = 1,
        StrInterface|NumInterface|ArrInterface|null &$return = null
    ): StrInterface|NumInterface|static|null {

        $return = Convert::toFluentType(array_rand($this->value, $num));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function reduce(
        callable $callback,
        mixed $initial = null,
        mixed &$return = null
    ): mixed {

        $return = array_reduce($this->value, $callback, $initial);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function replace(array|ArrInterface ...$replacements): static
    {

        $this->value = array_replace($this->value, ...Convert::fromFluentType($replacements));

        return $this;

    }

    public function replacerecursive(array|ArrInterface ...$replacements): static
    {

        $this->value = array_replace_recursive($this->value, ...Convert::fromFluentType($replacements));

        return $this;

    }

    public static function range(
        string|StrInterface|int|float|NumInterface $start,
        string|StrInterface|int|float|NumInterface $end,
        int|float|NumInterface $step = 1
    ): ArrInterface {

        return arr(range(
            Convert::fromFluentType($start),
            Convert::fromFluentType($end),
            Convert::fromFluentType($step)
        ));

    }

    public function reset(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(reset($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function reverse(bool $preserve_keys = false): static
    {

        $this->value = array_reverse($this->value, $preserve_keys);

        return $this;

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
        bool $strict = false,
        StrInterface|NumInterface|false|null &$return = null
    ): StrInterface|NumInterface|false|static {

        $return = Convert::toFluentType(array_search($needle, $this->value, $strict));

        return 3 === \func_num_args() ? $this : $return;

    }

    public function seek(int|NumInterface $offset): static
    {

        reset($this->value);

        $offset = Convert::fromFluentType($offset);

        while ($offset--) {
            next($this->value);
        }

        return $this;

    }

    public function serialize(?string &$return = null): string|static
    {

        $return = serialize($this->value);

        return \func_num_args() ? $this : $return;

    }

    public function shift(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(array_shift($this->value));

        return \func_num_args() ? $this : $return;

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

        $this->value = \array_slice(
            $this->value,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length),
            $preserve_keys
        );

        return $this;

    }

    public function sort(int $flags = SORT_REGULAR): static
    {

        sort($this->value, $flags);

        return $this;

    }

    public function splice(
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        mixed $replacement = [],
        ?ArrInterface &$return = null
    ): static {

        $return = arr(array_splice(
            $this->value,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length),
            Convert::fromFluentType($replacement)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function substrreplace(
        string|StrInterface|array|ArrInterface $replace,
        int|NumInterface|array|ArrInterface $offset,
        int|NumInterface|array|ArrInterface|null $length = null
    ): static {

        $this->value = substr_replace(
            $this->value,
            Convert::fromFluentType($replace),
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        );

        return $this;

    }

    public function sum(?NumInterface &$return = null): NumInterface|static
    {

        $return = num(array_sum($this->value));

        return \func_num_args() ? $this : $return;

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

        $this->value = array_udiff(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $value_compare_func,
            ]
        );

        return $this;

    }

    public function udiffassoc(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_udiff_assoc(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $value_compare_func,
            ]
        );

        return $this;

    }

    public function udiffuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_udiff_uassoc(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $value_compare_func,
                $key_compare_func,
            ]
        );

        return $this;

    }

    public function uintersect(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_uintersect(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $value_compare_func,
            ]
        );

        return $this;

    }

    public function uintersectassoc(
        callable $value_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_uintersect_assoc(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $value_compare_func,
            ]
        );

        return $this;

    }

    public function uintersectuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|ArrInterface ...$arrays
    ): static {

        $this->value = array_uintersect_uassoc(
            $this->value,
            ...[
                ...Convert::fromFluentType($arrays),
                $value_compare_func,
                $key_compare_func,
            ]
        );

        return $this;

    }

    public function uksort(callable $callback): static
    {

        uksort($this->value, $callback);

        return $this;

    }

    public function unique(int $flags = SORT_STRING): static
    {

        $this->value = array_unique($this->value, $flags);

        return $this;

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

        $this->value = array_values($this->value);

        return $this;

    }

    public function vardump(): static
    {

        var_dump($this->value);

        return $this;

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

    public function __get(string $name): mixed
    {
        return $this->$name()->value;
    }
}
