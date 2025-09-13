<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Traits\Extend;
use Stringable;

class Str implements Stringable
{
    use Extend;

    public function __construct(protected string $string = '')
    {
    }

    public function addcslashes(string|self $characters): static
    {

        $this->string = addcslashes($this->string, (string) $characters);

        return $this;

    }

    public function addslashes(): static
    {

        $this->string = addslashes($this->string);

        return $this;

    }

    public function bin2hex(): static
    {

        $this->string = bin2hex($this->string);

        return $this;

    }

    public function casecmp(
        string|self $string2,
        ?Num &$return = null
    ): Num|static {

        $return = num(strcasecmp($this->string, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function chunksplit(
        int|Num $length = 76,
        string|self $separator = "\r\n"
    ): static {

        $this->string = chunk_split(
            $this->string,
            Convert::fromFluentType($length),
            (string) $separator
        );

        return $this;

    }

    public function clone(?self &$return = null): static
    {

        $return = clone $this;

        return \func_num_args() ? $this : $return;

    }

    public function cmp(
        string|self $string2,
        ?Num &$return = null
    ): Num|static {

        $return = num(strcmp($this->string, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function coll(
        string|self $string2,
        ?Num &$return = null
    ): Num|static {

        $return = num(strcoll($this->string, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function contains(
        string|self $needle,
        ?bool &$return = null
    ): bool|static {

        $return = str_contains($this->string, (string) $needle);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function convertuudecode(): static
    {

        $this->string = (string) convert_uudecode($this->string);

        return $this;

    }

    public function convertuuencode(): static
    {

        $this->string = convert_uuencode($this->string);

        return $this;

    }

    public function countchars(
        int|Num $mode = 0,
        ?Arr &$return = null
    ): Arr|static {

        if (\is_array($result = count_chars($this->string, Convert::fromFluentType($mode)))) {

            $return = arr($result);

            return 2 === \func_num_args() ? $this : $return;

        }

        $this->string = $result;

        return $this;

    }

    public function crc32(?Num &$return = null): Num|static
    {

        $return = num(crc32($this->string));

        return \func_num_args() ? $this : $return;

    }

    public function crypt(string|self $salt): static
    {

        $this->string = crypt($this->string, (string) $salt);

        return $this;

    }

    public function cspn(
        string|self $characters,
        int|Num $offset = 0,
        int|Num|null $length = null,
        ?Num &$return = null
    ): Num|static {

        $return = num(strcspn(
            $this->string,
            (string) $characters,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function decrement(): static
    {

        $this->string = str_decrement($this->string);

        return $this;

    }

    public function echo(): static
    {

        echo $this->string;

        return $this;

    }

    public function endswith(
        string|self $needle,
        ?bool &$return = null
    ): bool|static {

        $return = str_ends_with($this->string, (string) $needle);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function explode(
        string|self $separator,
        int|Num $limit = PHP_INT_MAX,
        ?Arr &$return = null
    ): Arr|static {

        $return = arr(explode(
            (string) $separator,
            $this->string,
            Convert::fromFluentType($limit)
        ));

        return 3 === \func_num_args() ? $this : $return;

    }

    public function fprintf(
        $stream,
        mixed ...$values
    ): static {

        fprintf($stream, $this->string, ...Convert::fromFluentType($values));

        return $this;

    }

    public function getcsv(
        string|self $separator = ',',
        string|self $enclosure = '"',
        string|self $escape = "\\",
        ?Arr &$return = null
    ): Arr|static {

        $return = arr(str_getcsv(
            $this->string,
            (string) $separator,
            (string) $enclosure,
            (string) $escape
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function hebrev(int|Num $max_chars_per_line = 0): static
    {

        $this->string = hebrev($this->string, Convert::fromFluentType($max_chars_per_line));

        return $this;

    }

    public function hex2bin(): static
    {

        $this->string = (string) hex2bin($this->string);

        return $this;

    }

    public function htmlentities(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|self|null $encoding = null,
        bool $double_encode = true
    ): static {

        $this->string = htmlentities($this->string, $flags, Convert::fromFluentType($encoding), $double_encode);

        return $this;

    }

    public function htmlentitydecode(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|self|null $encoding = null
    ): static {

        $this->string = html_entity_decode($this->string, $flags, Convert::fromFluentType($encoding));

        return $this;

    }

    public function htmlspecialchars(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|self|null $encoding = null,
        bool $double_encode = true
    ): static {

        $this->string = htmlspecialchars($this->string, $flags, Convert::fromFluentType($encoding), $double_encode);

        return $this;

    }

    public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static
    {

        $this->string = htmlspecialchars_decode($this->string, $flags);

        return $this;

    }

    public function increment(): static
    {

        $this->string = str_increment($this->string);

        return $this;

    }

    public function ipos(
        string|self $needle,
        int|Num $offset = 0,
        Num|false|null &$return = null
    ): Num|false|static {

        $return = stripos($this->string, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function ireplace(
        string|self|array|Arr $search,
        string|self|array|Arr $replace,
        ?Num &$count = null
    ): static {

        $this->string = str_ireplace(
            Convert::fromFluentType($search),
            Convert::fromFluentType($replace),
            $this->string,
            $count
        );

        $count = num($count);

        return $this;

    }

    public function istr(
        string|self $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static {

        $return = stristr($this->string, (string) $needle, $before_needle);

        if (false === $return) {
            return 3 === \func_num_args() ? $this : $return;
        }

        $this->string = $return;

        return $this;

    }

    public function lcfirst(): static
    {

        $this->string = lcfirst($this->string);

        return $this;

    }

    public function len(?Num &$return = null): Num|static
    {

        $return = num(\strlen($this->string));

        return \func_num_args() ? $this : $return;

    }

    public function levenshtein(
        string|self $string2,
        int|Num $insertion_cost = 1,
        int|Num $replacement_cost = 1,
        int|Num $deletion_cost  = 1,
        ?Num &$return = null
    ): Num|static {

        $return = num(levenshtein(
            $this->string,
            (string) $string2,
            Convert::fromFluentType($insertion_cost),
            Convert::fromFluentType($replacement_cost),
            Convert::fromFluentType($deletion_cost)
        ));

        return 5 === \func_num_args() ? $this : $return;

    }

    public function ltrim(string|self $characters = " \n\r\t\v\x00"): static
    {

        $this->string = ltrim($this->string, (string) $characters);

        return $this;

    }

    public function md5(bool $binary = false): static
    {

        $this->string = md5($this->string, $binary);

        return $this;

    }

    public function md5file(bool $binary = false): static
    {

        $this->string = md5_file($this->string, $binary);

        return $this;

    }

    public function metaphone(int|Num $max_phonemes = 0): static
    {

        $this->string = metaphone($this->string, Convert::fromFluentType($max_phonemes));

        return $this;

    }

    public function natcasecmp(
        string|self $string2,
        ?Num &$return = null
    ): Num|static {

        $return = num(strnatcasecmp($this->string, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function natcmp(
        string|self $string2,
        ?Num &$return = null
    ): Num|static {

        $return = num(strnatcmp($this->string, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function ncasecmp(
        string|self $string2,
        int|Num $length,
        ?Num &$return = null
    ): Num|static {

        $return = num(strncasecmp($this->string, (string) $string2, Convert::fromFluentType($length)));

        return 3 === \func_num_args() ? $this : $return;

    }

    public function ncmp(
        string|self $string2,
        int|Num $length,
        ?Num &$return = null
    ): Num|static {

        $return = num(strncmp($this->string, (string) $string2, Convert::fromFluentType($length)));

        return 3 === \func_num_args() ? $this : $return;

    }

    public static function nllanginfo(int $item): self
    {
        return str(nl_langinfo($item));
    }

    public function nl2br(bool $use_xhtml = true): static
    {

        $this->string = nl2br($this->string, $use_xhtml);

        return $this;

    }

    public function ord(?Num &$return = null): Num|static
    {

        $return = num(\ord($this->string));

        return \func_num_args() ? $this : $return;

    }

    public function pad(
        int|Num $length,
        string|self $pad_string = ' ',
        int $pad_type = STR_PAD_RIGHT
    ): static {

        $this->string = str_pad($this->string, Convert::fromFluentType($length), (string) $pad_string, $pad_type);

        return $this;

    }

    public function parsestr(?Arr &$return = null): Arr|static
    {

        parse_str($this->string, $return);

        $return = arr($return);

        return \func_num_args() ? $this : $return;

    }

    public function pbrk(
        string|self $characters,
        ?false &$return = null
    ): false|static {

        $return = strpbrk($this->string, (string) $characters);

        if (false === $return) {
            return 2 === \func_num_args() ? $this : $return;
        }

        $this->string = $return;

        return $this;

    }

    public function pos(
        string|self $needle,
        int|Num $offset = 0,
        Num|false|null &$return = null
    ): Num|false|static {

        $return = strpos($this->string, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function pregfilter(
        string|self|array|Arr $pattern,
        string|self|array|Arr $replacement,
        int|Num $limit = -1,
        ?Num &$count = null
    ): static {

        $this->string = (string) preg_filter(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->string,
            Convert::fromFluentType($limit),
            $count
        );


        $count = num($count);

        return $this;

    }

    public function pregmatch(
        string|self $pattern,
        ?Arr &$matches,
        int $flags,
        int|Num $offset = 0,
        Num|false|null &$return = null
    ): Num|false|static {

        $return = preg_match(
            (string) $pattern,
            $this->string,
            $matches,
            $flags,
            Convert::fromFluentType($offset)
        );

        $matches = arr($matches);

        if (false !== $return) {
            $return = num($return);
        }

        return 5 === \func_num_args() ? $this : $return;

    }

    public function pregmatchall(
        string|self $pattern,
        ?Arr &$matches,
        int $flags,
        int|Num $offset = 0,
        Num|false|null &$return = null
    ): Num|false|static {

        $return = preg_match_all(
            (string) $pattern,
            $this->string,
            $matches,
            $flags,
            Convert::fromFluentType($offset)
        );

        $matches = arr($matches);

        if (false !== $return) {
            $return = num($return);
        }

        return 5 === \func_num_args() ? $this : $return;

    }

    public function pregquote(string|Str|null $delimiter = null): static
    {

        $this->string = preg_quote($this->string, Convert::fromFluentType($delimiter));

        return $this;

    }

    public function pregreplace(
        string|self|array|Arr $pattern,
        string|self|array|Arr $replacement,
        int|Num $limit = -1,
        ?Num &$count = null
    ): static {

        $this->string = (string) preg_replace(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->string,
            Convert::fromFluentType($limit),
            $count
        );


        $count = num($count);

        return $this;

    }

    public function pregreplacecallback(
        string|self|array|Arr $pattern,
        callable $callback,
        int|Num $limit = -1,
        ?Num &$count = null
    ): static {

        $this->string = (string) preg_replace_callback(
            Convert::fromFluentType($pattern),
            $callback,
            $this->string,
            Convert::fromFluentType($limit),
            $count
        );


        $count = num($count);

        return $this;

    }

    public function pregreplacecallbackarray(
        array|Arr $pattern,
        int|Num $limit = -1,
        ?Num &$count = null,
        int $flags = 0
    ): static {

        $this->string = (string) preg_replace_callback_array(
            Convert::fromFluentType($pattern),
            $this->string,
            Convert::fromFluentType($limit),
            $count,
            $flags
        );


        $count = num($count);

        return $this;

    }

    public function pregsplit(
        string|Str $pattern,
        int|Num $limit = -1,
        int $flags = 0,
        ?Arr &$return = null
    ): Arr|static {

        $return = arr((array) preg_split((string) $pattern, $this->string, Convert::fromFluentType($limit), $flags));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function printf(mixed ...$values): static
    {

        printf($this->string, ...Convert::fromFluentType($values));

        return $this;

    }

    public function printr(?self &$return = null): static
    {

        $return = print_r($this->string, 0 !== \func_num_args());

        if (\func_num_args()) {
            $return = str($return);
        }

        return $this;

    }

    public function quotedprintabledecode(): static
    {

        $this->string = quoted_printable_decode($this->string);

        return $this;

    }

    public function quotedprintableencode(): static
    {

        $this->string = quoted_printable_encode($this->string);

        return $this;

    }

    public function quotemeta(): static
    {

        $this->string = quotemeta($this->string);

        return $this;

    }

    public function rchr(
        string|self $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static {

        $args = [(string) $needle, $before_needle];

        $return = strrchr($this->string, ...$args);

        if (false === $return) {
            return 3 === \func_num_args() ? $this : $return;
        }

        $this->string = $return;

        return $this;

    }

    public static function repeat(
        string $string,
        int|Num $times
    ): self {
        return str(str_repeat($string, Convert::fromFluentType($times)));
    }

    public function replace(
        string|self|array|Arr $search,
        string|self|array|Arr $replace,
        ?Num &$count = null
    ): static {

        $this->string = str_replace(
            Convert::fromFluentType($search),
            Convert::fromFluentType($replace),
            $this->string,
            $count
        );

        $count = num($count);

        return $this;

    }

    public function rev(): static
    {

        $this->string = strrev($this->string);

        return $this;

    }

    public function ripos(
        string|self $needle,
        int|Num $offset = 0,
        Num|false|null &$return = null
    ): Num|false|static {

        $return = strripos($this->string, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function rot13(): static
    {

        $this->string = str_rot13($this->string);

        return $this;

    }

    public function rpos(
        string|self $needle,
        int|Num $offset = 0,
        Num|false|null &$return = null
    ): Num|false|static {

        $return = strrpos($this->string, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function rtrim(string|self $characters = " \n\r\t\v\x00"): static
    {

        $this->string = rtrim($this->string, (string) $characters);

        return $this;

    }

    public function sha1(bool $binary = false): static
    {

        $this->string = sha1($this->string, $binary);

        return $this;

    }

    public function sha1file(bool $binary = false): static
    {

        $this->string = sha1_file($this->string, $binary);

        return $this;

    }

    public function shuffle(): static
    {

        $this->string = str_shuffle($this->string);

        return $this;

    }

    public function similartext(
        string|self $string2,
        ?Num &$percent = null,
        ?Num &$return = null
    ): Num|static {

        $return = num(similar_text($this->string, (string) $string2, $percent));

        $percent = num($percent);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function soundex(): static
    {

        $this->string = soundex($this->string);

        return $this;

    }

    public function split(
        int|Num $length,
        ?Arr &$return = null
    ): Arr|static {

        $return = arr(str_split($this->string, Convert::fromFluentType($length)));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function spn(
        string|self $characters,
        int|Num $offset = 0,
        int|Num|null $length = null,
        ?Num &$return = null
    ): Num|static {

        $return = num(strspn(
            $this->string,
            (string) $characters,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function sprintf(mixed ...$values): static
    {

        $this->string = \sprintf($this->string, ...Convert::fromFluentType($values));

        return $this;

    }

    public function sscanf(
        string|self $format,
        ?Arr &$return = null
    ): Arr|static {

        $return = arr(sscanf($this->string, (string) $format));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function startswith(
        string|self $needle,
        ?bool &$return = null
    ): bool|static {

        $return = str_starts_with($this->string, (string) $needle);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function str(
        string|self $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static {

        $return = strstr($this->string, (string) $needle, $before_needle);

        if (false === $return) {
            return 3 === \func_num_args() ? $this : $return;
        }

        $this->string = $return;

        return $this;

    }

    public function stripcslashes(): static
    {

        $this->string = stripcslashes($this->string);

        return $this;

    }

    public function stripslashes(): static
    {

        $this->string = stripslashes($this->string);

        return $this;

    }

    public function striptags(array|Arr|string|self|null $allowed_tags = null): static
    {

        $this->string = strip_tags($this->string, Convert::fromFluentType($allowed_tags));

        return $this;

    }

    public function substr(
        int|Num $offset,
        int|Num|null $length = null
    ): static {

        $this->string = substr($this->string, Convert::fromFluentType($offset), Convert::fromFluentType($length));

        return $this;

    }

    public function substrcompare(
        string|self $needle,
        int|Num $offset,
        int|Num|null $length = null,
        bool $case_insensitive = false,
        ?Num &$return = null
    ): Num|static {

        $return = num(substr_compare(
            $this->string,
            (string) $needle,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length),
            $case_insensitive
        ));

        return 5 === \func_num_args() ? $this : $return;

    }

    public function substrcount(
        string|self $needle,
        int|Num $offset,
        int|Num|null $length = null,
        ?Num &$return = null
    ): Num|static {

        $return = num(substr_count(
            $this->string,
            (string) $needle,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function substrreplace(
        string|self $replace,
        int|Num $offset,
        int|Num|null $length = null
    ): static {

        $this->string = substr_replace(
            $this->string,
            (string) $replace,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        );

        return $this;

    }

    public function tolower(): static
    {

        $this->string = strtolower($this->string);

        return $this;

    }

    public function toupper(): static
    {

        $this->string = strtoupper($this->string);

        return $this;

    }

    public function tr(
        string|self|array|Arr $from,
        string|self|null $to = null
    ): static {

        $this->string = strtr($this->string, ...Convert::fromFluentType(\func_get_args()));

        return $this;

    }

    public function trim(string|self $characters = " \n\r\t\v\x00"): static
    {

        $this->string = trim($this->string, (string) $characters);

        return $this;

    }

    public function ucfirst(): static
    {

        $this->string = ucfirst($this->string);

        return $this;

    }

    public function ucwords(string|self $separators = " \t\r\n\f\v"): static
    {

        $this->string = ucwords($this->string, (string) $separators);

        return $this;

    }

    public function vardump(): static
    {

        var_dump($this->string);

        return $this;

    }

    public function vfprintf(
        $stream,
        array|Arr $values
    ): static {

        vfprintf($stream, $this->string, Convert::fromFluentType($values));

        return $this;

    }

    public function vprintf(array|Arr $values): static
    {

        vprintf($this->string, Convert::fromFluentType($values));

        return $this;

    }

    public function vsprintf(array|Arr $values): static
    {

        $this->string = vsprintf($this->string, Convert::fromFluentType($values));

        return $this;

    }

    public function wordcount(
        int $format = 0,
        string|self|null $characters = null,
        Arr|Num|null &$return = null
    ): Arr|Num|static {

        $return = str_word_count($this->string, $format, Convert::fromFluentType($characters));

        $return = $format ? arr($return) : num($return);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function wordwrap(
        int|Num $width = 75,
        string|self $break = "\n",
        bool $cut_long_words = false
    ): static {

        $this->string = wordwrap($this->string, Convert::fromFluentType($width), (string) $break, $cut_long_words);

        return $this;

    }

    final public function __get(string $name): mixed
    {
        return $this->$name()();
    }

    final public function __invoke(): string
    {
        return $this->string;
    }

    final public function __toString(): string
    {
        return $this->string;
    }
}
