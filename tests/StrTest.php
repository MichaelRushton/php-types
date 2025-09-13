<?php

declare(strict_types=1);

use MichaelRushton\Types\Arr;
use MichaelRushton\Types\Convert;
use MichaelRushton\Types\Num;
use MichaelRushton\Types\Str;

test('addcslashes', function ($characters) {

    $str = new Str('test');

    expect($str->addcslashes($characters))
    ->toBe($str);

    expect($str())
    ->toBe(addcslashes('test', 'A..z'));

})
->with(['A..z', new Str('A..z')]);

test('addslashes', function () {

    $str = new Str("te'st");

    expect($str->addslashes())
    ->toBe($str);

    expect($str())
    ->toBe(addslashes("te'st"));

});

test('bin2hex', function () {

    $str = new Str('test');

    expect($str->bin2hex())
    ->toBe($str);

    expect($str())
    ->toBe(bin2hex('test'));

});

test('chunk_split', function ($length, $separator) {

    $str = new Str('test');

    expect($str->chunksplit($length, $separator))
    ->toBe($str);

    expect($str())
    ->toBe(chunk_split('test', 2, '-'));

})
->with([
    [2, '-'],
    [new Num(2), new Str('-')],
]);

test('clone', function () {

    $str1 = new Str('test');

    expect($str2 = $str1->clone())
    ->toBeInstanceOf(Str::class);

    expect($str2)
    ->not->toBe($str1);

    expect($str2())
    ->toBe('test');

    expect($str1->clone($str2))
    ->toBe($str1);

    expect($str2)
    ->toBeInstanceOf(Str::class);

    expect($str2)
    ->not->toBe($str1);

    expect($str2())
    ->toBe('test');

});

test('convert_uudecode', function () {

    $str = new Str(convert_uuencode('test'));

    expect($str->convertuudecode())
    ->toBe($str);

    expect($str())
    ->toBe(convert_uudecode(convert_uuencode('test')));

});

test('convert_uuencode', function () {

    $str = new Str('test');

    expect($str->convertuuencode())
    ->toBe($str);

    expect($str())
    ->toBe(convert_uuencode('test'));

});

test('count_chars array', function ($mode) {

    $str = new Str('test');

    expect($result = $str->countchars($mode))
    ->toBeInstanceOf(Arr::class);

    expect($result())
    ->toBe($expected = count_chars('test', (int) (string) $mode));

    expect($str->countchars($mode, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($return())
    ->toBe($expected);

})
->with([0, 1, 2, new Num(0), new Num(1), new Num(2)]);

test('count_chars string', function ($mode) {

    $str = new Str('test');

    expect($str->countchars($mode))
    ->toBe($str);

    expect($str())
    ->toBe(count_chars('test', (int) (string) $mode));

})
->with([3, 4, new Num(3), new Num(4)]);

test('crc32', function () {

    $str = new Str('test');

    expect($num = $str->crc32())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = crc32('test'));

    expect($str->crc32($return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

});

test('crypt', function ($salt) {

    $str = new Str('test');

    expect($str->crypt($salt))
    ->toBe($str);

    expect($str())
    ->toBe(crypt('test', '$1$test$'));

})
->with(['$1$test$', new Str('$1$test$')]);

test('echo', function () {

    $str = new Str('test');

    expect($str->echo())
    ->toBe($str);

    $this->expectOutputString('test');

});

test('explode', function ($separator, $limit) {

    $str = new Str('test1-test2-test3');

    expect($arr = $str->explode($separator, $limit))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected = explode('-', 'test1-test2-test3', 2));

    expect($str->explode($separator, $limit, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['-', 2],
    [new Str('-'), new Num(2)],
]);

test('fprintf', function ($string, $number) {

    $str = new Str('%s %u');

    expect($str->fprintf(fopen('php://output', 'w'), $string, $number))
    ->toBe($str);

    $this->expectOutputString('test 1');

})
->with([
    ['test', 1],
    [new Str('test'), new Num(1)],
]);

test('hebrev', function ($max_chars_per_line) {

    $str = new Str('á çùåï äúùñâ');

    expect($str->hebrev($max_chars_per_line))
    ->toBe($str);

    expect($str())
    ->toBe(hebrev('á çùåï äúùñâ', (int) (string) $max_chars_per_line));

})
->with([10, new Num(10)]);

test('hex2bin', function () {

    $str = new Str(bin2hex('test'));

    expect($str->hex2bin())
    ->toBe($str);

    expect($str())
    ->toBe(hex2bin(bin2hex('test')));

});

test('html_entity_decode', function ($flags, $encoding) {

    $str = new Str('&#039;test&#039; &pound; test');

    expect($str->htmlentitydecode($flags, $encoding))
    ->toBe($str);

    expect($str())
    ->toBe(html_entity_decode('&#039;test&#039; &pound; test', $flags, (string) $encoding));

})
->with([
    [ENT_QUOTES, 'UTF-8'],
    [ENT_QUOTES, new Str('UTF-8')],
]);

test('htmlentities', function ($flags, $encoding, $double_encode) {

    $str = new Str("'&#039;test&#039;' &pound; £ test");

    expect($str->htmlentities($flags, $encoding, $double_encode))
    ->toBe($str);

    expect($str())
    ->toBe(htmlentities("'&#039;test&#039;' &pound; £ test", $flags, (string) $encoding, $double_encode));

})
->with([
    [ENT_QUOTES, 'UTF-8', true],
    [ENT_NOQUOTES, new Str('UTF-8'), false],
]);

test('htmlspecialchars', function ($flags, $encoding, $double_encode) {

    $str = new Str("'&#039;test&#039;' &pound; £ test");

    expect($str->htmlspecialchars($flags, $encoding, $double_encode))
    ->toBe($str);

    expect($str())
    ->toBe(htmlspecialchars("'&#039;test&#039;' &pound; £ test", $flags, (string) $encoding, $double_encode));

})
->with([
    [ENT_QUOTES, 'UTF-8', true],
    [ENT_NOQUOTES, new Str('UTF-8'), false],
]);

test('htmlspecialchars_decode', function ($flags) {

    $str = new Str('&#039;test&#039; &pound; test');

    expect($str->htmlspecialcharsdecode($flags))
    ->toBe($str);

    expect($str())
    ->toBe(htmlspecialchars_decode('&#039;test&#039; &pound; test', $flags));

})
->with([ENT_QUOTES, ENT_NOQUOTES]);

test('lcfirst', function () {

    $str = new Str('TEST');

    expect($str->lcfirst())
    ->toBe($str);

    expect($str())
    ->toBe(lcfirst('TEST'));

});

test('levenshtein', function ($string2, $cost) {

    $str = new Str('this is a test');

    expect($num = $str->levenshtein($string2, $cost, $cost, $cost))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(levenshtein('this is a test', 'testing', 2, 2, 2));

})
->with([
    ['testing', 2],
    [new Str('testing'), new Num(2)],
]);

test('ltrim', function ($characters) {

    $str = new Str(' testing ');

    expect($str->ltrim($characters))
    ->toBe($str);

    expect($str())
    ->toBe(ltrim(' testing ', ' t'));

})
->with([' t', new Str(' t')]);

test('md5', function ($binary) {

    $str = new Str('test');

    expect($str->md5($binary))
    ->toBe($str);

    expect($str())
    ->toBe(md5('test', $binary));

})
->with([true, false]);

test('md5_file', function ($binary) {

    $str = new Str('php://output');

    expect($str->md5file($binary))
    ->toBe($str);

    expect($str())
    ->toBe(md5_file('php://output', $binary));

})
->with([true, false]);

test('metaphone', function ($max_phonemes) {

    $str = new Str('test');

    expect($str->metaphone($max_phonemes))
    ->toBe($str);

    expect($str())
    ->toBe(metaphone('test', 2));

})
->with([2, new Num(2)]);

test('nl_langinfo', function () {

    $str = Str::nllanginfo(CODESET);

    expect($str)
    ->toBeInstanceOf(Str::class);

    expect($str())
    ->toBe(nl_langinfo(CODESET));

});

test('nl2br', function ($use_xhtml) {

    $str = new Str('test1\ntest2');

    expect($str->nl2br($use_xhtml))
    ->toBe($str);

    expect($str())
    ->toBe(nl2br('test1\ntest2', $use_xhtml));

})
->with([true, false]);

test('ord', function () {

    $str = new Str('a');

    expect($num = $str->ord())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = ord('a'));

    expect($str->ord($return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

});

test('parse_str', function () {

    $str = new Str('test1=test2');

    expect($arr = $str->parsestr())
    ->toBeInstanceOf(Arr::class);

    parse_str('test1=test2', $expected);

    expect($arr())
    ->toBe($expected);

    expect($str->parsestr($return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected);

});

test('preg_filter', function ($pattern, $replacement, $limit) {

    $str = new Str('test');

    expect($str->pregfilter($pattern, $replacement, $limit, $count1))
    ->toBe($str);

    expect($str())
    ->toBe(preg_filter('/[st]/', 'a', 'test', 2, $count2));

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

test('preg_match', function ($pattern, $flags, $offset) {

    $str = new Str('test');

    expect($num = $str->pregmatch($pattern, $matches1, $flags, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = preg_match('/[st]/', 'test', $matches2, $flags, 1));

    expect($matches1)
    ->toBeInstanceOf(Arr::class);

    expect($matches1())
    ->toBe($matches2);

    expect($str->pregmatch($pattern, $matches1, $flags, $offset, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['/[st]/', 0, 1],
    [new Str('/[st]/'), PREG_OFFSET_CAPTURE, new Num(1)],
]);

test('preg_match_all', function ($pattern, $flags, $offset) {

    $str = new Str('test');

    expect($num = $str->pregmatchall($pattern, $matches1, $flags, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = preg_match_all('/[st]/', 'test', $matches2, $flags, 1));

    expect($matches1)
    ->toBeInstanceOf(Arr::class);

    expect($matches1())
    ->toBe($matches2);

    expect($str->pregmatchall($pattern, $matches1, $flags, $offset, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['/[st]/', 0, 1],
    [new Str('/[st]/'), PREG_OFFSET_CAPTURE, new Num(1)],
]);

test('pregquote', function ($delimiter) {

    $str = new Str('te*st');

    expect($str->pregquote($delimiter))
    ->toBe($str);

    expect($str())
    ->toBe(preg_quote('te*st', 't'));

})
->with(['t', new Str('t')]);

test('preg_replace', function ($pattern, $replacement, $limit) {

    $str = new Str('test');

    expect($str->pregreplace($pattern, $replacement, $limit, $count1))
    ->toBe($str);

    expect($str())
    ->toBe(preg_replace('/[st]/', 'a', 'test', 2, $count2));

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

    $str = new Str('test');

    expect($str->pregreplacecallback($pattern, fn ($matches) => strtoupper($matches[0]), $limit, $count1))
    ->toBe($str);

    expect($str())
    ->toBe(preg_replace_callback('/[st]/', fn ($matches) => strtoupper($matches[0]), 'test', 2, $count2));

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

    $str = new Str('test');

    expect($str->pregreplacecallbackarray($pattern, $limit, $count1, $flags))
    ->toBe($str);

    expect($str())
    ->toBe(preg_replace_callback_array(['/[st]/' => fn ($matches) => strtoupper($matches[0])], 'test', 2, $count2, $flags));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    [['/[st]/' => fn ($matches) => strtoupper($matches[0])], 2, 0],
    [new Arr(['/[st]/' => fn ($matches) => strtoupper($matches[0])]), new Num(2), PREG_UNMATCHED_AS_NULL],
]);

test('preg_split', function ($pattern, $limit, $flags) {

    $str = new Str('test');

    expect($arr = $str->pregsplit($pattern, $limit, $flags))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected = preg_split('/[es]/', 'test', 2, $flags));

    expect($str->pregsplit($pattern, $limit, $flags, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['/[es]/', 2, 0],
    [new Str('/[es]/'), new Num(2), PREG_SPLIT_OFFSET_CAPTURE],
]);

test('printf', function ($string, $number) {

    $str = new Str('%s %u');

    expect($str->printf($string, $number))
    ->toBe($str);

    $this->expectOutputString('test 1');

})
->with([
    ['test', 1],
    [new Str('test'), new Num(1)],
]);

test('print_r', function () {

    $str = new Str('test');

    expect($str->printr())
    ->toBe($str);

    $this->expectOutputString($expected = print_r('test', true));

    $str->printr($return);

    expect($return)
    ->toBeInstanceOf(Str::class);

    expect($return())
    ->toBe($expected);

});

test('quoted_printable_decode', function () {

    $str = new Str(quoted_printable_encode('Möchten Sie ein paar Äpfel?'));

    expect($str->quotedprintabledecode())
    ->toBe($str);

    expect($str())
    ->toBe(quoted_printable_decode(quoted_printable_encode('Möchten Sie ein paar Äpfel?')));

});

test('quoted_printable_encode', function () {

    $str = new Str('Möchten Sie ein paar Äpfel?');

    expect($str->quotedprintableencode())
    ->toBe($str);

    expect($str())
    ->toBe(quoted_printable_encode('Möchten Sie ein paar Äpfel?'));

});

test('quotemeta', function () {

    $str = new Str('test.test');

    expect($str->quotemeta())
    ->toBe($str);

    expect($str())
    ->toBe(quotemeta('test.test'));

});

test('rtrim', function ($characters) {

    $str = new Str(' testing ');

    expect($str->rtrim($characters))
    ->toBe($str);

    expect($str())
    ->toBe(rtrim(' testing ', ' t'));

})
->with([' t', new Str(' t')]);

test('sha1', function ($binary) {

    $str = new Str('test');

    expect($str->sha1($binary))
    ->toBe($str);

    expect($str())
    ->toBe(sha1('test', $binary));

})
->with([true, false]);

test('sha1_file', function ($binary) {

    $str = new Str('php://output');

    expect($str->sha1file($binary))
    ->toBe($str);

    expect($str())
    ->toBe(sha1_file('php://output', $binary));

})
->with([true, false]);

test('similartext', function ($string2) {

    $str = new Str('test1');

    expect($num = $str->similartext($string2, $percent1))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = similar_text('test1', 'test2', $percent2));

    expect($percent1)
    ->toBeInstanceOf(Num::class);

    expect($percent1())
    ->toBe($percent2);

    expect($str->similartext($string2, $percent, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with(['test2', new Str('test2')]);

test('soundex', function () {

    $str = new Str('test');

    expect($str->soundex())
    ->toBe($str);

    expect($str())
    ->toBe(soundex('test'));

});

test('sprintf', function ($string, $number) {

    $str = new Str('%s %u');

    expect($str->sprintf($string, $number))
    ->toBe($str);

    expect($str())
    ->toBe(sprintf('%s %u', 'test', 1));

})
->with([
    ['test', 1],
    [new Str('test'), new Num(1)],
]);

test('sscanf', function ($format) {

    $str = new Str('test 1');

    expect($arr = $str->sscanf($format))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected = sscanf('test 1', '%s %u'));

    expect($str->sscanf($format, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($return())
    ->toBe($expected);

})
->with(['%s %u', new Str('%s %u')]);

test('str_contains', function ($needle) {

    $str = new Str('testing');

    expect($str->contains($needle))
    ->toBe($expected = str_contains('testing', (string) $needle));

    expect($str->contains($needle, $return))
    ->toBe($str);

    expect($return)
    ->toBe($expected);

})
->with(['test', new Str('test')]);

test('str_decrement', function () {

    $str = new Str('test');

    expect($str->decrement())
    ->toBe($str);

    expect($str())
    ->toBe(str_decrement('test'));

});

test('str_ends_with', function ($needle) {

    $str = new Str('test');

    expect($str->endswith($needle))
    ->toBe($expected = str_ends_with('test', (string) $needle));

    expect($str->endswith($needle, $return))
    ->toBe($str);

    expect($return)
    ->toBe($expected);

})
->with(['st', new Str('st')]);

test('str_getcsv', function ($separator, $enclosure, $escape) {

    $str = new Str('test,test');

    expect($arr = $str->getcsv($separator, $enclosure, $escape))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected = str_getcsv('test,test', ',', '\'', '\\'));

    expect($str->getcsv($separator, $enclosure, $escape, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($return())
    ->toBe($expected);

})
->with([
    [',', '\'', '\\'],
    [new Str(','), new Str('\''), new Str('\\')],
]);

test('str_increment', function () {

    $str = new Str('test');

    expect($str->increment())
    ->toBe($str);

    expect($str())
    ->toBe(str_increment('test'));

});

test('str_ireplace', function ($search, $replace) {

    $str = new Str('test test');

    expect($str->ireplace($search, $replace, $count1))
    ->toBe($str);

    expect($str())
    ->toBe(str_ireplace(['test'], ['testing'], 'test test', $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    ['TEST', 'testing'],
    [new Str('TEST'), new Str('testing')],
    [['TEST'], ['testing']],
    [new Arr(['TEST']), new Arr(['testing'])],
]);

test('str_pad', function ($length, $pad_string, $pad_type) {

    $str = new Str('test');

    expect($str->pad($length, $pad_string, $pad_type))
    ->toBe($str);

    expect($str())
    ->toBe(str_pad('test', 6, '-', $pad_type));

})
->with([
    [6, '-', STR_PAD_LEFT],
    [new Num(6), new Str('-'), STR_PAD_RIGHT],
]);

test('str_repeat', function ($times) {

    expect($str = Str::repeat('a', $times))
    ->toBe($str);

    expect($str())
    ->toBe(str_repeat('a', 6));

})
->with([6, new Num(6)]);

test('str_replace', function ($search, $replace) {

    $str = new Str('test test');

    expect($str->replace($search, $replace, $count1))
    ->toBe($str);

    expect($str())
    ->toBe(str_replace(['test'], ['testing'], 'test test', $count2));

    expect($count1)
    ->toBeInstanceOf(Num::class);

    expect($count1())
    ->toBe($count2);

})
->with([
    ['test', 'testing'],
    [new Str('test'), new Str('testing')],
    [['test'], ['testing']],
    [new Arr(['test']), new Arr(['testing'])],
]);

test('str_rot13', function () {

    $str = new Str('test');

    expect($str->rot13())
    ->toBe($str);

    expect($str())
    ->toBe(str_rot13('test'));

});

test('str_shuffle', function () {

    $str = new Str('ab');

    expect($str->shuffle())
    ->toBe($str);

    expect(in_array($str(), ['ab', 'ba']))
    ->toBeTrue();

});

test('str_split', function ($length) {

    $str = new Str('test');

    expect($arr = $str->split($length))
    ->toBeInstanceOf(Arr::class);

    expect($arr())
    ->toBe($expected = str_split('test', 2));

    expect($str->split($length, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Arr::class);

    expect($return())
    ->toBe($expected);

})
->with([2, new Num(2)]);

test('str_starts_with', function ($needle) {

    $str = new Str('test');

    expect($str->startswith($needle))
    ->toBe($expected = str_starts_with('test', (string) $needle));

    expect($str->startswith($needle, $return))
    ->toBe($str);

    expect($return)
    ->toBe($expected);

})
->with(['te', new Str('te')]);

test('str_word_count', function ($format, $characters, $class) {

    $str = new Str('test test -');

    expect($return = $str->wordcount($format, $characters))
    ->toBeInstanceOf($class);

    expect($return())
    ->toBe($expected = str_word_count('test test -', $format, Convert::fromFluentType($characters)));

    expect($str->wordcount($format, $characters, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf($class);

    expect($return())
    ->toBe($expected);

})
->with([
    [0, null, Num::class],
    [1, '-', Arr::class],
    [2, new Str('-'), Arr::class],
]);

test('strcasecmp', function ($string2) {

    $str = new Str('test1');

    expect($num = $str->casecmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strcasecmp('test1', 'test2'));

    expect($str->casecmp($string2, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with(['test2', new Str('test2')]);

test('strcmp', function ($string2) {

    $str = new Str('test1');

    expect($num = $str->cmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strcmp('test1', 'test2'));

    expect($str->cmp($string2, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with(['test2', new Str('test2')]);

test('strcoll', function ($string2) {

    $str = new Str('test1');

    expect($num = $str->coll($string2))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strcoll('test1', 'test2'));

    expect($str->coll($string2, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with(['test2', new Str('test2')]);

test('strcspn', function ($characters, $offset, $length) {

    $str = new Str('testtest');

    expect($num = $str->cspn($characters, $offset, $length))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strcspn('testtest', 't', 1, 6));

    expect($str->cspn($characters, $offset, $length, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['t', 1, 6],
    [new Str('t'), new Num(1), new Num(6)],
]);

test('strip_tags', function ($allowed_tags) {

    $str = new Str('<span>Test<br></span>');

    expect($str->striptags($allowed_tags))
    ->toBe($str);

    expect($str())
    ->toBe(strip_tags('<span>Test<br></span>', '<br>'));

})
->with([
    [['<br>']],
    new Arr(['<br>']),
    '<br>',
    new Str('<br>'),
]);

test('stripcslashes', function () {

    $str = new Str('te\'s\nt');

    expect($str->stripcslashes())
    ->toBe($str);

    expect($str())
    ->toBe(stripcslashes('te\'s\nt'));

});

test('stripos', function ($needle, $offset) {

    $str = new Str('test');

    expect($num = $str->ipos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = stripos('test', 't', 1));

    expect($str->ipos($needle, $offset, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

    expect($str->ipos('z'))
    ->toBeFalse();

    expect($str->ipos('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('stripslashes', function () {

    $str = new Str('te\'s\nt');

    expect($str->stripslashes())
    ->toBe($str);

    expect($str())
    ->toBe(stripslashes('te\'s\nt'));

});

test('stristr', function ($needle, $before_needle) {

    $str = new Str('test');

    expect($str->istr($needle, $before_needle))
    ->toBe($str);

    expect($str())
    ->toBe(stristr('test', (string) $needle, $before_needle));

    expect($str->istr('z'))
    ->toBeFalse();

    expect($str->istr('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['s', true],
    [new Str('s'), false],
]);

test('strlen', function () {

    $str = new Str('test');

    expect($num = $str->len())
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe(strlen('test'));

    expect($str->len($return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe(strlen('test'));

});

test('strnatcasecmp', function ($string2) {

    $str = new Str('test1');

    expect($num = $str->natcasecmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strnatcasecmp('test1', 'TEST2'));

    expect($str->natcasecmp($string2, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with(['TEST2', new Str('TEST2')]);

test('strnatcmp', function ($string2) {

    $str = new Str('test1');

    expect($num = $str->natcmp($string2))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strnatcmp('test1', 'TEST2'));

    expect($str->natcmp($string2, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with(['TEST2', new Str('TEST2')]);

test('strncasecmp', function ($string2, $length) {

    $str = new Str('test1');

    expect($num = $str->ncasecmp($string2, $length))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strncasecmp('test1', 'TET2', 2));

    expect($str->ncasecmp($string2, $length, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['TET2', 2],
    [new Str('TET2'), new Num(2)],
]);

test('strncmp', function ($string2, $length) {

    $str = new Str('test1');

    expect($num = $str->ncmp($string2, $length))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strncmp('test1', 'TET2', 2));

    expect($str->ncmp($string2, $length, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['TET2', 2],
    [new Str('TET2'), new Num(2)],
]);

test('strpbrk', function ($characters) {

    $str = new Str('test');

    expect($str->pbrk($characters))
    ->toBe($str);

    expect($str())
    ->toBe(strpbrk('test', (string) $characters));

    expect($str->pbrk('z'))
    ->toBeFalse();

    expect($str->pbrk('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with(['s', new Str('s')]);

test('strpos', function ($needle, $offset) {

    $str = new Str('test');

    expect($num = $str->pos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strpos('test', 't', 1));

    expect($str->pos($needle, $offset, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

    expect($str->pos('z'))
    ->toBeFalse();

    expect($str->pos('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('strrchr', function ($needle, $before_needle) {

    $str = new Str('test');

    expect($str->rchr($needle, $before_needle))
    ->toBe($str);

    $args = [(string) $needle, $before_needle];

    expect($str())
    ->toBe(strrchr('test', ...$args));

    expect($str->rchr('z'))
    ->toBeFalse();

    expect($str->rchr('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['s', true],
    [new Str('s'), false],
]);

test('strrev', function () {

    $str = new Str('test');

    expect($str->rev())
    ->toBe($str);

    expect($str())
    ->toBe(strrev('test'));

});

test('strripos', function ($needle, $offset) {

    $str = new Str('test');

    expect($num = $str->ripos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strripos('test', 't', 1));

    expect($str->ripos($needle, $offset, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

    expect($str->ripos('z'))
    ->toBeFalse();

    expect($str->ripos('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('strrpos', function ($needle, $offset) {

    $str = new Str('test');

    expect($num = $str->rpos($needle, $offset))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strrpos('test', 't', 1));

    expect($str->rpos($needle, $offset, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

    expect($str->rpos('z'))
    ->toBeFalse();

    expect($str->rpos('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['t', 1],
    [new Str('t'), new Num(1)],
]);

test('strspn', function ($characters, $offset, $length) {

    $str = new Str('testtest');

    expect($num = $str->spn($characters, $offset, $length))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = strspn('testtest', 't', 1, 6));

    expect($str->spn($characters, $offset, $length, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['t', 1, 6],
    [new Str('t'), new Num(1), new Num(6)],
]);

test('strstr', function ($needle, $before_needle) {

    $str = new Str('test');

    expect($str->str($needle, $before_needle))
    ->toBe($str);

    expect($str())
    ->toBe(strstr('test', (string) $needle, $before_needle));

    expect($str->str('z'))
    ->toBeFalse();

    expect($str->str('z', return: $return))
    ->toBe($str);

    expect($return)
    ->toBeFalse();

})
->with([
    ['s', true],
    [new Str('s'), false],
]);

test('strtolower', function () {

    $str = new Str('TEST');

    expect($str->tolower())
    ->toBe($str);

    expect($str())
    ->toBe(strtolower('TEST'));

});

test('strtoupper', function () {

    $str = new Str('test');

    expect($str->toupper())
    ->toBe($str);

    expect($str())
    ->toBe(strtoupper('test'));

});

test('strtr', function ($from, $to = null) {

    $str = new Str('test');

    expect($str->tr(...$args = func_get_args()))
    ->toBe($str);

    expect($str())
    ->toBe(strtr('test', ...Convert::fromFluentType($args)));

})
->with([
    ['t', 'a'],
    [new Str('t'), new Str('a')],
    [['t' => 'a']],
    new Arr(['t' => 'a']),
]);

test('substr', function ($offset, $length) {

    $str = new Str('test test');

    expect($str->substr($offset, $length))
    ->toBe($str);

    expect($str())
    ->toBe(substr('test test', 2, 4));

})
->with([
    [2, 4],
    [new Num(2), new Num(4)],
]);

test('substr_compare', function ($needle, $offset, $length, $case_insensitive) {

    $str = new Str('test test');

    expect($num = $str->substrcompare($needle, $offset, $length, $case_insensitive))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = substr_compare('test test', 'TEST', 2, 4, $case_insensitive));

    expect($str->substrcompare($needle, $offset, $length, $case_insensitive, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['TEST', 2, 4, true],
    [new Str('TEST'), new Num(2), new Num(4), false],
]);

test('substr_count', function ($needle, $offset, $length) {

    $str = new Str('test test');

    expect($num = $str->substrcount($needle, $offset, $length))
    ->toBeInstanceOf(Num::class);

    expect($num())
    ->toBe($expected = substr_count('test test', 'test', 2, 4));

    expect($str->substrcount($needle, $offset, $length, $return))
    ->toBe($str);

    expect($return)
    ->toBeInstanceOf(Num::class);

    expect($return())
    ->toBe($expected);

})
->with([
    ['test', 2, 4],
    [new Str('test'), new Num(2), new Num(4)],
]);

test('substr_replace', function ($replace, $offset, $length) {

    $str = new Str('test test');

    expect($str->substrreplace($replace, $offset, $length))
    ->toBe($str);

    expect($str())
    ->toBe(substr_replace('test test', 'test', 2, 4));

})
->with([
    ['test', 2, 4],
    [new Str('test'), new Num(2), new Num(4)],
]);

test('trim', function ($characters) {

    $str = new Str(' testing ');

    expect($str->trim($characters))
    ->toBe($str);

    expect($str())
    ->toBe(trim(' testing ', ' t'));

})
->with([' t', new Str(' t')]);

test('ucfirst', function () {

    $str = new Str('test');

    expect($str->ucfirst())
    ->toBe($str);

    expect($str())
    ->toBe(ucfirst('test'));

});

test('ucwords', function ($separators) {

    $str = new Str('test test');

    expect($str->ucwords($separators))
    ->toBe($str);

    expect($str())
    ->toBe(ucwords('test test', ' s'));

})
->with([' s', new Str(' s')]);

test('vardump', function () {

    $str = new Str('test');

    expect($str->vardump())
    ->toBe($str);

    $this->expectOutputString("string(4) \"test\"\n");

});

test('vfprintf', function ($values) {

    $str = new Str('%s %u');

    expect($str->vfprintf(fopen('php://output', 'w'), $values))
    ->toBe($str);

    $this->expectOutputString('test 1');

})
->with([
    [['test', 1]],
    [new Arr(['test', 1])],
]);

test('vprintf', function ($values) {

    $str = new Str('%s %u');

    expect($str->vprintf($values))
    ->toBe($str);

    $this->expectOutputString('test 1');

})
->with([
    [['test', 1]],
    [new Arr(['test', 1])],
]);

test('vsprintf', function ($values) {

    $str = new Str('%s %u');

    expect($str->vsprintf($values))
    ->toBe($str);

    expect($str())
    ->toBe(vsprintf('%s %u', ['test', 1]));

})
->with([
    [['test', 1]],
    [new Arr(['test', 1])],
]);

test('wordwrap', function ($width, $break, $cut_long_words) {

    $str = new Str('testing testing');

    expect($str->wordwrap($width, $break, $cut_long_words))
    ->toBe($str);

    expect($str())
    ->toBe(wordwrap('testing testing', 4, ',', $cut_long_words));

})
->with([
    [4, ',', true],
    [new Num(4), new Str(','), false],
]);

test('magic get', function () {

    $str = new Str("te'st");

    expect($str->addslashes)
    ->toBe(addslashes("te'st"));

});

test('magic to string', function () {

    $str = new Str('test');

    expect((string) $str)
    ->toBe('test');

});
