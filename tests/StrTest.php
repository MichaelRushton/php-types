<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('implements str interface', function (): void {

    expect(new Str(''))
    ->toBeInstanceOf(StrInterface::class);

});

test('implements stringable', function (): void {

    expect(new Str(''))
    ->toBeInstanceOf(Stringable::class);

});

test('value', function ($value, $expected): void {

    expect(new Str($value)->value)
    ->toBe($expected);

})
->with([
    ['', ''],
    [new Str(''), ''],
]);

test('addcslashes', function ($characters): void {

    $str = new Str('test');

    expect($str = $str->addcslashes($characters))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(addcslashes('test', 'A..z'));

})
->with(['A..z', new Str('A..z')]);

test('addslashes', function (): void {

    $str = new Str("te'st");

    expect($str = $str->addslashes())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(addslashes("te'st"));

});

test('bin2hex', function (): void {

    $str = new Str('test');

    expect($str = $str->bin2hex())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(bin2hex('test'));

});

test('chunk_split', function ($length, $separator): void {

    $str = new Str('test');

    expect($str = $str->chunksplit($length, $separator))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(chunk_split('test', 2, '-'));

})
->with([
    [2, '-'],
    [new Num(2), new Str('-')],
]);

test('convert_uudecode', function (): void {

    $str = new Str(convert_uuencode('test'));

    expect($str = $str->convertuudecode())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(convert_uudecode(convert_uuencode('test')));

});

test('convert_uuencode', function (): void {

    $str = new Str('test');

    expect($str = $str->convertuuencode())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(convert_uuencode('test'));

});

test('count_chars array', function ($mode): void {

    $str = new Str('test');

    expect($arr = $str->countchars($mode))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(count_chars('test', (int) (string) $mode));

})
->with([0, 1, 2, new Num(0), new Num(1), new Num(2)]);

test('count_chars string', function ($mode): void {

    $str = new Str('test');

    expect($str = $str->countchars($mode))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(count_chars('test', (int) (string) $mode));

})
->with([3, 4, new Num(3), new Num(4)]);

test('crc32', function (): void {

    $str = new Str('test');

    expect($num = $str->crc32())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(crc32('test'));

});

test('crypt', function ($salt): void {

    $str = new Str('test');

    expect($str = $str->crypt($salt))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(crypt('test', '$1$test$'));

})
->with(['$1$test$', new Str('$1$test$')]);

test('explode', function ($separator, $limit): void {

    $str = new Str('test1-test2-test3');

    expect($arr = $str->explode($separator, $limit))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(explode('-', 'test1-test2-test3', 2));

})
->with([
    ['-', 2],
    [new Str('-'), new Num(2)],
]);

test('hebrev', function ($max_chars_per_line): void {

    $str = new Str('á çùåï äúùñâ');

    expect($str = $str->hebrev($max_chars_per_line))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(hebrev('á çùåï äúùñâ', (int) (string) $max_chars_per_line));

})
->with([10, new Num(10)]);

test('hex2bin', function (): void {

    $str = new Str(bin2hex('test'));

    expect($str = $str->hex2bin())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(hex2bin(bin2hex('test')));

});

test('html_entity_decode', function ($flags, $encoding): void {

    $str = new Str('&#039;test&#039; &pound; test');

    expect($str = $str->htmlentitydecode($flags, $encoding))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(html_entity_decode('&#039;test&#039; &pound; test', $flags, (string) $encoding));

})
->with([
    [ENT_QUOTES, 'UTF-8'],
    [ENT_QUOTES, new Str('UTF-8')],
]);

test('htmlentities', function ($flags, $encoding, $double_encode): void {

    $str = new Str("'&#039;test&#039;' &pound; £ test");

    expect($str = $str->htmlentities($flags, $encoding, $double_encode))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(htmlentities("'&#039;test&#039;' &pound; £ test", $flags, (string) $encoding, $double_encode));

})
->with([
    [ENT_QUOTES, 'UTF-8', true],
    [ENT_NOQUOTES, new Str('UTF-8'), false],
]);

test('htmlspecialchars', function ($flags, $encoding, $double_encode): void {

    $str = new Str("'&#039;test&#039;' &pound; £ test");

    expect($str = $str->htmlspecialchars($flags, $encoding, $double_encode))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(htmlspecialchars("'&#039;test&#039;' &pound; £ test", $flags, (string) $encoding, $double_encode));

})
->with([
    [ENT_QUOTES, 'UTF-8', true],
    [ENT_NOQUOTES, new Str('UTF-8'), false],
]);

test('htmlspecialchars_decode', function ($flags): void {

    $str = new Str('&#039;test&#039; &pound; test');

    expect($str = $str->htmlspecialcharsdecode($flags))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(htmlspecialchars_decode('&#039;test&#039; &pound; test', $flags));

})
->with([ENT_QUOTES, ENT_NOQUOTES]);

test('json_encode', function (): void {

    $str = new Str('"test"');

    expect($str = $str->jsonencode(JSON_PRETTY_PRINT))
    ->toBeInstanceof(Str::class);

    expect($str->value)
    ->toBe(json_encode('"test"', JSON_PRETTY_PRINT));

});

test('json_validate', function ($value): void {

    $str = new Str($value);

    expect($str->jsonvalidate())
    ->toBe(json_validate($value));

})
->with(['"test"', 'test']);

test('lcfirst', function (): void {

    $str = new Str('TEST');

    expect($str = $str->lcfirst())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(lcfirst('TEST'));

});

test('levenshtein', function ($string2, $cost): void {

    $str = new Str('this is a test');

    expect($num = $str->levenshtein($string2, $cost, $cost, $cost))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(levenshtein('this is a test', 'testing', 2, 2, 2));

})
->with([
    ['testing', 2],
    [new Str('testing'), new Num(2)],
]);

test('ltrim', function ($characters): void {

    $str = new Str(' testing ');

    expect($str = $str->ltrim($characters))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(ltrim(' testing ', ' t'));

})
->with([' t', new Str(' t')]);

test('md5', function ($binary): void {

    $str = new Str('test');

    expect($str = $str->md5($binary))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(md5('test', $binary));

})
->with([true, false]);

test('md5_file', function ($binary): void {

    $str = new Str('php://output');

    expect($str = $str->md5file($binary))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(md5_file('php://output', $binary));

})
->with([true, false]);

test('metaphone', function ($max_phonemes): void {

    $str = new Str('test');

    expect($str = $str->metaphone($max_phonemes))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(metaphone('test', 2));

})
->with([2, new Num(2)]);

test('nl_langinfo', function (): void {

    $str = Str::nllanginfo(CODESET);

    expect($str)
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(nl_langinfo(CODESET));

});

test('nl2br', function ($use_xhtml): void {

    $str = new Str('test1\ntest2');

    expect($str = $str->nl2br($use_xhtml))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(nl2br('test1\ntest2', $use_xhtml));

})
->with([true, false]);

test('ord', function (): void {

    $str = new Str('a');

    expect($num = $str->ord())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(\ord('a'));

});

test('parse_str', function (): void {

    $str = new Str('test1=test2');

    expect($arr = $str->parsestr())
    ->toBeInstanceOf(Arr::class);

    parse_str('test1=test2', $expected);

    expect($arr->value)
    ->toBe($expected);

});

test('preg_filter', function ($pattern, $replacement, $limit): void {

    $str = new Str('test');

    expect($str = $str->pregfilter($pattern, $replacement, $limit, $count1))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(preg_filter('/[st]/', 'a', 'test', 2, $count2));

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

test('preg_match', function ($pattern, $flags, $offset): void {

    $str = new Str('test');

    expect($num = $str->pregmatch($pattern, $matches1, $flags, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(preg_match('/[st]/', 'test', $matches2, $flags, 1));

    expect($matches1)
    ->toBeInstanceOf(Arr::class);

    expect($matches1?->value)
    ->toBe($matches2);

})
->with([
    ['/[st]/', 0, 1],
    [new Str('/[st]/'), PREG_OFFSET_CAPTURE, new Num(1)],
]);

test('preg_match_all', function ($pattern, $flags, $offset): void {

    $str = new Str('test');

    expect($num = $str->pregmatchall($pattern, $matches1, $flags, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(preg_match_all('/[st]/', 'test', $matches2, $flags, 1));

    expect($matches1)
    ->toBeInstanceOf(Arr::class);

    expect($matches1?->value)
    ->toBe($matches2);

})
->with([
    ['/[st]/', 0, 1],
    [new Str('/[st]/'), PREG_OFFSET_CAPTURE, new Num(1)],
]);

test('preg_quote', function ($delimiter): void {

    $str = new Str('te*st');

    expect($str = $str->pregquote($delimiter))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(preg_quote('te*st', 't'));

})
->with(['t', new Str('t')]);

test('preg_replace', function ($pattern, $replacement, $limit): void {

    $str = new Str('test');

    expect($str = $str->pregreplace($pattern, $replacement, $limit, $count1))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(preg_replace('/[st]/', 'a', 'test', 2, $count2));

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

    $str = new Str('test');

    expect($str = $str->pregreplacecallback($pattern, fn($matches) => strtoupper($matches[0]), $limit, $count1))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(preg_replace_callback('/[st]/', fn($matches) => strtoupper($matches[0]), 'test', 2, $count2));

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

    $str = new Str('test');

    expect($str = $str->pregreplacecallbackarray($pattern, $limit, $count1, $flags))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(preg_replace_callback_array(['/[st]/' => fn($matches) => strtoupper($matches[0])], 'test', 2, $count2, $flags));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    [['/[st]/' => fn($matches) => strtoupper($matches[0])], 2, 0],
    [new Arr(['/[st]/' => fn($matches) => strtoupper($matches[0])]), new Num(2), PREG_UNMATCHED_AS_NULL],
]);

test('preg_split', function ($pattern, $limit, $flags): void {

    $str = new Str('test');

    expect($arr = $str->pregsplit($pattern, $limit, $flags))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(preg_split('/[es]/', 'test', 2, $flags));

})
->with([
    ['/[es]/', 2, 0],
    [new Str('/[es]/'), new Num(2), PREG_SPLIT_OFFSET_CAPTURE],
]);

test('quoted_printable_decode', function (): void {

    $str = new Str(quoted_printable_encode('Möchten Sie ein paar Äpfel?'));

    expect($str = $str->quotedprintabledecode())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(quoted_printable_decode(quoted_printable_encode('Möchten Sie ein paar Äpfel?')));

});

test('quoted_printable_encode', function (): void {

    $str = new Str('Möchten Sie ein paar Äpfel?');

    expect($str = $str->quotedprintableencode())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(quoted_printable_encode('Möchten Sie ein paar Äpfel?'));

});

test('quotemeta', function (): void {

    $str = new Str('test.test');

    expect($str = $str->quotemeta())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(quotemeta('test.test'));

});

test('rtrim', function ($characters): void {

    $str = new Str(' testing ');

    expect($str = $str->rtrim($characters))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(rtrim(' testing ', ' t'));

})
->with([' t', new Str(' t')]);

test('serialize', function (): void {

    $str = new Str('"test"');

    expect($str = $str->serialize())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(serialize('"test"'));

});

test('sha1', function ($binary): void {

    $str = new Str('test');

    expect($str = $str->sha1($binary))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(sha1('test', $binary));

})
->with([true, false]);

test('sha1_file', function ($binary): void {

    $str = new Str($tmpnam = tempnam('/tmp', 'test'));

    expect($str = $str->sha1file($binary))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(sha1_file($tmpnam, $binary));

})
->with([true, false]);

test('similar_text', function ($string2): void {

    $str = new Str('test1');

    expect($num = $str->similartext($string2, $percent1))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(similar_text('test1', 'test2', $percent2));

    expect($percent1)
    ->toBeInstanceOf(Num::class);

    expect($percent1?->value)
    ->toBe($percent2);

})
->with(['test2', new Str('test2')]);

test('soundex', function (): void {

    $str = new Str('test');

    expect($str = $str->soundex())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(soundex('test'));

});

test('sprintf', function ($string, $number): void {

    $str = new Str('%s %u');

    expect($str = $str->sprintf($string, $number))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(\sprintf('%s %u', 'test', 1));

})
->with([
    ['test', 1],
    [new Str('test'), new Num(1)],
]);

test('sscanf', function ($format): void {

    $str = new Str('test 1');

    expect($arr = $str->sscanf($format))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(sscanf('test 1', '%s %u'));

})
->with(['%s %u', new Str('%s %u')]);

test('str_contains', function ($needle): void {

    $str = new Str('testing');

    expect($str = $str->contains($needle))
    ->toBe(str_contains('testing', (string) $needle));

})
->with(['test', new Str('test')]);

test('str_decrement', function (): void {

    $str = new Str('test');

    expect($str = $str->decrement())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_decrement('test'));

});

test('str_ends_with', function ($needle): void {

    $str = new Str('test');

    expect($str = $str->endswith($needle))
    ->toBe(str_ends_with('test', (string) $needle));

})
->with(['st', new Str('st')]);

test('str_getcsv', function ($separator, $enclosure, $escape): void {

    $str = new Str('test,test');

    expect($arr = $str->getcsv($separator, $enclosure, $escape))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(str_getcsv('test,test', ',', '\'', '\\'));

})
->with([
    [',', '\'', '\\'],
    [new Str(','), new Str('\''), new Str('\\')],
]);

test('str_increment', function (): void {

    $str = new Str('test');

    expect($str = $str->increment())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_increment('test'));

});

test('str_ireplace', function ($search, $replace): void {

    $str = new Str('test test');

    expect($str = $str->ireplace($search, $replace, $count1))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_ireplace(['test'], ['testing'], 'test test', $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    ['TEST', 'testing'],
    [new Str('TEST'), new Str('testing')],
    [['TEST'], ['testing']],
    [new Arr(['TEST']), new Arr(['testing'])],
]);

test('str_pad', function ($length, $pad_string, $pad_type): void {

    $str = new Str('test');

    expect($str = $str->pad($length, $pad_string, $pad_type))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_pad('test', 6, '-', $pad_type));

})
->with([
    [6, '-', STR_PAD_LEFT],
    [new Num(6), new Str('-'), STR_PAD_RIGHT],
]);

test('str_repeat', function ($times): void {

    expect($str = Str::repeat('a', $times))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_repeat('a', 6));

})
->with([6, new Num(6)]);

test('str_replace', function ($search, $replace): void {

    $str = new Str('test test');

    expect($str = $str->replace($search, $replace, $count1))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_replace(['test'], ['testing'], 'test test', $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1?->value)
    ->toBe($count2);

})
->with([
    ['test', 'testing'],
    [new Str('test'), new Str('testing')],
    [['test'], ['testing']],
    [new Arr(['test']), new Arr(['testing'])],
]);

test('str_rot13', function (): void {

    $str = new Str('test');

    expect($str = $str->rot13())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(str_rot13('test'));

});

test('str_shuffle', function (): void {

    $str = new Str('ab');

    expect($str = $str->shuffle())
    ->toBeInstanceOf(Str::class);

    expect(\in_array($str->value, ['ab', 'ba']))
    ->toBeTrue();

});

test('str_split', function ($length): void {

    $str = new Str('test');

    expect($arr = $str->split($length))
    ->toBeInstanceOf(Arr::class);

    expect($arr->value)
    ->toBe(str_split('test', 2));

})
->with([2, new Num(2)]);

test('str_starts_with', function ($needle): void {

    $str = new Str('test');

    expect($str = $str->startswith($needle))
    ->toBe(str_starts_with('test', (string) $needle));

})
->with(['te', new Str('te')]);

test('str_word_count', function ($format, $characters, $class): void {

    $str = new Str('test test -');

    expect($return = $str->wordcount($format, $characters))
    ->toBeInstanceOf($class);

    expect($return->value)
    ->toBe(str_word_count('test test -', $format, (string) $characters));

})
->with([
    [0, null, Num::class],
    [1, '-', Arr::class],
    [2, new Str('-'), Arr::class],
]);

test('strcasecmp', function ($string2): void {

    $str = new Str('test1');

    expect($num = $str->casecmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strcasecmp('test1', 'test2'));

})
->with(['test2', new Str('test2')]);

test('strcmp', function ($string2): void {

    $str = new Str('test1');

    expect($num = $str->cmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strcmp('test1', 'test2'));

})
->with(['test2', new Str('test2')]);

test('strcoll', function ($string2): void {

    $str = new Str('test1');

    expect($num = $str->coll($string2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strcoll('test1', 'test2'));

})
->with(['test2', new Str('test2')]);

test('strcspn', function ($characters, $offset, $length): void {

    $str = new Str('testtest');

    expect($num = $str->cspn($characters, $offset, $length))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strcspn('testtest', 't', 1, 6));

})
->with([
    ['t', 1, 6],
    [new Str('t'), new Num(1), new Num(6)],
]);

test('strip_tags', function ($allowed_tags): void {

    $str = new Str('<span>Test<br></span>');

    expect($str = $str->striptags($allowed_tags))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(strip_tags('<span>Test<br></span>', '<br>'));

})
->with([
    [['<br>']],
    new Arr(['<br>']),
    '<br>',
    new Str('<br>'),
]);

test('stripcslashes', function (): void {

    $str = new Str('te\'s\nt');

    expect($str = $str->stripcslashes())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(stripcslashes('te\'s\nt'));

});

test('stripos', function ($needle, $offset): void {

    $str = new Str('test');

    expect($num = $str->ipos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(stripos('test', 't', 1));

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('stripslashes', function (): void {

    $str = new Str('te\'s\nt');

    expect($str = $str->stripslashes())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(stripslashes('te\'s\nt'));

});

test('stristr', function ($needle, $before_needle): void {

    $str = new Str('test');

    expect($str = $str->istr($needle, $before_needle))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(stristr('test', (string) $needle, $before_needle));

    expect($str->istr('z'))
    ->toBeFalse();

})
->with([
    ['s', true],
    [new Str('s'), false],
]);

test('strlen', function (): void {

    $str = new Str('test');

    expect($num = $str->len())
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(\strlen('test'));

});

test('strnatcasecmp', function ($string2): void {

    $str = new Str('test1');

    expect($num = $str->natcasecmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strnatcasecmp('test1', 'TEST2'));

})
->with(['TEST2', new Str('TEST2')]);

test('strnatcmp', function ($string2): void {

    $str = new Str('test1');

    expect($num = $str->natcmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strnatcmp('test1', 'TEST2'));

})
->with(['TEST2', new Str('TEST2')]);

test('strncasecmp', function ($string2, $length): void {

    $str = new Str('test1');

    expect($num = $str->ncasecmp($string2, $length))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strncasecmp('test1', 'TET2', 2));

})
->with([
    ['TET2', 2],
    [new Str('TET2'), new Num(2)],
]);

test('strncmp', function ($string2, $length): void {

    $str = new Str('test1');

    expect($num = $str->ncmp($string2, $length))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strncmp('test1', 'TET2', 2));

})
->with([
    ['TET2', 2],
    [new Str('TET2'), new Num(2)],
]);

test('strpbrk', function ($characters): void {

    $str = new Str('test');

    expect($str = $str->pbrk($characters))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(strpbrk('test', (string) $characters));

    expect($str->pbrk('z'))
    ->toBeFalse();

})
->with(['s', new Str('s')]);

test('strpos', function ($needle, $offset): void {

    $str = new Str('test');

    expect($num = $str->pos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strpos('test', 't', 1));

    expect($str->pos('z'))
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('strrchr', function ($needle, $before_needle): void {

    $str = new Str('test');

    expect($str = $str->rchr($needle, $before_needle))
    ->toBeInstanceOf(Str::class);

    $args = [(string) $needle, $before_needle];

    expect($str->value)
    ->toBe(strrchr('test', ...$args));

    expect($str->rchr('z'))
    ->toBeFalse();

})
->with([
    ['s', true],
    [new Str('s'), false],
]);

test('strrev', function (): void {

    $str = new Str('test');

    expect($str = $str->rev())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(strrev('test'));

});

test('strripos', function ($needle, $offset): void {

    $str = new Str('test');

    expect($num = $str->ripos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strripos('test', 't', 1));

    expect($str->ripos('z'))
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('strrpos', function ($needle, $offset): void {

    $str = new Str('test');

    expect($num = $str->rpos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strrpos('test', 't', 1));

    expect($str->rpos('z'))
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('strspn', function ($characters, $offset, $length): void {

    $str = new Str('testtest');

    expect($num = $str->spn($characters, $offset, $length))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(strspn('testtest', 't', 1, 6));

})
->with([
    ['t', 1, 6],
    [new Str('t'), new Num(1), new Num(6)],
]);

test('strstr', function ($needle, $before_needle): void {

    $str = new Str('test');

    expect($str = $str->str($needle, $before_needle))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(strstr('test', (string) $needle, $before_needle));

    expect($str->str('z'))
    ->toBeFalse();

})
->with([
    ['s', true],
    [new Str('s'), false],
]);

test('strtolower', function (): void {

    $str = new Str('TEST');

    expect($str = $str->tolower())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(strtolower('TEST'));

});

test('strtoupper', function (): void {

    $str = new Str('test');

    expect($str = $str->toupper())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(strtoupper('test'));

});

test('strtr', function ($from, $to = null): void {

    $str = new Str('test');

    expect($str = $str->tr(...$args = \func_get_args()))
    ->toBeInstanceOf(Str::class);

    foreach ($args as &$arg) {

        if (!\is_string($arg) && !\is_array($arg)) {
            $arg = $arg->value;
        }

    }

    expect($str->value)
    ->toBe(strtr('test', ...$args));

})
->with([
    ['t', 'a'],
    [new Str('t'), new Str('a')],
    [['t' => 'a']],
    new Arr(['t' => 'a']),
]);

test('substr', function ($offset, $length): void {

    $str = new Str('test test');

    expect($str = $str->substr($offset, $length))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(substr('test test', 2, 4));

})
->with([
    [2, 4],
    [new Num(2), new Num(4)],
]);

test('substr_compare', function ($needle, $offset, $length, $case_insensitive): void {

    $str = new Str('test test');

    expect($num = $str->substrcompare($needle, $offset, $length, $case_insensitive))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(substr_compare('test test', 'TEST', 2, 4, $case_insensitive));

})
->with([
    ['TEST', 2, 4, true],
    [new Str('TEST'), new Num(2), new Num(4), false],
]);

test('substr_count', function ($needle, $offset, $length): void {

    $str = new Str('test test');

    expect($num = $str->substrcount($needle, $offset, $length))
    ->toBeInstanceOf(Num::class);

    expect($num->value)
    ->toBe(substr_count('test test', 'test', 2, 4));

})
->with([
    ['test', 2, 4],
    [new Str('test'), new Num(2), new Num(4)],
]);

test('substr_replace', function ($replace, $offset, $length): void {

    $str = new Str('test test');

    expect($str = $str->substrreplace($replace, $offset, $length))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(substr_replace('test test', 'test', 2, 4));

})
->with([
    ['test', 2, 4],
    [new Str('test'), new Num(2), new Num(4)],
]);

test('trim', function ($characters): void {

    $str = new Str(' testing ');

    expect($str = $str->trim($characters))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(trim(' testing ', ' t'));

})
->with([' t', new Str(' t')]);

test('ucfirst', function (): void {

    $str = new Str('test');

    expect($str = $str->ucfirst())
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(ucfirst('test'));

});

test('ucwords', function ($separators): void {

    $str = new Str('test test');

    expect($str = $str->ucwords($separators))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(ucwords('test test', ' s'));

})
->with([' s', new Str(' s')]);

test('unserialize', function ($value, $expected): void {

    $str = new Str(serialize($value));

    expect($return = $str->unserialize())
    ->toBeInstanceOf($expected);

    expect($return->value)
    ->toBe($value);

})
->with([
    ['test', Str::class],
    [['test'], Arr::class],
    [1, Num::class],
]);

test('vsprintf', function ($values): void {

    $str = new Str('%s %u');

    expect($str = $str->vsprintf($values))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(vsprintf('%s %u', ['test', 1]));

})
->with([
    [['test', 1]],
    [new Arr(['test', 1])],
]);

test('wordwrap', function ($width, $break, $cut_long_words): void {

    $str = new Str('testing testing');

    expect($str = $str->wordwrap($width, $break, $cut_long_words))
    ->toBeInstanceOf(Str::class);

    expect($str->value)
    ->toBe(wordwrap('testing testing', 4, ',', $cut_long_words));

})
->with([
    [4, ',', true],
    [new Num(4), new Str(','), false],
]);

test('pipe', function (): void {

    $str1 = new Str('');

    expect($str1->pipe(function ($str2) use ($str1) {

        expect($str2)
        ->toBe($str1);

        return true;

    }))
    ->toBeTrue();

});

test('through', function (): void {

    $str1 = new Str('test');

    expect($str1->through(function ($str2) use ($str1, &$toupper): void {

        expect($str2)
        ->toBe($str1);

        $toupper = $str2->toupper()->value;

    }))
    ->toBe($str1);

    expect($toupper)
    ->toBe(strtoupper('test'));

});

test('__get', function (): void {

    expect(new Str('test')->toupper)
    ->toBe(strtoupper('test'));

});

test('__toString', function (): void {

    expect((string) new Str('test'))
    ->toBe('test');

});
