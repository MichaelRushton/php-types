<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Interfaces;

use Stringable;

interface StrInterface
{
    public string $value { get; }

    public function addcslashes(string|Stringable|StrInterface $characters): static;

    public function addslashes(): static;

    public function bin2hex(): static;

    public function casecmp(string|Stringable|StrInterface $string2): NumInterface;

    public function chunksplit(
        int|NumInterface $length = 76,
        string|Stringable|StrInterface $separator = "\r\n"
    ): static;

    public function cmp(string|Stringable|StrInterface $string2): NumInterface;

    public function coll(string|Stringable|StrInterface $string2): NumInterface;

    public function contains(string|Stringable|StrInterface $needle): bool;

    public function convertuudecode(): static|false;

    public function convertuuencode(): static;

    public function countchars(int|NumInterface $mode = 0): static|ArrInterface;

    public function crc32(): NumInterface;

    public function crypt(string|Stringable|StrInterface $salt): static;

    public function cspn(
        string|Stringable|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null
    ): NumInterface;

    public function decrement(): static;

    public function endswith(string|Stringable|StrInterface $needle): bool;

    public function explode(
        string|Stringable|StrInterface $separator,
        int|NumInterface $limit = PHP_INT_MAX
    ): ArrInterface;

    public function getcsv(
        string|Stringable|StrInterface $separator = ',',
        string|Stringable|StrInterface $enclosure = '"',
        string|Stringable|StrInterface $escape = "\\"
    ): ArrInterface;

    public function hebrev(int|NumInterface $max_chars_per_line = 0): static;

    public function hex2bin(): static|false;

    public function htmlentities(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|Stringable|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static;

    public function htmlentitydecode(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|Stringable|StrInterface|null $encoding = null
    ): static;

    public function htmlspecialchars(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|Stringable|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static;

    public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static;

    public function increment(): static;

    public function ipos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false;

    public function ireplace(
        string|array|Stringable|StrInterface|ArrInterface $search,
        string|array|Stringable|StrInterface|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static;

    public function istr(
        string|Stringable|StrInterface $needle,
        bool $before_needle = false
    ): static|false;

    public function jsonencode(int|NumInterface $flags = 0): static|false;

    public function jsonvalidate(
        int|NumInterface $depth = 512,
        int|NumInterface $flags = 0
    ): bool;

    public function lcfirst(): static;

    public function len(): NumInterface;

    public function levenshtein(
        string|Stringable|StrInterface $string2,
        int|NumInterface $insertion_cost = 1,
        int|NumInterface $replacement_cost = 1,
        int|NumInterface $deletion_cost = 1
    ): NumInterface;

    public function ltrim(string|Stringable|StrInterface $characters = " \n\r\t\v\x00"): static;

    public function md5(bool $binary = false): static;

    public function md5file(bool $binary = false): static;

    public function metaphone(int|NumInterface $max_phonemes = 0): static;

    public function natcasecmp(string|Stringable|StrInterface $string2): NumInterface;

    public function natcmp(string|Stringable|StrInterface $string2): NumInterface;

    public function ncasecmp(
        string|Stringable|StrInterface $string2,
        int|NumInterface $length
    ): NumInterface;

    public function ncmp(
        string|Stringable|StrInterface $string2,
        int|NumInterface $length
    ): NumInterface;

    public static function nllanginfo(int $item): static|false;

    public function nl2br(bool $use_xhtml = true): static;

    public function ord(): NumInterface;

    public function pad(
        int|NumInterface $length,
        string|Stringable|StrInterface $pad_string = ' ',
        int $pad_type = STR_PAD_RIGHT
    ): static;

    public function parsestr(): ArrInterface;

    public function pbrk(string|Stringable|StrInterface $characters): static|false;

    public function pos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false;

    public function pregfilter(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static;

    public function pregmatch(
        string|Stringable|StrInterface $pattern,
        ?ArrInterface &$matches = null,
        int $flags = 0,
        int|NumInterface $offset = 0
    ): NumInterface|false;

    public function pregmatchall(
        string|Stringable|StrInterface $pattern,
        ?ArrInterface &$matches = null,
        int $flags = 0,
        int|NumInterface $offset = 0
    ): NumInterface|false;

    public function pregquote(string|Stringable|StrInterface|null $delimiter = null): static;

    public function pregreplace(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static;

    public function pregreplacecallback(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static;

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): ?static;

    public function pregsplit(
        string|Stringable|StrInterface $pattern,
        int|NumInterface $limit = -1,
        int $flags = 0
    ): ArrInterface|false;

    public function quotedprintabledecode(): static;

    public function quotedprintableencode(): static;

    public function quotemeta(): static;

    public function rchr(
        string|Stringable|StrInterface $needle,
        bool $before_needle = false
    ): static|false;

    public static function repeat(
        string $string,
        int|NumInterface $times
    ): static;

    public function replace(
        string|array|Stringable|StrInterface|ArrInterface $search,
        string|array|Stringable|StrInterface|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static;

    public function rev(): static;

    public function ripos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false;

    public function rot13(): static;

    public function rpos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false;

    public function rtrim(string|Stringable|StrInterface $characters = " \n\r\t\v\x00"): static;

    public function serialize(): static;

    public function sha1(bool $binary = false): static;

    public function sha1file(bool $binary = false): static|false;

    public function shuffle(): static;

    public function similartext(
        string|Stringable|StrInterface $string2,
        ?NumInterface &$percent = null
    ): NumInterface;

    public function soundex(): static;

    public function split(int|NumInterface $length): ArrInterface;

    public function spn(
        string|Stringable|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null
    ): NumInterface;

    public function sprintf(mixed ...$values): static;

    public function sscanf(string|Stringable|StrInterface $format): ArrInterface;

    public function startswith(string|Stringable|StrInterface $needle): bool;

    public function str(
        string|Stringable|StrInterface $needle,
        bool $before_needle = false
    ): static|false;

    public function stripcslashes(): static;

    public function stripslashes(): static;

    public function striptags(array|string|Stringable|ArrInterface|StrInterface|null $allowed_tags = null): static;

    public function substr(
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static;

    public function substrcompare(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        bool $case_insensitive = false
    ): NumInterface;

    public function substrcount(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): NumInterface;

    public function substrreplace(
        string|Stringable|StrInterface $replace,
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static;

    public function tolower(): static;

    public function toupper(): static;

    public function tr(
        string|array|Stringable|StrInterface|ArrInterface $from,
        string|Stringable|StrInterface|null $to = null
    ): static;

    public function trim(string|Stringable|StrInterface $characters = " \n\r\t\v\x00"): static;

    public function ucfirst(): static;

    public function ucwords(string|Stringable|StrInterface $separators = " \t\r\n\f\v"): static;

    public function unserialize(array|ArrInterface $options = []): mixed;

    public function vsprintf(array|ArrInterface $values): static;

    public function wordcount(
        int $format = 0,
        string|Stringable|StrInterface|null $characters = null
    ): ArrInterface|NumInterface;

    public function wordwrap(
        int|NumInterface $width = 75,
        string|Stringable|StrInterface $break = "\n",
        bool $cut_long_words = false
    ): static;

    public function pipe(callable $callback): mixed;

    public function through(callable $callback): static;

    public function __get(string $name): mixed;

    public function __toString(): string;
}
