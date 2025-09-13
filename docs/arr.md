# Arr

## API reference

```php
public function __construct(protected array $array = [])
```

```php
public function advance(mixed &$return = null): mixed
```

```php
public function all(
    callable $callback,
    ?bool &$return = null
): bool|static
```

```php
public function any(
    callable $callback,
    ?bool &$return = null
): bool|static
```

```php
public function arsort(int $flags = SORT_REGULAR): static
```

```php
public function asort(int $flags = SORT_REGULAR): static
```

```php
public function changekeycase(int $case = CASE_LOWER): static
```

```php
public function chunk(
    int|Num $length,
    bool $preserve_keys = false
): static
```

```php
public function clone(?self &$return = null): static
```

```php
public function column(
    string|Str|int|Num|null $column_key,
    string|Str|int|Num|null $index_key = null
): static
```

```php
public function combine(array|self $values): static
```

```php
public function contains(
    mixed $needle,
    bool $strict = false,
    ?bool &$return = null
): bool|static
```

```php
public function count(
    int $mode = COUNT_NORMAL,
    ?Num &$return = null
): Num|static
```

```php
public function countvalues(): static
```

```php
public function current(mixed &$return = null): mixed
```

```php
public function diff(array|self ...$arrays): static
```

```php
public function diffassoc(array|self ...$arrays): static
```

```php
public function diffkey(array|self ...$arrays): static
```

```php
public function diffuassoc(
    callable $key_compare_func,
    array|self ...$arrays
): static
```

```php
public function diffukey(
    callable $key_compare_func,
    array|self ...$arrays
): static
```

```php
public function end(mixed &$return = null): mixed
```

```php
public static function fill(
    int|Num $start_index,
    int|Num $count,
    mixed $value
): self
```

```php
public function fillkeys(mixed $value): static
```

```php
public function filter(
    ?callable $callback = null,
    int $mode = 0
): static
```

```php
public function find(
    callable $callback,
    mixed &$return = null
): mixed
```

```php
public function findkey(
    callable $callback,
    Str|Num|null &$return = null
): Str|Num|null|static
```

```php
public function flip(): static
```

```php
public function implode(
    string|Str $separator,
    ?Str &$return = null
): Str|static
```

```php
public function intersect(array|self ...$arrays): static
```

```php
public function intersectassoc(array|self ...$arrays): static
```

```php
public function intersectkey(array|self ...$arrays): static
```

```php
public function intersectuassoc(
    callable $key_compare_func,
    array|self ...$arrays
): static
```

```php
public function intersectukey(
    callable $key_compare_func,
    array|self ...$arrays
): static
```

```php
public function islist(?bool &$return = null): bool|static
```

```php
public function jsonencode(
    int|Num $flags = 0,
    int|Num $depth = 512,
    string|false|null &$return = null,
): string|false|static
```

```php
public function key(
    Str|Num|null &$return = null
): Str|Num|null|static
```

```php
public function keyexists(
    mixed $key,
    ?bool &$return = null
): bool|static
```

```php
public function keyfirst(
    Str|Num|null &$return = null
): Str|Num|null|static
```

```php
public function keylast(
    Str|Num|null &$return = null
): Str|Num|null|static
```

```php
public function keys(
    mixed $filter_value = null,
    bool $strict = false
): static
```

```php
public function krsort(int $flags = SORT_REGULAR): static
```

```php
public function ksort(int $flags = SORT_REGULAR): static
```

```php
public static function localeconv(): self
```

```php
public function map(
    ?callable $callback,
    array|self ...$arrays
): static
```

```php
public function max(mixed &$return = null): mixed
```

```php
public function merge(array|self ...$arrays): static
```

```php
public function mergerecursive(array|self ...$arrays): static
```

```php
public function min(mixed &$return = null): mixed
```

```php
public function multisort(
    mixed $array1_sort_order = SORT_ASC,
    mixed $array1_sort_flags = SORT_REGULAR,
    mixed ...$rest
): static
```

```php
public function natcasesort(): static
```

```php
public function natsort(): static
```

```php
public function next(): void
```

```php
public function offsetExists(mixed $offset): bool
```

```php
public function offsetGet(mixed $offset): mixed
```

```php
public function offsetSet(
    mixed $offset,
    mixed $value
): void
```

```php
public function offsetUnset(mixed $offset): void
```

```php
public function pad(
    int|Num $length,
    mixed $value
): static
```

```php
public function pop(mixed &$return = null): mixed
```

```php
public function pregfilter(
    string|Str|array|self $pattern,
    string|Str|array|self $replacement,
    int|Num $limit = -1,
    ?Num &$count = null
): static
```

```php
public function preggrep(
    string|Str $pattern,
    int $flags = 0
): static
```

```php
public function pregreplace(
    string|Str|array|self $pattern,
    string|Str|array|self $replacement,
    int|Num $limit = -1,
    ?Num &$count = null
): static
```

```php
public function pregreplacecallback(
    string|Str|array|self $pattern,
    callable $callback,
    int|Num $limit = -1,
    ?Num &$count = null
): static
```

```php
public function pregreplacecallbackarray(
    array|self $pattern,
    int|Num $limit = -1,
    ?Num &$count = null,
    int $flags = 0
): static
```

```php
public function prev(mixed &$return = null): mixed
```

```php
public function printr(?Str &$return = null): static
```

```php
public function product(?Num &$return = null): Num|static
```

```php
public function push(mixed ...$values): static
```

```php
public function rand(
    int|Num $num = 1,
    Str|Num|self|null &$return = null
): Str|Num|static|null
```

```php
public function reduce(
    callable $callback,
    mixed $initial = null,
    mixed &$return = null
): mixed
```

```php
public function replace(array|self ...$replacements): static
```

```php
public function replacerecursive(array|self ...$replacements): static
```

```php
public static function range(
    string|Str|int|float|Num $start,
    string|Str|int|float|Num $end,
    int|float|Num $step = 1
): self
```

```php
public function reset(mixed &$return = null): mixed
```

```php
public function reverse(bool $preserve_keys = false): static
```

```php
public function rsort(int $flags = SORT_REGULAR): static
```

```php
public function rewind(): void
```

```php
public function search(
    mixed $needle,
    bool $strict = false,
    Str|Num|false|null &$return = null
): Str|Num|false|static
```

```php
public function seek(int|Num $offset): static
```

```php
public function serialize(?string &$return = null): string|static
```

```php
public function shift(mixed &$return = null): mixed
```

```php
public function shuffle(): static
```

```php
public function slice(
    int|Num $offset,
    int|Num|null $length = null,
    bool $preserve_keys = false
): static
```

```php
public function sort(int $flags = SORT_REGULAR): static
```

```php
public function splice(
    int|Num $offset,
    int|Num|null $length = null,
    mixed $replacement = [],
    ?self &$return = null
): static
```

```php
public function substrreplace(
    string|Str|array|self $replace,
    int|Num|array|self $offset,
    int|Num|array|self|null $length = null
): static
```

```php
public function sum(?Num &$return = null): Num|static
```

```php
public function uasort(callable $callback): static
```

```php
public function udiff(
    callable $value_compare_func,
    array|self ...$arrays
): static
```

```php
public function udiffassoc(
    callable $value_compare_func,
    array|self ...$arrays
): static
```

```php
public function udiffuassoc(
    callable $value_compare_func,
    callable $key_compare_func,
    array|self ...$arrays
): static
```

```php
public function uintersect(
    callable $value_compare_func,
    array|self ...$arrays
): static
```

```php
public function uintersectassoc(
    callable $value_compare_func,
    array|self ...$arrays
): static
```

```php
public function uintersectuassoc(
    callable $value_compare_func,
    callable $key_compare_func,
    array|self ...$arrays
): static
```

```php
public function uksort(callable $callback): static
```

```php
public function unique(int $flags = SORT_STRING): static
```

```php
public function unshift(mixed ...$values): static
```

```php
public function usort(callable $callback): static
```

```php
public function valid(): bool
```

```php
public function values(): static
```

```php
public function vardump(): static
```

```php
public function walk(
    callable $callback,
    mixed $arg = null
): static
```

```php
public function walkrecursive(
    callable $callback,
    mixed $arg = null
): static
```
