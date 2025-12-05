<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Convert;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('advance', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->advance())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->advance($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test2');

});

test('array_all', function () {

    $arr = new Arr($array = [1, 2, 3]);

    expect($arr->all($callback = fn ($value) => $value < 3))
    ->toBe(array_all($array, $callback));

    expect($arr->all($callback, $return))
    ->toBe($arr);

    expect($return)
    ->toBe(array_all($array, $callback));

});

test('array_any', function () {

    $arr = new Arr($array = [1, 2, 3]);

    expect($arr->any($callback = fn ($value) => $value < 3))
    ->toBe(array_any($array, $callback));

    expect($arr->any($callback, $return))
    ->toBe($arr);

    expect($return)
    ->toBe(array_any($array, $callback));

});

test('array_change_key_case', function ($case) {

    $arr = new Arr(['a' => 'test']);

    expect($arr->changekeycase($case))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_change_key_case(['a' => 'test'], $case));

})
->with([CASE_LOWER, CASE_UPPER]);

test('array_chunk', function ($length, $preserve_keys) {

    $arr = new Arr(['a' => 'test1', 'b' => 'test2']);

    expect($arr->chunk($length, $preserve_keys))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_chunk(
        ['a' => 'test1', 'b' => 'test2'],
        Convert::fromFluentType($length),
        $preserve_keys
    ));

})
->with([
    [1, true],
    [2, false],
    [new Num(1), true],
]);

test('array_column', function ($column_key, $index_key) {

    $arr = new Arr([
      ['a' => 'test1', 'b' => 'test2', 'test3'],
      ['a' => 'test4', 'b' => 'test5', 'test6'],
    ]);

    expect($arr->column($column_key, $index_key))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_column([
      ['a' => 'test1', 'b' => 'test2', 'test3'],
      ['a' => 'test4', 'b' => 'test5', 'test6'],
    ], 'a', 0));

})
->with([
    ['a', 0],
    [new Str('a'), new Num(0)]
]);

test('array_combine', function ($values) {

    $arr = new Arr([1]);

    expect($arr->combine($values))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_combine([1], ['test']));

})
->with([
    [['test']],
    [new Arr(['test'])]
]);

test('array_count_values', function () {

    $arr = new Arr(['test']);

    expect($arr->countvalues())
    ->toBe($arr);

    expect($arr())
    ->toBe(array_count_values(['test']));

});

test('array_diff', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->diff($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_diff(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_diff_assoc', function ($array) {

    $arr = new Arr(['a' => 'test1']);

    expect($arr->diffassoc($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_diff_assoc(['a' => 'test1'], ['b' => 'test2']));

})
->with([
    [['b' => 'test2']],
    [new Arr(['b' => 'test2'])],
]);

test('array_diff_key', function ($array) {

    $arr = new Arr(['a' => 'test1']);

    expect($arr->diffkey($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_diff_key(['a' => 'test1'], ['b' => 'test2']));

})
->with([
    [['b' => 'test2']],
    [new Arr(['b' => 'test2'])],
]);

test('array_diff_uassoc', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->diffuassoc(fn ($a, $b) => $a <=> $b, $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_diff_uassoc(['test1'], ['test2'], fn ($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_diff_ukey', function () {

    $arr = new Arr(['test1']);

    expect($arr->diffukey(fn ($a, $b) => $a <=> $b, ['test2']))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_diff_ukey(['test1'], ['test2'], fn ($a, $b) => $a <=> $b));

});

test('array_fill', function ($start_index, $count) {

    expect($arr = Arr::fill($start_index, $count, 'test'))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe(array_fill(0, 1, 'test'));

})
->with([
    [0, 1],
    [new Num(0), new Num(1)],
]);

test('array_fill_keys', function () {

    $arr = new Arr(['test1']);

    expect($arr->fillkeys('test2'))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_fill_keys(['test1'], 'test2'));

});

test('array_filter', function () {

    $arr = new Arr(['test', '']);

    expect($arr->filter())
    ->toBe($arr);

    expect($arr())
    ->toBe(array_filter(['test', '']));

    $arr = new Arr(['test', '']);

    expect($arr->filter(fn ($v) => 0 !== $v, ARRAY_FILTER_USE_KEY)())
    ->toBe(array_filter(['test', ''], fn ($v) => 0 !== $v, ARRAY_FILTER_USE_KEY));

});

test('array_find', function () {

    $arr = new Arr($array = [1, 2, 3]);

    expect($num = $arr->find($callback = fn ($value) => 2 === $value))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(array_find($array, $callback));

    expect($arr->find($callback, $return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe(array_find($array, $callback));

});

test('array_find_key', function () {

    $arr = new Arr($array = [1, 2, 3]);

    expect($num = $arr->findkey($callback = fn ($value) => 2 === $value))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(array_find_key($array, $callback));

    expect($arr->findkey($callback, $return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe(array_find_key($array, $callback));

});

test('array_first', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->first())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->first($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test1');

})
->skipOnPhp('<8.5.0');

test('array_flip', function () {

    $arr = new Arr(['test']);

    expect($arr->flip())
    ->toBe($arr);

    expect($arr())
    ->toBe(array_flip(['test']));

});

test('array_intersect', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->intersect($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_intersect(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_intersect_assoc', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->intersectassoc($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_intersect_assoc(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_intersect_key', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->intersectkey($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_intersect_key(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_intersect_uassoc', function ($array) {

    $arr = new Arr(['test']);

    expect($arr->intersectuassoc('strcasecmp', $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_intersect_uassoc(['test'], ['TEST'], 'strcasecmp'));

})
->with([
    [['TEST']],
    [new Arr(['TEST'])],
]);

test('array_intersect_ukey', function ($array) {

    $arr = new Arr([0 => 'test']);

    expect($arr->intersectukey(fn ($a, $b) => $a === $b ? 1 : 0, $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_intersect_ukey([0 => 'test'], [1 => 'test'], fn ($a, $b) => $a === $b ? 1 : 0));

})
->with([
    [[1 => 'test']],
    [new Arr([1 => 'test'])],
]);

test('array_is_list', function ($key, $expected) {

    $arr = new Arr([$key => 'test']);

    expect($arr->islist())
    ->toBe($expected);

    expect($arr->islist($return))
    ->toBe($arr);

    expect($return)
    ->toBe($expected);

})
->with([
    [0, true],
    [1, false],
]);

test('array_key_exists', function ($key, $expected) {

    $arr = new Arr(['test']);

    expect($arr->keyexists($key))
    ->toBe($expected);

    expect($arr->keyexists($key, $return))
    ->toBe($arr);

    expect($return)
    ->toBe($expected);

})
->with([
    [0, true],
    [1, false],
    [new Num(0), true],
    [new Str('a'), false],
]);

test('array_key_first', function ($key, $class) {

    $arr = new Arr([$key => 'test1', 'test2']);

    expect($k = $arr->keyfirst())
    ->toBeInstanceOf($class);

    expect($k())
    ->toBe($key);

    expect($arr->keyfirst($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf($class);

    expect($k())
    ->toBe($key);

})
->with([
    [0, Num::class],
    ['a', Str::class],
]);

test('array_key_last', function ($key, $class) {

    $arr = new Arr(['test1', $key => 'test2']);

    expect($k = $arr->keylast())
    ->toBeInstanceOf($class);

    expect($k())
    ->toBe($key);

    expect($arr->keylast($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf($class);

    expect($k())
    ->toBe($key);

})
->with([
    [0, Num::class],
    ['a', Str::class],
]);

test('array_keys', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->keys())
    ->toBe($arr);

    expect($arr())
    ->toBe(array_keys(['test1', 'test2']));

    $arr = new Arr(['test1', 'test2']);

    expect($arr->keys('TEST1', true)())
    ->toBe(array_keys(['test1', 'test2'], 'TEST1', true));

});

test('array_map', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->map(fn ($a, $b) => '$a$b', $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_map(fn ($a, $b) => '$a$b', ['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_merge', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->merge($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_merge(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_merge_recursive', function ($array) {

    $arr = new Arr(['a' => 'test1']);

    expect($arr->mergerecursive($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_merge_recursive(['a' => 'test1'], ['a' => ['test2', 'test3']]));

})
->with([
    [['a' => ['test2', 'test3']]],
    [new Arr(['a' => ['test2', 'test3']])],
]);

test('array_multisort', function ($rest) {

    $arr = new Arr($array = [
      ['10', 11, 100, 100, 'a'],
      [1, 2, '2', 3, 1],
    ]);

    expect($arr->multisort())
    ->toBe($arr);

    array_multisort($array);

    expect($arr())
    ->toBe($array);

    $arr = new Arr($array = [
      ['10', 11, 100, 100, 'a'],
      [1, 2, '2', 3, 1],
    ]);

    expect($arr->multisort(SORT_NUMERIC, SORT_DESC, $rest))
    ->toBe($arr);

    array_multisort($array, SORT_NUMERIC, SORT_DESC, ['test', 'test2']);

    expect($arr())
    ->toBe($array);

})
->with([
    [['test1', 'test2']],
    [new Arr(['test', 'test2'])],
]);
;

test('array_pad', function ($length) {

    $arr = new Arr(['test']);

    expect($arr->pad($length, 'test'))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_pad(['test'], 2, 'test'));

})
->with([2, new Num(2)]);

test('array_pop', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->pop())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->pop($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test2');

});

test('array_product', function () {

    $arr = new Arr([1, 2]);

    expect($num = $arr->product())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(array_product([1, 2]));

    expect($arr->product($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe(array_product([1, 2]));

});

test('array_push', function () {

    $arr = new Arr($array = ['test1']);

    expect($arr->push('test2'))
    ->toBe($arr);

    array_push($array, 'test2');

    expect($arr())
    ->toBe($array);

});

test('array_rand', function () {

    $arr = new Arr([1 => 'test1', 2 => 'test2']);

    expect($num = $arr->rand())
    ->toBeInstanceOf(Num::class);

    expect(in_array($num(), [1, 2]))
    ->toBeTrue();

    $arr = new Arr(['a' => 'test1', 'b' => 'test2']);

    expect($str = $arr->rand())
    ->toBeInstanceOf(Str::class);

    expect(in_array($str(), ['a', 'b']))
    ->toBeTrue();

    expect($arr2 = $arr->rand(2))
    ->toBeInstanceOf(Arr::class);

    expect(array_diff($arr2(), ['a', 'b']))
    ->toBe([]);

});

test('array_reduce', function () {

    $arr = new Arr([1, 2]);

    $sum = fn ($carry, $item) => $carry += $item;

    expect($arr->reduce($sum, 3))
    ->toBe(array_reduce([1, 2], $sum, 3));

    expect($arr->reduce($sum, 3, $return))
    ->toBe($arr);

    expect($return)
    ->toBe(array_reduce([1, 2], $sum, 3));

});

test('array_replace', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->replace($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_replace(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_replace_recursive', function ($array) {

    $arr = new Arr(['a' => ['test1'], 'b' => ['test2', 'test3']]);

    expect($arr->replacerecursive($array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_replace_recursive(['a' => ['test1'], 'b' => ['test2', 'test3']], ['a' => ['test4'], 'b' => ['test5']]));

})
->with([
    [['a' => ['test4'], 'b' => ['test5']]],
    [new Arr(['a' => ['test4'], 'b' => ['test5']])],
]);

test('array_reverse', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->reverse())
    ->toBe($arr);

    expect($arr())
    ->toBe(array_reverse(['test1', 'test2']));

});

test('array_search', function ($needle, $strict, $expected, $class = null) {

    $arr = new Arr([1 => 'test1', 'a' => 1]);

    $return = $arr->search($needle, $strict);

    if ($class) {

        expect($return)
        ->toBeInstanceOf($class);

        $return = $return();

    }

    expect($return)
    ->toBe($expected);

})
->with([
    ['test1', true, 1, Num::class],
    ['test1', false, 1, Num::class],
    [1, true, 'a', Str::class],
    [1, false, 'a', Str::class],
    [1.0, true, false],
    [1.0, false, 'a', Str::class],
]);

test('array_shift', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->shift())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->shift($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test1');

});

test('array_slice', function ($offset, $length, $preserve_keys) {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2', 'c' => 'test3']);

    expect($arr->slice($offset, $length, $preserve_keys))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_slice($array, 1, 2, $preserve_keys));

})
->with([
    [1, 2, true],
    [new Num(1), new Num(2), false],
]);

test('array_splice', function ($offset, $length, $replacement) {

    $arr1 = new Arr(['test1', 'test2', 'test3']);

    expect($arr2 = $arr1->splice($offset, $length, $replacement))
    ->toBeInstanceOf(Arr::class);

    expect($arr1())
    ->toBe(['test1', 'test4']);

    expect($arr2())
    ->toBe(['test2', 'test3']);

    $arr = new Arr(['test1', 'test2', 'test3']);

    expect($arr->splice(1, 2, $replacement, $return))
    ->toBe($arr);

    expect($arr())
    ->toBe(['test1', 'test4']);

    expect($return())
    ->toBe(['test2', 'test3']);

})
->with([
    [1, 2, ['test4']],
    [new Num(1), new Num(2), new Arr(['test4'])],
]);

test('array_sum', function () {

    $arr = new Arr([1, 2]);

    expect($num = $arr->sum())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(array_sum([1, 2]));

    expect($arr->sum($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe(array_sum([1, 2]));

});

test('array_udiff', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->udiff(fn ($a, $b) => $a <=> $b, $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_udiff(['test1'], ['test2'], fn ($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_udiff_assoc', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->udiffassoc(fn ($a, $b) => $a <=> $b, $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_udiff_assoc(['test1'], ['test2'], fn ($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_udiff_uassoc', function ($array) {

    $arr = new Arr(['test1']);

    expect(
        $arr->udiffuassoc(
            fn ($a, $b) => $a <=> $b,
            fn ($a, $b) => $b <=> $a,
            $array
        )
    )
    ->toBe($arr);

    expect($arr())
    ->toBe(
        array_udiff_uassoc(
            ['test1'],
            ['test2'],
            fn ($a, $b) => $a <=> $b,
            fn ($a, $b) => $b <=> $a
        )
    );

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_uintersect', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->uintersect(fn ($a, $b) => $a <=> $b, $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_uintersect(['test1'], ['test2'], fn ($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_uintersect_assoc', function ($array) {

    $arr = new Arr(['test1']);

    expect($arr->uintersectassoc(fn ($a, $b) => $a <=> $b, $array))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_uintersect_assoc(['test1'], ['test2'], fn ($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_uintersect_uassoc', function ($array) {

    $arr = new Arr(['test1']);

    expect(
        $arr->uintersectuassoc(
            fn ($a, $b) => $a <=> $b,
            fn ($a, $b) => $b <=> $a,
            $array
        )
    )
    ->toBe($arr);

    expect($arr())
    ->toBe(
        array_uintersect_uassoc(
            ['test1'],
            ['test2'],
            fn ($a, $b) => $a <=> $b,
            fn ($a, $b) => $b <=> $a
        )
    );

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_unique', function ($sort) {

    $arr = new Arr(['00', '0']);

    expect($arr->unique($sort))
    ->toBe($arr);

    expect($arr())
    ->toBe(array_unique(['00', '0'], $sort));

})
->with([SORT_STRING, SORT_NUMERIC]);

test('array_unshift', function () {

    $arr = new Arr($array = ['test1']);

    expect($arr->unshift('test2'))
    ->toBe($arr);

    array_unshift($array, 'test2');

    expect($arr())
    ->toBe($array);

});

test('array_values', function () {

    $arr = new Arr(['a' => 'test1', 'b' => 'test2']);

    expect($arr->values())
    ->toBe($arr);

    expect($arr())
    ->toBe(array_values(['a' => 'test1', 'b' => 'test2']));

});

test('array_walk', function () {

    $arr = new Arr($array = ['TEST1', 'TEST2']);

    expect($arr->walk(function (&$a, $b, $c) {
        $a = '$a$c';
    }, '0'))
    ->toBe($arr);

    array_walk($array, function (&$a, $b, $c) {
        $a = '$a$c';
    }, '0');

    expect($arr())
    ->toBe($array);

});

test('array_walk_recursive', function () {

    $arr = new Arr($array = [['TEST1', 'TEST2']]);

    expect($arr->walkrecursive(function (&$a, $b, $c) {
        $a = '$a$c';
    }, '0'))
    ->toBe($arr);

    array_walk_recursive($array, function (&$a, $b, $c) {
        $a = '$a$c';
    }, '0');

    expect($arr())
    ->toBe($array);

});

test('arsort', function ($sort) {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr->arsort($sort))
    ->toBe($arr);

    arsort($array, $sort);

    expect($arr())
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('asort', function ($sort) {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr->asort($sort))
    ->toBe($arr);

    asort($array, $sort);

    expect($arr())
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('clone', function () {

    $arr1 = new Arr(['test']);

    expect($arr2 = $arr1->clone())
    ->toBeInstanceOf(Arr::class);

    expect($arr2)
    ->not->toBe($arr1);

    expect($arr2())
    ->toBe(['test']);

    expect($arr1->clone($arr2))
    ->toBe($arr1);

    expect($arr2)
    ->toBeInstanceOf(Arr::class);

    expect($arr2)
    ->not->toBe($arr1);

    expect($arr2())
    ->toBe(['test']);

});

test('contains', function ($needle, $strict, $expected) {

    $arr = new Arr(['test', 1.0]);

    expect($arr->contains($needle, $strict))
    ->toBe($expected);

    expect($arr->contains($needle, $strict, $return))
    ->toBe($arr);

    expect($return)
    ->toBe($expected);

})
->with([
    [1, true, false],
    [1, false, true],
    [new Num(1), true, false],
    [new Num(1), false, true],
    ['test', true, true],
    [new Str('test'), true, true],
]);

test('count', function ($mode, $expected) {

    $arr = new Arr(['test1', ['test2', 'test3']]);

    expect($num = $arr->count($mode))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected);

    expect($arr->count($mode, $return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    [COUNT_NORMAL, 2],
    [COUNT_RECURSIVE, 4],
]);

test('current', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->current())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->current($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test1');

});

test('end', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->end())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->end($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test2');

});

test('implode', function ($separator) {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->implode($separator))
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test1, test2');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->implode($separator, $return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test1, test2');

})
->with([', ', new Str(', ')]);

test('json_encode', function () {

    $arr = new Arr($array = [1, [2], [[3]]]);

    expect($arr->jsonencode(JSON_PRETTY_PRINT))
    ->toBe(json_encode($array, JSON_PRETTY_PRINT));

    expect($arr->jsonencode(return: $return))
    ->toBe($arr);

    expect($return)
    ->toBe(json_encode($array));

    expect($arr->jsonencode(depth: 2))
    ->toBeFalse();

    expect($arr->jsonencode(depth: 2, return: $return))
    ->toBe($arr);

    expect($return)
    ->toBeFalse();

});

test('key', function ($key, $class) {

    $arr = new Arr([$key => 'test']);

    expect($num = $arr->key())
    ->toBeInstanceOf($class);

    expect($num())
    ->toBe($key);

    expect($arr->key($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf($class);

    expect($return())
    ->toBe($key);

})
->with([
    [0, Num::class],
    ['a', Str::class],
]);

test('krsort', function ($sort) {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr->krsort($sort))
    ->toBe($arr);

    krsort($array, $sort);

    expect($arr())
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('ksort', function ($sort) {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr->ksort($sort))
    ->toBe($arr);

    ksort($array, $sort);

    expect($arr())
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('array_last', function () {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->last())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

    expect($arr->last($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test2');

})
->skipOnPhp('<8.5.0');

test('localeconv', function () {

    expect($arr = Arr::localeconv())
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe(localeconv());

});

test('max', function () {

    $arr = new Arr([new Num(1), 2, new Num(3)]);

    expect($num = $arr->max())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(3);

    expect($arr->max($num))
    ->toBe($arr);

    expect($num)
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(3);

});

test('min', function () {

    $arr = new Arr([new Num(1), 2, new Num(3)]);

    expect($num = $arr->min())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(1);

    expect($arr->min($num))
    ->toBe($arr);

    expect($num)
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(1);

});

test('natcasesort', function () {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'TEST10', 'c' => 'test2']);

    expect($arr->natcasesort())
    ->toBe($arr);

    natcasesort($array);

    expect($arr())
    ->toBe($array);

});

test('natsort', function () {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'TEST10', 'c' => 'test2']);

    expect($arr->natsort())
    ->toBe($arr);

    natsort($array);

    expect($arr())
    ->toBe($array);

});

test('next', function () {

    $arr = new Arr(['test1', 'test2']);

    $arr->next();

    expect($arr->current()())
    ->toBe('test2');

});

test('offset exists', function ($offset, $expected) {

    $arr = new Arr(['test']);

    expect(isset($arr[$offset]))
    ->toBe($expected);

})
->with([
    [0, true],
    [1, false],
    [new Num(0), true],
    [new Str('a'), false],
]);

test('offset get', function ($offset1, $offset2) {

    $arr = new Arr(['test']);

    expect($str = $arr[$offset1])
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test');

    expect($arr[$offset2])
    ->toBeNull();

})
->with([
    [0, 1],
    [new Num(0), new Str('a')],
]);

test('offset set', function () {

    $arr = new Arr(['test1']);

    $arr[] = 'test2';

    expect($arr())
    ->toBe(['test1', 'test2']);

    $arr[3] = 'test3';
    $arr[new Num(4)] = 'test4';
    $arr['a'] = 'test5';
    $arr[new Str('b')] = 'test6';

    expect($arr())
    ->toBe([
      'test1',
      'test2',
      3 => 'test3',
      4 => 'test4',
      'a' => 'test5',
      'b' => 'test6',
    ]);

});

test('offset unset', function () {

    $arr = new Arr(['test1', 'test2', 'test3', 'a' => 'test3', 'b' => 'test4']);

    unset($arr[1]);
    unset($arr[new Num(2)]);
    unset($arr['a']);
    unset($arr['b']);

    expect($arr())
    ->toBe(['test1']);

});

test('preg_filter', function ($pattern, $replacement, $limit) {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->pregfilter($pattern, $replacement, $limit, $count1))
    ->toBe($arr);

    expect($arr())
    ->toBe(preg_filter('/[st]/', 'a', ['test1', 'test2'], 2, $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    ['/[st]/', 'a', 2],
    [new Str('/[st]/'), new Str('a'), new Num(2)],
    [['/[st]/'], 'a', 2],
    [new Arr(['/[st]/']), 'a', 2],
]);

test('preg_grep', function ($pattern, $flags) {

    $arr = new Arr(['test1', 'x']);

    expect($arr->preggrep($pattern, $flags))
    ->toBe($arr);

    expect($arr())
    ->toBe(preg_grep('/[st]/', ['test1', 'x'], $flags));

})
->with([
    ['/[st]/', 0],
    [new Str('/[st]/'), PREG_GREP_INVERT],
]);

test('preg_replace', function ($pattern, $replacement, $limit) {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->pregreplace($pattern, $replacement, $limit, $count1))
    ->toBe($arr);

    expect($arr())
    ->toBe(preg_replace('/[st]/', 'a', ['test1', 'test2'], 2, $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    ['/[st]/', 'a', 2],
    [new Str('/[st]/'), new Str('a'), new Num(2)],
    [['/[st]/'], 'a', 2],
    [new Arr(['/[st]/']), 'a', 2],
]);

test('preg_replace_callback', function ($pattern, $limit) {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->pregreplacecallback($pattern, fn ($matches) => strtoupper($matches[0]), $limit, $count1))
    ->toBe($arr);

    expect($arr())
    ->toBe(preg_replace_callback('/[st]/', fn ($matches) => strtoupper($matches[0]), ['test1', 'test2'], 2, $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    ['/[st]/', 2],
    [new Str('/[st]/'), new Num(2)],
    [['/[st]/'], 2],
    [new Arr(['/[st]/']), 2],
]);

test('preg_replace_callback_array', function ($pattern, $limit, $flags) {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->pregreplacecallbackarray($pattern, $limit, $count1, $flags))
    ->toBe($arr);

    expect($arr())
    ->toBe(preg_replace_callback_array(['/[st]/' => fn ($matches) => strtoupper($matches[0])], ['test1', 'test2'], 2, $count2, $flags));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    [['/[st]/' => fn ($matches) => strtoupper($matches[0])], 2, 0],
    [new Arr(['/[st]/' => fn ($matches) => strtoupper($matches[0])]), new Num(2), PREG_UNMATCHED_AS_NULL],
]);

test('prev', function () {

    $arr = new Arr(['test1', 'test2']);

    $arr->next();

    expect($str = $arr->prev())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    $arr->next();

    expect($arr->prev($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test1');

});

test('print_r', function () {

    $arr = new Arr(['test']);

    expect($arr->printr())
    ->toBe($arr);

    $this->expectOutputString(print_r(['test'], true));

    $arr->printr($return);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe(print_r(['test'], true));

});

test('range', function ($start, $end, $step) {

    expect($arr = Arr::range($start, $end, $step))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe(range(0, 10, 2));

})
->with([
    [0, 10, 2],
    [new Num(0), new Num(10), new Num(2)],
]);

test('reset', function () {

    $arr = new Arr(['test1', 'test2']);

    $arr->end();

    expect($str = $arr->reset())
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    $arr->end();

    expect($arr->reset($return))
    ->toBe($arr);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe('test1');

});

test('rewind', function () {

    $arr = new Arr(['test1', 'test2']);

    $arr->next();
    $arr->rewind();

    expect($arr->current()())
    ->toBe('test1');

});

test('rsort', function ($sort) {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr->rsort($sort))
    ->toBe($arr);

    rsort($array, $sort);

    expect($arr())
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('seek', function ($offset, $expected) {

    $arr = new Arr(['test1', 'test2']);

    expect($arr->seek($offset))
    ->toBe($arr);

    expect($arr->current() ? $arr->current()() : $arr->current())
    ->toBe($expected);

})
->with([
    [0, 'test1'],
    [1, 'test2'],
    [2, false],
    [new Num(0), 'test1'],
    [new Num(1), 'test2'],
    [new Num(2), false],
]);

test('serialize', function () {

    $arr = new Arr($array = [1, 2, 3]);

    expect($str = $arr->serialize())
    ->toBe(serialize($array));

    expect($arr->serialize($return))
    ->toBe($arr);

    expect($return)
    ->toBe(serialize($array));

});

test('shuffle', function () {

    $arr = new Arr([1, 2]);

    expect($arr->shuffle())
    ->toBe($arr);

    expect(in_array($arr(), [[1, 2], [2, 1]]))
    ->toBeTrue();

});

test('sort', function ($sort) {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr->sort($sort))
    ->toBe($arr);

    sort($array, $sort);

    expect($arr())
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('substr_replace', function ($replace, $offset, $length) {

    $arr = new Arr($array = ['test1 test1', 'test2 test2']);

    expect($arr->substrreplace($replace, $offset, $length))
    ->toBe($arr);

    expect($arr())
    ->toBe(substr_replace($array, ['test3', 'test 4'], [1, 2], [3, 4]));

})
->with([[['test3', 'test 4']], new Arr(['test3', 'test 4'])])
->with([[[1, 2]], new Arr([1, 2])])
->with([[[3, 4]], new Arr([3, 4])]);

test('uasort', function () {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2']);

    expect($arr->uasort(fn ($a, $b) => 'b' === $b ? 0 : 1))
    ->toBe($arr);

    uasort($array, fn ($a, $b) => 'b' === $b ? 0 : 1);

    expect($arr())
    ->toBe($array);

});

test('uksort', function () {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2']);

    expect($arr->uksort(fn ($a, $b) => 'b' === $b ? 0 : 1))
    ->toBe($arr);

    uksort($array, fn ($a, $b) => 'b' === $b ? 0 : 1);

    expect($arr())
    ->toBe($array);

});

test('usort', function () {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2']);

    expect($arr->usort(fn ($a, $b) => 'b' === $b ? 0 : 1))
    ->toBe($arr);

    usort($array, fn ($a, $b) => 'b' === $b ? 0 : 1);

    expect($arr())
    ->toBe($array);

});

test('valid', function () {

    $arr = new Arr(['test']);

    expect($arr->valid())
    ->toBeTrue();

    $arr->next();

    expect($arr->valid())
    ->toBeFalse();

});

test('vardump', function () {

    $arr = new Arr(['test']);

    expect($arr->vardump())
    ->toBe($arr);

    $this->expectOutputString("array(1) {\n  [0]=>\n  string(4) \"test\"\n}\n");

});

test('implements iterator', function () {

    $arr1 = new Arr(['test1', 'test2']);

    foreach ($arr1 as $key => $value) {
        $arr2[$key()] = $value;
    }

    foreach (['test1', 'test2'] as $key => $value) {

        expect($arr2[$key])
        ->toBeInstanceOf(Str::class);

        expect($arr2[$key]())
        ->toBe($value);

    }

});

test('magic get', function () {

    $arr = new Arr(['A' => 'test']);

    expect($arr->changekeycase)
    ->toBe(array_change_key_case(['A' => 'test']));

});
