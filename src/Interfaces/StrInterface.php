<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Interfaces;

interface StrInterface
{
    public string $value { get; }

    public function addcslashes(string|StrInterface $characters): static;

    public function addslashes(): static;

    public function bin2hex(): static;

    public function casecmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function chunksplit(
        int|NumInterface $length = 76,
        string|StrInterface $separator = "\r\n"
    ): static;

    public function clone(?StrInterface &$return = null): static;

    public function cmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function coll(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function contains(
        string|StrInterface $needle,
        ?bool &$return = null
    ): bool|static;

    public function convertuudecode(): static;

    public function convertuuencode(): static;

    public function countchars(
        int|NumInterface $mode = 0,
        ?ArrInterface &$return = null
    ): ArrInterface|static;

    public function crc32(?NumInterface &$return = null): NumInterface|static;

    public function crypt(string|StrInterface $salt): static;

    public function cspn(
        string|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function decrement(): static;

    public function echo(): static;

    public function endswith(
        string|StrInterface $needle,
        ?bool &$return = null
    ): bool|static;

    public function explode(
        string|StrInterface $separator,
        int|NumInterface $limit = PHP_INT_MAX,
        ?ArrInterface &$return = null
    ): ArrInterface|static;

    public function fprintf(
        $stream,
        mixed ...$values
    ): static;

    public function getcsv(
        string|StrInterface $separator = ',',
        string|StrInterface $enclosure = '"',
        string|StrInterface $escape = "\\",
        ?ArrInterface &$return = null
    ): ArrInterface|static;

    public function hebrev(int|NumInterface $max_chars_per_line = 0): static;

    public function hex2bin(): static;

    public function htmlentities(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static;

    public function htmlentitydecode(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|StrInterface|null $encoding = null
    ): static;

    public function htmlspecialchars(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static;

    public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static;

    public function increment(): static;

    public function ipos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static;

    public function ireplace(
        string|StrInterface|array|ArrInterface $search,
        string|StrInterface|array|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static;

    public function istr(
        string|StrInterface $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static;

    public function lcfirst(): static;

    public function len(?NumInterface &$return = null): NumInterface|static;

    public function levenshtein(
        string|StrInterface $string2,
        int|NumInterface $insertion_cost = 1,
        int|NumInterface $replacement_cost = 1,
        int|NumInterface $deletion_cost = 1,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function ltrim(string|StrInterface $characters = " \n\r\t\v\x00"): static;

    public function md5(bool $binary = false): static;

    public function md5file(bool $binary = false): static;

    public function metaphone(int|NumInterface $max_phonemes = 0): static;

    public function natcasecmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function natcmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function ncasecmp(
        string|StrInterface $string2,
        int|NumInterface $length,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function ncmp(
        string|StrInterface $string2,
        int|NumInterface $length,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public static function nllanginfo(int $item): StrInterface;

    public function nl2br(bool $use_xhtml = true): static;

    public function ord(?NumInterface &$return = null): NumInterface|static;

    public function pad(
        int|NumInterface $length,
        string|StrInterface $pad_string = ' ',
        int $pad_type = STR_PAD_RIGHT
    ): static;

    public function parsestr(?ArrInterface &$return = null): ArrInterface|static;

    public function pbrk(
        string|StrInterface $characters,
        ?false &$return = null
    ): false|static;

    public function pos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static;

    public function pregfilter(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static;

    public function pregmatch(
        string|StrInterface $pattern,
        ?ArrInterface &$matches,
        int $flags,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static;

    public function pregmatchall(
        string|StrInterface $pattern,
        ?ArrInterface &$matches,
        int $flags,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static;

    public function pregquote(string|StrInterface|null $delimiter = null): static;

    public function pregreplace(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static;

    public function pregreplacecallback(
        string|StrInterface|array|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static;

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): static;

    public function pregsplit(
        string|StrInterface $pattern,
        int|NumInterface $limit = -1,
        int $flags = 0,
        ?ArrInterface &$return = null
    ): ArrInterface|static;

    public function printf(mixed ...$values): static;

    public function printr(?StrInterface &$return = null): static;

    public function quotedprintabledecode(): static;

    public function quotedprintableencode(): static;

    public function quotemeta(): static;

    public function rchr(
        string|StrInterface $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static;

    public static function repeat(
        string $string,
        int|NumInterface $times
    ): StrInterface;

    public function replace(
        string|StrInterface|array|ArrInterface $search,
        string|StrInterface|array|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static;

    public function rev(): static;

    public function ripos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static;

    public function rot13(): static;

    public function rpos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static;

    public function rtrim(string|StrInterface $characters = " \n\r\t\v\x00"): static;

    public function sha1(bool $binary = false): static;

    public function sha1file(bool $binary = false): static;

    public function shuffle(): static;

    public function similartext(
        string|StrInterface $string2,
        ?NumInterface &$percent = null,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function soundex(): static;

    public function split(
        int|NumInterface $length,
        ?ArrInterface &$return = null
    ): ArrInterface|static;

    public function spn(
        string|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function sprintf(mixed ...$values): static;

    public function sscanf(
        string|StrInterface $format,
        ?ArrInterface &$return = null
    ): ArrInterface|static;

    public function startswith(
        string|StrInterface $needle,
        ?bool &$return = null
    ): bool|static;

    public function str(
        string|StrInterface $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static;

    public function stripcslashes(): static;

    public function stripslashes(): static;

    public function striptags(array|ArrInterface|string|StrInterface|null $allowed_tags = null): static;

    public function substr(
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static;

    public function substrcompare(
        string|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        bool $case_insensitive = false,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function substrcount(
        string|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        ?NumInterface &$return = null
    ): NumInterface|static;

    public function substrreplace(
        string|StrInterface $replace,
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static;

    public function tolower(): static;

    public function toupper(): static;

    public function tr(
        string|StrInterface|array|ArrInterface $from,
        string|StrInterface|null $to = null
    ): static;

    public function trim(string|StrInterface $characters = " \n\r\t\v\x00"): static;

    public function ucfirst(): static;

    public function ucwords(string|StrInterface $separators = " \t\r\n\f\v"): static;

    public function vardump(): static;

    public function vfprintf(
        $stream,
        array|ArrInterface $values
    ): static;

    public function vprintf(array|ArrInterface $values): static;

    public function vsprintf(array|ArrInterface $values): static;

    public function wordcount(
        int $format = 0,
        string|StrInterface|null $characters = null,
        ArrInterface|NumInterface|null &$return = null
    ): ArrInterface|NumInterface|static;

    public function wordwrap(
        int|NumInterface $width = 75,
        string|StrInterface $break = "\n",
        bool $cut_long_words = false
    ): static;

    public static function class(): string;

    public static function extend(string|StrInterface $class): void;

    public function pipe(callable $callback): mixed;

    public function through(callable $callback): static;

    public function when(
        mixed $value,
        ?callable $if_true = null,
        ?callable $if_false = null
    ): static;

    public function __get(string $name): mixed;

    public function __toString(): string;
}
