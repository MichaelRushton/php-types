<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use ArrayAccess;
use Iterator;
use MichaelRushton\Types\Traits\Extend;

class Arr implements ArrayAccess, Iterator
{
    use Extend;

    public function __construct(protected array $array = [])
    {
        $this->array = Convert::fromFluentType($array);
    }

    public function advance(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(next($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function all(
        callable $callback,
        ?bool &$return = null
    ): bool|static {

        $return = array_all($this->array, $callback);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function any(
        callable $callback,
        ?bool &$return = null
    ): bool|static {

        $return = array_any($this->array, $callback);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function arsort(int $flags = SORT_REGULAR): static
    {

        arsort($this->array, $flags);

        return $this;

    }

    public function asort(int $flags = SORT_REGULAR): static
    {

        asort($this->array, $flags);

        return $this;

    }

    public function changekeycase(int $case = CASE_LOWER): static
    {

        $this->array = array_change_key_case($this->array, $case);

        return $this;

    }

    public function chunk(
        int|Num $length,
        bool $preserve_keys = false
    ): static {

        $this->array = array_chunk($this->array, Convert::fromFluentType($length), $preserve_keys);

        return $this;

    }

    public function clone(?self &$return = null): static
    {

        $return = clone $this;

        return \func_num_args() ? $this : $return;

    }

    public function column(
        string|Str|int|Num|null $column_key,
        string|Str|int|Num|null $index_key = null
    ): static {

        $this->array = array_column(
            $this->array,
            Convert::fromFluentType($column_key),
            Convert::fromFluentType($index_key)
        );

        return $this;

    }

    public function combine(array|self $values): static
    {

        $this->array = array_combine($this->array, Convert::fromFluentType($values));

        return $this;

    }

    public function contains(
        mixed $needle,
        bool $strict = false,
        ?bool &$return = null
    ): bool|static {

        $return = \in_array(Convert::fromFluentType($needle), $this->array, $strict);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function count(
        int $mode = COUNT_NORMAL,
        ?Num &$return = null
    ): Num|static {

        $return = num(\count($this->array, $mode));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function countvalues(): static
    {

        $this->array = array_count_values($this->array);

        return $this;

    }

    public function current(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(current($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function diff(array|self ...$arrays): static
    {

        $this->array = array_diff($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function diffassoc(array|self ...$arrays): static
    {

        $this->array = array_diff_assoc($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function diffkey(array|self ...$arrays): static
    {

        $this->array = array_diff_key($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function diffuassoc(
        callable $key_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_diff_uassoc(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $key_compare_func
      ]
        );

        return $this;

    }

    public function diffukey(
        callable $key_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_diff_ukey(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $key_compare_func
      ]
        );

        return $this;

    }

    public function end(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(end($this->array));

        return \func_num_args() ? $this : $return;

    }

    public static function fill(
        int|Num $start_index,
        int|Num $count,
        mixed $value
    ): self {
        return arr(array_fill(
            Convert::fromFluentType($start_index),
            Convert::fromFluentType($count),
            $value
        ));
    }

    public function fillkeys(mixed $value): static
    {

        $this->array = array_fill_keys($this->array, $value);

        return $this;

    }

    public function filter(
        ?callable $callback = null,
        int $mode = 0
    ): static {

        $this->array = array_filter($this->array, $callback, $mode);

        return $this;

    }

    public function find(
        callable $callback,
        mixed &$return = null
    ): mixed {

        $return = Convert::toFluentType(array_find($this->array, $callback));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function findkey(
        callable $callback,
        Str|Num|null &$return = null
    ): Str|Num|null|static {

        $return = Convert::toFluentType(array_find_key($this->array, $callback));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function flip(): static
    {

        $this->array = array_flip($this->array);

        return $this;

    }

    public function implode(
        string|Str $separator,
        ?Str &$return = null
    ): Str|static {

        $return = str(implode(Convert::fromFluentType($separator), $this->array));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function intersect(array|self ...$arrays): static
    {

        $this->array = array_intersect($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function intersectassoc(array|self ...$arrays): static
    {

        $this->array = array_intersect_assoc($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function intersectkey(array|self ...$arrays): static
    {

        $this->array = array_intersect_key($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function intersectuassoc(
        callable $key_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_intersect_uassoc(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $key_compare_func
      ]
        );

        return $this;

    }

    public function intersectukey(
        callable $key_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_intersect_ukey(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $key_compare_func
      ]
        );

        return $this;

    }

    public function islist(?bool &$return = null): bool|static
    {

        $return = array_is_list($this->array);

        return \func_num_args() ? $this : $return;

    }

    public function jsonencode(
        int|Num $flags = 0,
        int|Num $depth = 512,
        string|false|null &$return = null,
    ): string|false|static {

        $return = json_encode($this->array, $flags, $depth);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function key(
        Str|Num|null &$return = null
    ): Str|Num|null|static {

        $return = Convert::toFluentType(key($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function keyexists(
        mixed $key,
        ?bool &$return = null
    ): bool|static {

        $return = \array_key_exists(Convert::fromFluentType($key), $this->array);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function keyfirst(
        Str|Num|null &$return = null
    ): Str|Num|null|static {

        $return = Convert::toFluentType(array_key_first($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function keylast(
        Str|Num|null &$return = null
    ): Str|Num|null|static {

        $return = Convert::toFluentType(array_key_last($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function keys(
        mixed $filter_value = null,
        bool $strict = false
    ): static {

        $this->array = array_keys($this->array, ...\func_get_args());

        return $this;

    }

    public function krsort(int $flags = SORT_REGULAR): static
    {

        krsort($this->array, $flags);

        return $this;

    }

    public function ksort(int $flags = SORT_REGULAR): static
    {

        ksort($this->array, $flags);

        return $this;

    }

    public static function localeconv(): self
    {
        return arr(localeconv());
    }

    public function map(
        ?callable $callback,
        array|self ...$arrays
    ): static {

        $this->array = array_map($callback, $this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function max(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(max(Convert::fromFluentType($this->array)));

        return \func_num_args() ? $this : $return;

    }

    public function merge(array|self ...$arrays): static
    {

        $this->array = array_merge($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function mergerecursive(array|self ...$arrays): static
    {

        $this->array = array_merge_recursive($this->array, ...Convert::fromFluentType($arrays));

        return $this;

    }

    public function min(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(min(Convert::fromFluentType($this->array)));

        return \func_num_args() ? $this : $return;

    }

    public function multisort(
        mixed $array1_sort_order = SORT_ASC,
        mixed $array1_sort_flags = SORT_REGULAR,
        mixed ...$rest
    ): static {

        array_multisort(
            $this->array,
            Convert::fromFluentType($array1_sort_order),
            Convert::fromFluentType($array1_sort_flags),
            ...Convert::fromFluentType($rest)
        );

        return $this;

    }

    public function natcasesort(): static
    {

        natcasesort($this->array);

        return $this;

    }

    public function natsort(): static
    {

        natsort($this->array);

        return $this;

    }

    public function next(): void
    {
        next($this->array);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->array[Convert::fromFluentType($offset)]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return Convert::toFluentType($this->array[Convert::fromFluentType($offset)] ?? null);
    }

    public function offsetSet(
        mixed $offset,
        mixed $value
    ): void {
        null === $offset ? $this->array[] = $value : $this->array[Convert::fromFluentType($offset)] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->array[Convert::fromFluentType($offset)]);
    }

    public function pad(
        int|Num $length,
        mixed $value
    ): static {

        $this->array = array_pad($this->array, Convert::fromFluentType($length), $value);

        return $this;

    }

    public function pop(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(array_pop($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function pregfilter(
        string|Str|array|self $pattern,
        string|Str|array|self $replacement,
        int|Num $limit = -1,
        ?Num &$count = null
    ): static {

        $this->array = preg_filter(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->array,
            Convert::fromFluentType($limit),
            $count
        );


        $count = num($count);

        return $this;

    }

    public function preggrep(
        string|Str $pattern,
        int $flags = 0
    ): static {

        $this->array = preg_grep((string) $pattern, $this->array, $flags) ?: [];

        return $this;

    }

    public function pregreplace(
        string|Str|array|self $pattern,
        string|Str|array|self $replacement,
        int|Num $limit = -1,
        ?Num &$count = null
    ): static {

        $this->array = (array) preg_replace(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->array,
            Convert::fromFluentType($limit),
            $count
        );


        $count = num($count);

        return $this;

    }

    public function pregreplacecallback(
        string|Str|array|self $pattern,
        callable $callback,
        int|Num $limit = -1,
        ?Num &$count = null
    ): static {

        $this->array = (array) preg_replace_callback(
            Convert::fromFluentType($pattern),
            $callback,
            $this->array,
            Convert::fromFluentType($limit),
            $count
        );


        $count = num($count);

        return $this;

    }

    public function pregreplacecallbackarray(
        array|self $pattern,
        int|Num $limit = -1,
        ?Num &$count = null,
        int $flags = 0
    ): static {

        $this->array = (array) preg_replace_callback_array(
            Convert::fromFluentType($pattern),
            $this->array,
            Convert::fromFluentType($limit),
            $count,
            $flags
        );


        $count = num($count);

        return $this;

    }

    public function prev(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(prev($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function printr(?Str &$return = null): static
    {

        $return = print_r($this->array, 0 !== \func_num_args());

        if (\func_num_args()) {
            $return = str($return);
        }

        return $this;

    }

    public function product(?Num &$return = null): Num|static
    {

        $return = num(array_product($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function push(mixed ...$values): static
    {

        array_push($this->array, ...$values);

        return $this;

    }

    public function rand(
        int|Num $num = 1,
        Str|Num|self|null &$return = null
    ): Str|Num|static|null {

        $return = Convert::toFluentType(array_rand($this->array, $num));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function reduce(
        callable $callback,
        mixed $initial = null,
        mixed &$return = null
    ): mixed {

        $return = array_reduce($this->array, $callback, $initial);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function replace(array|self ...$replacements): static
    {

        $this->array = array_replace($this->array, ...Convert::fromFluentType($replacements));

        return $this;

    }

    public function replacerecursive(array|self ...$replacements): static
    {

        $this->array = array_replace_recursive($this->array, ...Convert::fromFluentType($replacements));

        return $this;

    }

    public static function range(
        string|Str|int|float|Num $start,
        string|Str|int|float|Num $end,
        int|float|Num $step = 1
    ): self {

        return arr(range(
            Convert::fromFluentType($start),
            Convert::fromFluentType($end),
            Convert::fromFluentType($step)
        ));

    }

    public function reset(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(reset($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function reverse(bool $preserve_keys = false): static
    {

        $this->array = array_reverse($this->array, $preserve_keys);

        return $this;

    }

    public function rsort(int $flags = SORT_REGULAR): static
    {

        rsort($this->array, $flags);

        return $this;

    }

    public function rewind(): void
    {
        reset($this->array);
    }

    public function search(
        mixed $needle,
        bool $strict = false,
        Str|Num|false|null &$return = null
    ): Str|Num|false|static {

        $return = Convert::toFluentType(array_search($needle, $this->array, $strict));

        return 3 === \func_num_args() ? $this : $return;

    }

    public function seek(int|Num $offset): static
    {

        reset($this->array);

        $offset = Convert::fromFluentType($offset);

        while ($offset--) {
            next($this->array);
        }

        return $this;

    }

    public function serialize(?string &$return = null): string|static
    {

        $return = serialize($this->array);

        return \func_num_args() ? $this : $return;

    }

    public function shift(mixed &$return = null): mixed
    {

        $return = Convert::toFluentType(array_shift($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function shuffle(): static
    {

        shuffle($this->array);

        return $this;

    }

    public function slice(
        int|Num $offset,
        int|Num|null $length = null,
        bool $preserve_keys = false
    ): static {

        $this->array = \array_slice(
            $this->array,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length),
            $preserve_keys
        );

        return $this;

    }

    public function sort(int $flags = SORT_REGULAR): static
    {

        sort($this->array, $flags);

        return $this;

    }

    public function splice(
        int|Num $offset,
        int|Num|null $length = null,
        mixed $replacement = [],
        ?self &$return = null
    ): static {

        $return = arr(array_splice(
            $this->array,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length),
            Convert::fromFluentType($replacement)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function substrreplace(
        string|Str|array|self $replace,
        int|Num|array|self $offset,
        int|Num|array|self|null $length = null
    ): static {

        $this->array = substr_replace(
            $this->array,
            Convert::fromFluentType($replace),
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        );

        return $this;

    }

    public function sum(?Num &$return = null): Num|static
    {

        $return = num(array_sum($this->array));

        return \func_num_args() ? $this : $return;

    }

    public function uasort(callable $callback): static
    {

        uasort($this->array, $callback);

        return $this;

    }

    public function udiff(
        callable $value_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_udiff(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $value_compare_func
      ]
        );

        return $this;

    }

    public function udiffassoc(
        callable $value_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_udiff_assoc(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $value_compare_func
      ]
        );

        return $this;

    }

    public function udiffuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_udiff_uassoc(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $value_compare_func,
            $key_compare_func
      ]
        );

        return $this;

    }

    public function uintersect(
        callable $value_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_uintersect(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $value_compare_func
      ]
        );

        return $this;

    }

    public function uintersectassoc(
        callable $value_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_uintersect_assoc(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $value_compare_func
      ]
        );

        return $this;

    }

    public function uintersectuassoc(
        callable $value_compare_func,
        callable $key_compare_func,
        array|self ...$arrays
    ): static {

        $this->array = array_uintersect_uassoc(
            $this->array,
            ...[
            ...Convert::fromFluentType($arrays),
            $value_compare_func,
            $key_compare_func
      ]
        );

        return $this;

    }

    public function uksort(callable $callback): static
    {

        uksort($this->array, $callback);

        return $this;

    }

    public function unique(int $flags = SORT_STRING): static
    {

        $this->array = array_unique($this->array, $flags);

        return $this;

    }

    public function unshift(mixed ...$values): static
    {

        array_unshift($this->array, ...$values);

        return $this;

    }

    public function usort(callable $callback): static
    {

        usort($this->array, $callback);

        return $this;

    }

    public function valid(): bool
    {
        return null !== key($this->array);
    }

    public function values(): static
    {

        $this->array = array_values($this->array);

        return $this;

    }

    public function vardump(): static
    {

        var_dump($this->array);

        return $this;

    }

    public function walk(
        callable $callback,
        mixed $arg = null
    ): static {

        array_walk($this->array, $callback, $arg);

        return $this;

    }

    public function walkrecursive(
        callable $callback,
        mixed $arg = null
    ): static {

        array_walk_recursive($this->array, $callback, $arg);

        return $this;

    }

    final public function __get(string $name): mixed
    {
        return $this->$name()();
    }

    final public function __invoke(): array
    {
        return $this->array;
    }
}
