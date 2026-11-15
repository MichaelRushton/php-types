<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('implements arr interface', function (): void {

    expect(new Arr())
    ->toBeInstanceOf(ArrInterface::class);

});

test('value', function ($value, $expected): void {

    expect(new Arr($value)->value)
    ->toBe($expected);

})
->with([
    [[], []],
    [new Arr(), []],
]);

test('advance', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->advance())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

});

test('array_all', function (): void {

    $arr = new Arr($array = [1, 2, 3]);

    expect($arr = $arr->all($callback = fn($value) => $value < 3))
    ->toBe(array_all($array, $callback));

});

test('array_any', function (): void {

    $arr = new Arr($array = [1, 2, 3]);

    expect($arr = $arr->any($callback = fn($value) => $value < 3))
    ->toBe(array_any($array, $callback));

});

test('array_change_key_case', function ($case): void {

    $arr = new Arr(['a' => 'test']);

    expect($arr = $arr->changekeycase($case))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_change_key_case(['a' => 'test'], $case));

})
->with([CASE_LOWER, CASE_UPPER]);

test('array_chunk', function ($length, $preserve_keys): void {

    $arr = new Arr(['a' => 'test1', 'b' => 'test2']);

    expect($arr = $arr->chunk($length, $preserve_keys))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_chunk(
        ['a' => 'test1', 'b' => 'test2'],
        (int) (string) $length,
        $preserve_keys
    ));

})
->with([
    [1, true],
    [2, false],
    [new Num(1), true],
]);

test('array_column', function ($column_key, $index_key): void {

    $arr = new Arr([
        ['a' => 'test1', 'b' => 'test2', 'test3'],
        ['a' => 'test4', 'b' => 'test5', 'test6'],
    ]);

    expect($arr = $arr->column($column_key, $index_key))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_column([
        ['a' => 'test1', 'b' => 'test2', 'test3'],
        ['a' => 'test4', 'b' => 'test5', 'test6'],
    ], 'a', 0));

})
->with([
    ['a', 0],
    [new Str('a'), new Num(0)],
]);

test('array_combine', function ($values): void {

    $arr = new Arr([1]);

    expect($arr = $arr->combine($values))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_combine([1], ['test']));

})
->with([
    [['test']],
    [new Arr(['test'])],
]);

test('array_count_values', function (): void {

    $arr = new Arr(['test']);

    expect($arr = $arr->countvalues())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_count_values(['test']));

});

test('array_diff', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->diff($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_diff(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_diff_assoc', function ($array): void {

    $arr = new Arr(['a' => 'test1']);

    expect($arr = $arr->diffassoc($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_diff_assoc(['a' => 'test1'], ['b' => 'test2']));

})
->with([
    [['b' => 'test2']],
    [new Arr(['b' => 'test2'])],
]);

test('array_diff_key', function ($array): void {

    $arr = new Arr(['a' => 'test1']);

    expect($arr = $arr->diffkey($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_diff_key(['a' => 'test1'], ['b' => 'test2']));

})
->with([
    [['b' => 'test2']],
    [new Arr(['b' => 'test2'])],
]);

test('array_diff_uassoc', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->diffuassoc(fn($a, $b) => $a <=> $b, $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_diff_uassoc(['test1'], ['test2'], fn($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_diff_ukey', function (): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->diffukey(fn($a, $b) => $a <=> $b, ['test2']))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_diff_ukey(['test1'], ['test2'], fn($a, $b) => $a <=> $b));

});

test('array_fill', function ($start_index, $count): void {

    expect($arr = Arr::fill($start_index, $count, 'test'))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_fill(0, 1, 'test'));

})
->with([
    [0, 1],
    [new Num(0), new Num(1)],
]);

test('array_fill_keys', function (): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->fillkeys('test2'))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_fill_keys(['test1'], 'test2'));

});

test('array_filter', function (): void {

    $arr = new Arr(['test', '']);

    expect($arr = $arr->filter())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_filter(['test', '']));

    $arr = new Arr(['test', '']);

    expect($arr = $arr->filter(fn($v) => 0 !== $v, ARRAY_FILTER_USE_KEY)->value)
    ->toBe(array_filter(['test', ''], fn($v) => 0 !== $v, ARRAY_FILTER_USE_KEY));

});

test('array_find', function (): void {

    $arr = new Arr($array = [1, 2, 3]);

    expect($num = $arr->find($callback = fn($value) => 2 === $value))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(array_find($array, $callback));

});

test('array_find_key', function (): void {

    $arr = new Arr($array = [1, 2, 3]);

    expect($num = $arr->findkey($callback = fn($value) => 2 === $value))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(array_find_key($array, $callback));

});

test('array_first', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->first())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

});

test('array_flip', function (): void {

    $arr = new Arr(['test']);

    expect($arr = $arr->flip())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_flip(['test']));

});

test('array_intersect', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->intersect($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_intersect(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_intersect_assoc', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->intersectassoc($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_intersect_assoc(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_intersect_key', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->intersectkey($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_intersect_key(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_intersect_uassoc', function ($array): void {

    $arr = new Arr(['test']);

    expect($arr = $arr->intersectuassoc('strcasecmp', $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_intersect_uassoc(['test'], ['TEST'], 'strcasecmp'));

})
->with([
    [['TEST']],
    [new Arr(['TEST'])],
]);

test('array_intersect_ukey', function ($array): void {

    $arr = new Arr([0 => 'test']);

    expect($arr = $arr->intersectukey(fn($a, $b) => $a === $b ? 1 : 0, $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_intersect_ukey([0 => 'test'], [1 => 'test'], fn($a, $b) => $a === $b ? 1 : 0));

})
->with([
    [[1 => 'test']],
    [new Arr([1 => 'test'])],
]);

test('array_is_list', function ($key, $expected): void {

    $arr = new Arr([$key => 'test']);

    expect($arr = $arr->islist())
    ->toBe($expected);

})
->with([
    [0, true],
    [1, false],
]);

test('array_key_exists', function ($key, $expected): void {

    $arr = new Arr(['test']);

    expect($arr = $arr->keyexists($key))
    ->toBe($expected);

})
->with([
    [0, true],
    [1, false],
    [new Num(0), true],
    [new Str('a'), false],
]);

test('array_key_first', function ($key, $class): void {

    $arr = new Arr([$key => 'test1', 'test2']);

    expect($k = $arr->keyfirst())
    ->toBeInstanceOf($class);

    expect($k->value)
    ->toBe($key);

})
->with([
    [0, Num::class],
    ['a', Str::class],
]);

test('array_key_last', function ($key, $class): void {

    $arr = new Arr(['test1', $key => 'test2']);

    expect($k = $arr->keylast())
    ->toBeInstanceOf($class);

    expect($k->value)
    ->toBe($key);

})
->with([
    [0, Num::class],
    ['a', Str::class],
]);

test('array_keys', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->keys())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_keys(['test1', 'test2']));

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->keys('TEST1', true)->value)
    ->toBe(array_keys(['test1', 'test2'], 'TEST1', true));

});

test('array_map', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->map(fn($a, $b) => '$a$b', $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_map(fn($a, $b) => '$a$b', ['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_merge', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->merge($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_merge(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_merge_recursive', function ($array): void {

    $arr = new Arr(['a' => 'test1']);

    expect($arr = $arr->mergerecursive($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_merge_recursive(['a' => 'test1'], ['a' => ['test2', 'test3']]));

})
->with([
    [['a' => ['test2', 'test3']]],
    [new Arr(['a' => ['test2', 'test3']])],
]);

test('array_multisort', function ($rest): void {

    $arr = new Arr($array = [
        ['10', 11, 100, 100, 'a'],
        [1, 2, '2', 3, 1],
    ]);

    expect($arr = $arr->multisort())
    ->toBeInstanceOf(Arr::class);

    array_multisort($array);

    expect($arr->value)
    ->toBe($array);

    $arr = new Arr($array = [
        ['10', 11, 100, 100, 'a'],
        [1, 2, '2', 3, 1],
    ]);

    expect($arr = $arr->multisort(SORT_NUMERIC, SORT_DESC, $rest))
    ->toBeInstanceOf(Arr::class);

    array_multisort($array, SORT_NUMERIC, SORT_DESC, ['test', 'test2']);

    expect($arr->value)
    ->toBe($array);

})
->with([
    [['test1', 'test2']],
    [new Arr(['test', 'test2'])],
]);
;

test('array_pad', function ($length): void {

    $arr = new Arr(['test']);

    expect($arr = $arr->pad($length, 'test'))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_pad(['test'], 2, 'test'));

})
->with([2, new Num(2)]);

test('array_pop', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->pop())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

});

test('array_product', function (): void {

    $arr = new Arr([1, 2]);

    expect($num = $arr->product())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(array_product([1, 2]));

});

test('array_push', function (): void {

    $arr = new Arr($array = ['test1']);

    expect($num = $arr->push('test2'))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(2);

    array_push($array, 'test2');

    expect($arr->value)
    ->toBe($array);

});

test('array_rand', function (): void {

    $arr = new Arr([1 => 'test1', 2 => 'test2']);

    expect($num = $arr->rand())
    ->toBeInstanceOf(Num::class);

    expect(\in_array($num->value, [1, 2]))
    ->toBeTrue();

    $arr = new Arr(['a' => 'test1', 'b' => 'test2']);

    expect($str = $arr->rand())
    ->toBeInstanceOf(Str::class);

    expect(\in_array($str->value, ['a', 'b']))
    ->toBeTrue();

    expect($arr2 = $arr->rand(2))
    ->toBeInstanceOf(Arr::class);

    expect(array_diff((array) $arr2->value, ['a', 'b']))
    ->toBe([]);

});

test('array_reduce', function (): void {

    $arr = new Arr([1, 2]);

    $sum = fn($carry, $item) => $carry += $item;

    expect($arr = $arr->reduce($sum, 3))
    ->toBe(array_reduce([1, 2], $sum, 3));

});

test('array_replace', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->replace($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_replace(['test1'], ['test2']));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_replace_recursive', function ($array): void {

    $arr = new Arr(['a' => ['test1'], 'b' => ['test2', 'test3']]);

    expect($arr = $arr->replacerecursive($array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_replace_recursive(['a' => ['test1'], 'b' => ['test2', 'test3']], ['a' => ['test4'], 'b' => ['test5']]));

})
->with([
    [['a' => ['test4'], 'b' => ['test5']]],
    [new Arr(['a' => ['test4'], 'b' => ['test5']])],
]);

test('array_reverse', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->reverse())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_reverse(['test1', 'test2']));

});

test('array_search', function ($needle, $strict, $expected, $class = null): void {

    $arr = new Arr([1 => 'test1', 'a' => 1]);

    $return = $arr->search($needle, $strict);

    if ($class) {

        expect($return)
        ->toBeInstanceOf($class);

        $return = $return->value;

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

test('array_shift', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->shift())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

});

test('array_slice', function ($offset, $length, $preserve_keys): void {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2', 'c' => 'test3']);

    expect($arr = $arr->slice($offset, $length, $preserve_keys))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(\array_slice($array, 1, 2, $preserve_keys));

})
->with([
    [1, 2, true],
    [new Num(1), new Num(2), false],
]);

test('array_splice', function ($offset, $length, $replacement): void {

    $arr1 = new Arr(['test1', 'test2', 'test3']);

    expect($arr2 = $arr1->splice($offset, $length, $replacement))
    ->toBeInstanceOf(Arr::class);

    expect($arr1->value)
    ->toBe(['test1', 'test4']);

    expect($arr2->value)
    ->toBe(['test2', 'test3']);

    $arr = new Arr(['test1', 'test2', 'test3']);

})
->with([
    [1, 2, ['test4']],
    [new Num(1), new Num(2), new Arr(['test4'])],
]);

test('array_sum', function (): void {

    $arr = new Arr([1, 2]);

    expect($num = $arr->sum())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(array_sum([1, 2]));

});

test('array_udiff', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->udiff(fn($a, $b) => $a <=> $b, $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_udiff(['test1'], ['test2'], fn($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_udiff_assoc', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->udiffassoc(fn($a, $b) => $a <=> $b, $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_udiff_assoc(['test1'], ['test2'], fn($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_udiff_uassoc', function ($array): void {

    $arr = new Arr(['test1']);

    expect(
        $arr->udiffuassoc(
            fn($a, $b) => $a <=> $b,
            fn($a, $b) => $b <=> $a,
            $array
        )
    )
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(
        array_udiff_uassoc(
            ['test1'],
            ['test2'],
            fn($a, $b) => $a <=> $b,
            fn($a, $b) => $b <=> $a
        )
    );

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_uintersect', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->uintersect(fn($a, $b) => $a <=> $b, $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_uintersect(['test1'], ['test2'], fn($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_uintersect_assoc', function ($array): void {

    $arr = new Arr(['test1']);

    expect($arr = $arr->uintersectassoc(fn($a, $b) => $a <=> $b, $array))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_uintersect_assoc(['test1'], ['test2'], fn($a, $b) => $a <=> $b));

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_uintersect_uassoc', function ($array): void {

    $arr = new Arr(['test1']);

    expect(
        $arr = $arr->uintersectuassoc(
            fn($a, $b) => $a <=> $b,
            fn($a, $b) => $b <=> $a,
            $array
        )
    )
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(
        array_uintersect_uassoc(
            ['test1'],
            ['test2'],
            fn($a, $b) => $a <=> $b,
            fn($a, $b) => $b <=> $a
        )
    );

})
->with([
    [['test2']],
    [new Arr(['test2'])],
]);

test('array_unique', function ($sort): void {

    $arr = new Arr(['00', '0']);

    expect($arr = $arr->unique($sort))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_unique(['00', '0'], $sort));

})
->with([SORT_STRING, SORT_NUMERIC]);

test('array_unshift', function (): void {

    $arr = new Arr($array = ['test1']);

    expect($arr = $arr->unshift('test2'))
    ->toBeInstanceOf(Arr::class);

    array_unshift($array, 'test2');

    expect($arr->value)
    ->toBe($array);

});

test('array_values', function (): void {

    $arr = new Arr(['a' => 'test1', 'b' => 'test2']);

    expect($arr = $arr->values())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(array_values(['a' => 'test1', 'b' => 'test2']));

});

test('array_walk', function (): void {

    $arr = new Arr($array = ['TEST1', 'TEST2']);

    expect($arr = $arr->walk(function (&$a, $b, $c): void {
        $a = '$a$c';
    }, '0'))
    ->toBeInstanceOf(Arr::class);

    array_walk($array, function (&$a, $b, $c): void {
        $a = '$a$c';
    }, '0');

    expect($arr->value)
    ->toBe($array);

});

test('array_walk_recursive', function (): void {

    $arr = new Arr($array = [['TEST1', 'TEST2']]);

    expect($arr = $arr->walkrecursive(function (&$a, $b, $c): void {
        $a = '$a$c';
    }, '0'))
    ->toBeInstanceOf(Arr::class);

    array_walk_recursive($array, function (&$a, $b, $c): void {
        $a = '$a$c';
    }, '0');

    expect($arr->value)
    ->toBe($array);

});

test('arsort', function ($sort): void {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr = $arr->arsort($sort))
    ->toBeInstanceOf(Arr::class);

    arsort($array, $sort);

    expect($arr->value)
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('asort', function ($sort): void {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr = $arr->asort($sort))
    ->toBeInstanceOf(Arr::class);

    asort($array, $sort);

    expect($arr->value)
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('contains', function ($needle, $strict, $expected): void {

    $arr = new Arr(['test', 1.0]);

    expect($arr = $arr->contains($needle, $strict))
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

test('count', function ($mode, $expected): void {

    $arr = new Arr(['test1', ['test2', 'test3']]);

    expect($num = $arr->count($mode))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe($expected);

})
->with([
    [COUNT_NORMAL, 2],
    [COUNT_RECURSIVE, 4],
]);

test('current', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->current())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

});

test('end', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->end())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

});

test('implode', function ($separator): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->implode($separator))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test1, test2');

    $arr = new Arr(['test1', 'test2']);

})
->with([', ', new Str(', ')]);

test('json_encode', function (): void {

    $arr = new Arr($array = [1, [2], [[3]]]);

    expect($str = $arr->jsonencode(JSON_PRETTY_PRINT))
    ->toBeInstanceof(Str::class);

    expect($str->value)
    ->toBe(json_encode($array, JSON_PRETTY_PRINT));

    expect($arr->jsonencode(depth: 2))
    ->toBeFalse();

});

test('key', function ($key, $class): void {

    $arr = new Arr([$key => 'test']);

    expect($k = $arr->key())
    ->toBeInstanceOf($class);

    expect($k->value)
    ->toBe($key);

})
->with([
    [0, Num::class],
    ['a', Str::class],
]);

test('krsort', function ($sort): void {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr = $arr->krsort($sort))
    ->toBeInstanceOf(Arr::class);

    krsort($array, $sort);

    expect($arr->value)
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('ksort', function ($sort): void {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr = $arr->ksort($sort))
    ->toBeInstanceOf(Arr::class);

    ksort($array, $sort);

    expect($arr->value)
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('array_last', function (): void {

    $arr = new Arr(['test1', 'test2']);

    expect($str = $arr->last())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test2');

    $arr = new Arr(['test1', 'test2']);

});

test('localeconv', function (): void {

    expect($arr = Arr::localeconv())
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(localeconv());

});

test('max', function (): void {

    $arr = new Arr([1, new Num(2)]);

    expect($num = $arr->max())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(2);

});

test('min', function (): void {

    $arr = new Arr([1, new Num(2)]);

    expect($num = $arr->min())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(1);

});

test('natcasesort', function (): void {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'TEST10', 'c' => 'test2']);

    expect($arr = $arr->natcasesort())
    ->toBeInstanceOf(Arr::class);

    natcasesort($array);

    expect($arr->value)
    ->toBe($array);

});

test('natsort', function (): void {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'TEST10', 'c' => 'test2']);

    expect($arr = $arr->natsort())
    ->toBeInstanceOf(Arr::class);

    natsort($array);

    expect($arr->value)
    ->toBe($array);

});

test('next', function (): void {

    $arr = new Arr(['test1', 'test2']);

    $arr->next();

    expect($arr = $arr->current()->value)
    ->toBe('test2');

});

test('offset exists', function ($offset, $expected): void {

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

test('offset get', function ($offset1, $offset2): void {

    $arr = new Arr(['test']);

    expect($str = $arr[$offset1])
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test');

    expect($arr[$offset2])
    ->toBeNull();

})
->with([
    [0, 1],
    [new Num(0), new Str('a')],
]);

test('offset set', function (): void {

    $arr = new Arr(['test1']);

    $arr[] = 'test2';

    expect($arr->value)
    ->toBe(['test1', 'test2']);

    $arr[3] = 'test3';
    $arr[new Num(4)] = 'test4';
    $arr['a'] = 'test5';
    $arr[new Str('b')] = 'test6';

    expect($arr->value)
    ->toBe([
        'test1',
        'test2',
        3 => 'test3',
        4 => 'test4',
        'a' => 'test5',
        'b' => 'test6',
    ]);

});

test('offset unset', function (): void {

    $arr = new Arr(['test1', 'test2', 'test3', 'a' => 'test3', 'b' => 'test4']);

    unset($arr[1]);
    unset($arr[new Num(2)]);
    unset($arr['a']);
    unset($arr['b']);

    expect($arr->value)
    ->toBe(['test1']);

});

test('preg_filter', function ($pattern, $replacement, $limit): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->pregfilter($pattern, $replacement, $limit, $count1))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(preg_filter('/[st]/', 'a', ['test1', 'test2'], 2, $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    ['/[st]/', 'a', 2],
    [new Str('/[st]/'), new Str('a'), new Num(2)],
    [['/[st]/'], 'a', 2],
    [new Arr(['/[st]/']), 'a', 2],
]);

test('preg_grep', function ($pattern, $flags): void {

    $arr = new Arr(['test1', 'x']);

    expect($arr = $arr->preggrep($pattern, $flags))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(preg_grep('/[st]/', ['test1', 'x'], $flags));

})
->with([
    ['/[st]/', 0],
    [new Str('/[st]/'), PREG_GREP_INVERT],
]);

test('preg_replace', function ($pattern, $replacement, $limit): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->pregreplace($pattern, $replacement, $limit, $count1))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(preg_replace('/[st]/', 'a', ['test1', 'test2'], 2, $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    ['/[st]/', 'a', 2],
    [new Str('/[st]/'), new Str('a'), new Num(2)],
    [['/[st]/'], 'a', 2],
    [new Arr(['/[st]/']), 'a', 2],
]);

test('preg_replace_callback', function ($pattern, $limit): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->pregreplacecallback($pattern, fn($matches) => strtoupper($matches[0]), $limit, $count1))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(preg_replace_callback('/[st]/', fn($matches) => strtoupper($matches[0]), ['test1', 'test2'], 2, $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    ['/[st]/', 2],
    [new Str('/[st]/'), new Num(2)],
    [['/[st]/'], 2],
    [new Arr(['/[st]/']), 2],
]);

test('preg_replace_callback_array', function ($pattern, $limit, $flags): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->pregreplacecallbackarray($pattern, $limit, $count1, $flags))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(preg_replace_callback_array(['/[st]/' => fn($matches) => strtoupper($matches[0])], ['test1', 'test2'], 2, $count2, $flags));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    [['/[st]/' => fn($matches) => strtoupper($matches[0])], 2, 0],
    [new Arr(['/[st]/' => fn($matches) => strtoupper($matches[0])]), new Num(2), PREG_UNMATCHED_AS_NULL],
]);

test('prev', function (): void {

    $arr = new Arr(['test1', 'test2']);

    $arr->next();

    expect($str = $arr->prev())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    $arr->next();

});

test('range', function ($start, $end, $step): void {

    expect($arr = Arr::range($start, $end, $step))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(range(0, 10, 2));

})
->with([
    [0, 10, 2],
    [new Num(0), new Num(10), new Num(2)],
]);

test('reset', function (): void {

    $arr = new Arr(['test1', 'test2']);

    $arr->end();

    expect($str = $arr->reset())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe('test1');

    $arr = new Arr(['test1', 'test2']);

    $arr->end();

});

test('rewind', function (): void {

    $arr = new Arr(['test1', 'test2']);

    $arr->next();
    $arr->rewind();

    expect($arr = $arr->current()->value)
    ->toBe('test1');

});

test('rsort', function ($sort): void {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr = $arr->rsort($sort))
    ->toBeInstanceOf(Arr::class);

    rsort($array, $sort);

    expect($arr->value)
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('seek', function ($offset, $expected): void {

    $arr = new Arr(['test1', 'test2']);

    expect($arr = $arr->seek($offset))
    ->toBeInstanceOf(Arr::class);

    expect($arr = $arr->current() ? $arr->current()->value : $arr->current())
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

test('serialize', function (): void {

    $arr = new Arr($array = [1, 2, 3]);

    expect($str = $arr->serialize())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(serialize($array));

});

test('shuffle', function (): void {

    $arr = new Arr([1, 2]);

    expect($arr = $arr->shuffle())
    ->toBeInstanceOf(Arr::class);

    expect(\in_array($arr->value, [[1, 2], [2, 1]]))
    ->toBeTrue();

});

test('sort', function ($sort): void {

    $arr = new Arr($array = ['a' => 'test', 'b' => '1']);

    expect($arr = $arr->sort($sort))
    ->toBeInstanceOf(Arr::class);

    sort($array, $sort);

    expect($arr->value)
    ->toBe($array);

})
->with([SORT_STRING, SORT_NUMERIC]);

test('substr_replace', function ($replace, $offset, $length): void {

    $arr = new Arr($array = ['test1 test1', 'test2 test2']);

    expect($arr = $arr->substrreplace($replace, $offset, $length))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(substr_replace($array, ['test3', 'test 4'], [1, 2], [3, 4]));

})
->with([[['test3', 'test 4']], new Arr(['test3', 'test 4'])])
->with([[[1, 2]], new Arr([1, 2])])
->with([[[3, 4]], new Arr([3, 4])]);

test('uasort', function (): void {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2']);

    expect($arr = $arr->uasort(fn($a, $b) => 'b' === $b ? 0 : 1))
    ->toBeInstanceOf(Arr::class);

    uasort($array, fn($a, $b) => 'b' === $b ? 0 : 1);

    expect($arr->value)
    ->toBe($array);

});

test('uksort', function (): void {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2']);

    expect($arr = $arr->uksort(fn($a, $b) => 'b' === $b ? 0 : 1))
    ->toBeInstanceOf(Arr::class);

    uksort($array, fn($a, $b) => 'b' === $b ? 0 : 1);

    expect($arr->value)
    ->toBe($array);

});

test('usort', function (): void {

    $arr = new Arr($array = ['a' => 'test1', 'b' => 'test2']);

    expect($arr = $arr->usort(fn($a, $b) => 'b' === $b ? 0 : 1))
    ->toBeInstanceOf(Arr::class);

    usort($array, fn($a, $b) => 'b' === $b ? 0 : 1);

    expect($arr->value)
    ->toBe($array);

});

test('valid', function (): void {

    $arr = new Arr(['test']);

    expect($arr->valid())
    ->toBeTrue();

    $arr->next();

    expect($arr->valid())
    ->toBeFalse();

});

test('pipe', function (): void {

    $arr1 = new Arr();

    expect($arr1->pipe(function ($arr2) use ($arr1) {

        expect($arr2)
        ->toBe($arr1);

        return true;

    }))
    ->toBeTrue();

});

test('through', function (): void {

    $arr1 = new Arr(['a' => 'b']);

    expect($arr1->through(function ($arr2) use ($arr1, &$flip): void {

        expect($arr2)
        ->toBe($arr1);

        $flip = $arr2->flip()->value;

    }))
    ->toBe($arr1);

    expect($flip)
    ->toBe(array_flip(['a' => 'b']));

});

test('__get', function (): void {

    expect(new Arr(['a' => 'b'])->flip)
    ->toBe(array_flip(['a' => 'b']));

});
