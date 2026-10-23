# Arr

## API reference

```php
public array $value { get; }
```

```php
public function advance(mixed &$return = null): mixed;
```

```php
public function all(
    callable $callback,
    ?bool &$return = null
): bool|static;
```

```php
public function any(
    callable $callback,
    ?bool &$return = null
): bool|static;
```

```php
public function arsort(int $flags = SORT_REGULAR): static;
```

```php
public function asort(int $flags = SORT_REGULAR): static;
```

```php
public function changekeycase(int $case = CASE_LOWER): static;
```

```php
public function chunk(
    int|NumInterface $length,
    bool $preserve_keys = false
): static;
```

```php
public function clone(?ArrInterface &$return = null): static;
```

```php
public function column(
    string|StrInterface|int|NumInterface|null $column_key,
    string|StrInterface|int|NumInterface|null $index_key = null
): static;
```

```php
public function combine(array|ArrInterface $values): static;
```

```php
public function contains(
    mixed $needle,
    bool $strict = false,
    ?bool &$return = null
): bool|static;
```

```php
public function count(
    int $mode = COUNT_NORMAL,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function countvalues(): static;
```

```php
public function current(mixed &$return = null): mixed;
```

```php
public function diff(array|ArrInterface ...$arrays): static;
```

```php
public function diffassoc(array|ArrInterface ...$arrays): static;
```

```php
public function diffkey(array|ArrInterface ...$arrays): static;
```

```php
public function diffuassoc(
    callable $key_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function diffukey(
    callable $key_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function end(mixed &$return = null): mixed;
```

```php
public static function fill(
    int|NumInterface $start_index,
    int|NumInterface $count,
    mixed $value
): ArrInterface;
```

```php
public function fillkeys(mixed $value): static;
```

```php
public function filter(
    ?callable $callback = null,
    int $mode = 0
): static;
```

```php
public function find(
    callable $callback,
    mixed &$return = null
): mixed;
```

```php
public function findkey(
    callable $callback,
    StrInterface|NumInterface|null &$return = null
): StrInterface|NumInterface|static|null;
```

```php
public function first(mixed &$return = null): mixed;
```

```php
public function flip(): static;
```

```php
public function implode(
    string|StrInterface $separator,
    ?StrInterface &$return = null
): StrInterface|static;
```

```php
public function intersect(array|ArrInterface ...$arrays): static;
```

```php
public function intersectassoc(array|ArrInterface ...$arrays): static;
```

```php
public function intersectkey(array|ArrInterface ...$arrays): static;
```

```php
public function intersectuassoc(
    callable $key_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function intersectukey(
    callable $key_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function islist(?bool &$return = null): bool|static;
```

```php
public function jsonencode(
    int|NumInterface $flags = 0,
    int|NumInterface $depth = 512,
    string|false|null &$return = null,
): string|false|static;
```

```php
public function key(
    StrInterface|NumInterface|null &$return = null
): StrInterface|NumInterface|static|null;
```

```php
public function keyexists(
    mixed $key,
    ?bool &$return = null
): bool|static;
```

```php
public function keyfirst(
    StrInterface|NumInterface|null &$return = null
): StrInterface|NumInterface|static|null;
```

```php
public function keylast(
    StrInterface|NumInterface|null &$return = null
): StrInterface|NumInterface|static|null;
```

```php
public function keys(
    mixed $filter_value = null,
    bool $strict = false
): static;
```

```php
public function krsort(int $flags = SORT_REGULAR): static;
```

```php
public function ksort(int $flags = SORT_REGULAR): static;
```

```php
public function last(mixed &$return = null): mixed;
```

```php
public static function localeconv(): ArrInterface;
```

```php
public function map(
    ?callable $callback,
    array|ArrInterface ...$arrays
): static;
```

```php
public function max(mixed &$return = null): mixed;
```

```php
public function merge(array|ArrInterface ...$arrays): static;
```

```php
public function mergerecursive(array|ArrInterface ...$arrays): static;
```

```php
public function min(mixed &$return = null): mixed;
```

```php
public function multisort(
    mixed $array1_sort_order = SORT_ASC,
    mixed $array1_sort_flags = SORT_REGULAR,
    mixed ...$rest
): static;
```

```php
public function natcasesort(): static;
```

```php
public function natsort(): static;
```

```php
public function next(): void;
```

```php
public function offsetExists(mixed $offset): bool;
```

```php
public function offsetGet(mixed $offset): mixed;
```

```php
public function offsetSet(
    mixed $offset,
    mixed $value
): void;
```

```php
public function offsetUnset(mixed $offset): void;
```

```php
public function pad(
    int|NumInterface $length,
    mixed $value
): static;
```

```php
public function pop(mixed &$return = null): mixed;
```

```php
public function pregfilter(
    string|StrInterface|array|ArrInterface $pattern,
    string|StrInterface|array|ArrInterface $replacement,
    int|NumInterface $limit = -1,
    ?NumInterface &$count = null
): static;
```

```php
public function preggrep(
    string|StrInterface $pattern,
    int $flags = 0
): static;
```

```php
public function pregreplace(
    string|StrInterface|array|ArrInterface $pattern,
    string|StrInterface|array|ArrInterface $replacement,
    int|NumInterface $limit = -1,
    ?NumInterface &$count = null
): static;
```

```php
public function pregreplacecallback(
    string|StrInterface|array|ArrInterface $pattern,
    callable $callback,
    int|NumInterface $limit = -1,
    ?NumInterface &$count = null
): static;
```

```php
public function pregreplacecallbackarray(
    array|ArrInterface $pattern,
    int|NumInterface $limit = -1,
    ?NumInterface &$count = null,
    int $flags = 0
): static;
```

```php
public function prev(mixed &$return = null): mixed;
```

```php
public function printr(?StrInterface &$return = null): static;
```

```php
public function product(?NumInterface &$return = null): NumInterface|static;
```

```php
public function push(mixed ...$values): static;
```

```php
public function rand(
    int|NumInterface $num = 1,
    StrInterface|NumInterface|ArrInterface|null &$return = null
): StrInterface|NumInterface|static|null;
```

```php
public function reduce(
    callable $callback,
    mixed $initial = null,
    mixed &$return = null
): mixed;
```

```php
public function replace(array|ArrInterface ...$replacements): static;
```

```php
public function replacerecursive(array|ArrInterface ...$replacements): static;
```

```php
public static function range(
    string|StrInterface|int|float|NumInterface $start,
    string|StrInterface|int|float|NumInterface $end,
    int|float|NumInterface $step = 1
): ArrInterface;
```

```php
public function reset(mixed &$return = null): mixed;
```

```php
public function reverse(bool $preserve_keys = false): static;
```

```php
public function rsort(int $flags = SORT_REGULAR): static;
```

```php
public function rewind(): void;
```

```php
public function search(
    mixed $needle,
    bool $strict = false,
    StrInterface|NumInterface|false|null &$return = null
): StrInterface|NumInterface|false|static;
```

```php
public function seek(int|NumInterface $offset): static;
```

```php
public function serialize(?string &$return = null): string|static;
```

```php
public function shift(mixed &$return = null): mixed;
```

```php
public function shuffle(): static;
```

```php
public function slice(
    int|NumInterface $offset,
    int|NumInterface|null $length = null,
    bool $preserve_keys = false
): static;
```

```php
public function sort(int $flags = SORT_REGULAR): static;
```

```php
public function splice(
    int|NumInterface $offset,
    int|NumInterface|null $length = null,
    mixed $replacement = [],
    ?ArrInterface &$return = null
): static;
```

```php
public function substrreplace(
    string|StrInterface|array|ArrInterface $replace,
    int|NumInterface|array|ArrInterface $offset,
    int|NumInterface|array|ArrInterface|null $length = null
): static;
```

```php
public function sum(?NumInterface &$return = null): NumInterface|static;
```

```php
public function uasort(callable $callback): static;
```

```php
public function udiff(
    callable $value_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function udiffassoc(
    callable $value_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function udiffuassoc(
    callable $value_compare_func,
    callable $key_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function uintersect(
    callable $value_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function uintersectassoc(
    callable $value_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function uintersectuassoc(
    callable $value_compare_func,
    callable $key_compare_func,
    array|ArrInterface ...$arrays
): static;
```

```php
public function uksort(callable $callback): static;
```

```php
public function unique(int $flags = SORT_STRING): static;
```

```php
public function unshift(mixed ...$values): static;
```

```php
public function usort(callable $callback): static;
```

```php
public function valid(): bool;
```

```php
public function values(): static;
```

```php
public function vardump(): static;
```

```php
public function walk(
    callable $callback,
    mixed $arg = null
): static;
```

```php
public function walkrecursive(
    callable $callback,
    mixed $arg = null
): static;
```

```php
public static function class(): string;
```

```php
public static function extend(string|ArrInterface $class): void;
```

```php
public function pipe(callable $callback): mixed;
```

```php
public function through(callable $callback): static;
```

```php
public function when(
    mixed $value,
    ?callable $if_true = null,
    ?callable $if_false = null
): static;
```

```php
public function __get(string $name): mixed;
```
