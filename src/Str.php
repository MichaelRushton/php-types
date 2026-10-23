<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Traits\Extend;
use MichaelRushton\Types\Traits\Pipe;
use MichaelRushton\Types\Traits\Through;
use MichaelRushton\Types\Traits\When;
use Stringable;

class Str implements StrInterface, Stringable
{
    use Extend;
    use Pipe;
    use Through;
    use When;

    public function __construct(
        public protected(set) string $value = ''
    ) {}

    public function addcslashes(string|StrInterface $characters): static
    {

        $this->value = addcslashes($this->value, (string) $characters);

        return $this;

    }

    public function addslashes(): static
    {

        $this->value = addslashes($this->value);

        return $this;

    }

    public function bin2hex(): static
    {

        $this->value = bin2hex($this->value);

        return $this;

    }

    public function casecmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strcasecmp($this->value, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function chunksplit(
        int|NumInterface $length = 76,
        string|StrInterface $separator = "\r\n"
    ): static {

        $this->value = chunk_split(
            $this->value,
            Convert::fromFluentType($length),
            (string) $separator
        );

        return $this;

    }

    public function clone(?StrInterface &$return = null): static
    {

        $return = clone $this;

        return \func_num_args() ? $this : $return;

    }

    public function cmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strcmp($this->value, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function coll(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strcoll($this->value, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function contains(
        string|StrInterface $needle,
        ?bool &$return = null
    ): bool|static {

        $return = str_contains($this->value, (string) $needle);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function convertuudecode(): static
    {

        $this->value = (string) convert_uudecode($this->value);

        return $this;

    }

    public function convertuuencode(): static
    {

        $this->value = convert_uuencode($this->value);

        return $this;

    }

    public function countchars(
        int|NumInterface $mode = 0,
        ?ArrInterface &$return = null
    ): ArrInterface|static {

        if (\is_array($result = count_chars($this->value, Convert::fromFluentType($mode)))) {

            $return = arr($result);

            return 2 === \func_num_args() ? $this : $return;

        }

        $this->value = $result;

        return $this;

    }

    public function crc32(?NumInterface &$return = null): NumInterface|static
    {

        $return = num(crc32($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function crypt(string|StrInterface $salt): static
    {

        $this->value = crypt($this->value, (string) $salt);

        return $this;

    }

    public function cspn(
        string|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strcspn(
            $this->value,
            (string) $characters,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function decrement(): static
    {

        $this->value = str_decrement($this->value);

        return $this;

    }

    public function echo(): static
    {

        echo $this->value;

        return $this;

    }

    public function endswith(
        string|StrInterface $needle,
        ?bool &$return = null
    ): bool|static {

        $return = str_ends_with($this->value, (string) $needle);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function explode(
        string|StrInterface $separator,
        int|NumInterface $limit = PHP_INT_MAX,
        ?ArrInterface &$return = null
    ): ArrInterface|static {

        $return = arr(explode(
            (string) $separator,
            $this->value,
            Convert::fromFluentType($limit)
        ));

        return 3 === \func_num_args() ? $this : $return;

    }

    public function fprintf(
        $stream,
        mixed ...$values
    ): static {

        fprintf($stream, $this->value, ...Convert::fromFluentType($values));

        return $this;

    }

    public function getcsv(
        string|StrInterface $separator = ',',
        string|StrInterface $enclosure = '"',
        string|StrInterface $escape = "\\",
        ?ArrInterface &$return = null
    ): ArrInterface|static {

        $return = arr(str_getcsv(
            $this->value,
            (string) $separator,
            (string) $enclosure,
            (string) $escape
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function hebrev(int|NumInterface $max_chars_per_line = 0): static
    {

        $this->value = hebrev($this->value, Convert::fromFluentType($max_chars_per_line));

        return $this;

    }

    public function hex2bin(): static
    {

        $this->value = (string) hex2bin($this->value);

        return $this;

    }

    public function htmlentities(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static {

        $this->value = htmlentities($this->value, $flags, Convert::fromFluentType($encoding), $double_encode);

        return $this;

    }

    public function htmlentitydecode(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|StrInterface|null $encoding = null
    ): static {

        $this->value = html_entity_decode($this->value, $flags, Convert::fromFluentType($encoding));

        return $this;

    }

    public function htmlspecialchars(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static {

        $this->value = htmlspecialchars($this->value, $flags, Convert::fromFluentType($encoding), $double_encode);

        return $this;

    }

    public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static
    {

        $this->value = htmlspecialchars_decode($this->value, $flags);

        return $this;

    }

    public function increment(): static
    {

        $this->value = str_increment($this->value);

        return $this;

    }

    public function ipos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static {

        $return = stripos($this->value, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function ireplace(
        string|StrInterface|array|ArrInterface $search,
        string|StrInterface|array|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static {

        $this->value = str_ireplace(
            Convert::fromFluentType($search),
            Convert::fromFluentType($replace),
            $this->value,
            $count
        );

        $count = num($count);

        return $this;

    }

    public function istr(
        string|StrInterface $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static {

        $return = stristr($this->value, (string) $needle, $before_needle);

        if (false === $return) {
            return 3 === \func_num_args() ? $this : $return;
        }

        $this->value = $return;

        return $this;

    }

    public function lcfirst(): static
    {

        $this->value = lcfirst($this->value);

        return $this;

    }

    public function len(?NumInterface &$return = null): NumInterface|static
    {

        $return = num(\strlen($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function levenshtein(
        string|StrInterface $string2,
        int|NumInterface $insertion_cost = 1,
        int|NumInterface $replacement_cost = 1,
        int|NumInterface $deletion_cost = 1,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(levenshtein(
            $this->value,
            (string) $string2,
            Convert::fromFluentType($insertion_cost),
            Convert::fromFluentType($replacement_cost),
            Convert::fromFluentType($deletion_cost)
        ));

        return 5 === \func_num_args() ? $this : $return;

    }

    public function ltrim(string|StrInterface $characters = " \n\r\t\v\x00"): static
    {

        $this->value = ltrim($this->value, (string) $characters);

        return $this;

    }

    public function md5(bool $binary = false): static
    {

        $this->value = md5($this->value, $binary);

        return $this;

    }

    public function md5file(bool $binary = false): static
    {

        $this->value = md5_file($this->value, $binary);

        return $this;

    }

    public function metaphone(int|NumInterface $max_phonemes = 0): static
    {

        $this->value = metaphone($this->value, Convert::fromFluentType($max_phonemes));

        return $this;

    }

    public function natcasecmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strnatcasecmp($this->value, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function natcmp(
        string|StrInterface $string2,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strnatcmp($this->value, (string) $string2));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function ncasecmp(
        string|StrInterface $string2,
        int|NumInterface $length,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strncasecmp($this->value, (string) $string2, Convert::fromFluentType($length)));

        return 3 === \func_num_args() ? $this : $return;

    }

    public function ncmp(
        string|StrInterface $string2,
        int|NumInterface $length,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strncmp($this->value, (string) $string2, Convert::fromFluentType($length)));

        return 3 === \func_num_args() ? $this : $return;

    }

    public static function nllanginfo(int $item): StrInterface
    {
        return str(nl_langinfo($item));
    }

    public function nl2br(bool $use_xhtml = true): static
    {

        $this->value = nl2br($this->value, $use_xhtml);

        return $this;

    }

    public function ord(?NumInterface &$return = null): NumInterface|static
    {

        $return = num(\ord($this->value));

        return \func_num_args() ? $this : $return;

    }

    public function pad(
        int|NumInterface $length,
        string|StrInterface $pad_string = ' ',
        int $pad_type = STR_PAD_RIGHT
    ): static {

        $this->value = str_pad($this->value, Convert::fromFluentType($length), (string) $pad_string, $pad_type);

        return $this;

    }

    public function parsestr(?ArrInterface &$return = null): ArrInterface|static
    {

        parse_str($this->value, $return);

        $return = arr($return);

        return \func_num_args() ? $this : $return;

    }

    public function pbrk(
        string|StrInterface $characters,
        ?false &$return = null
    ): false|static {

        $return = strpbrk($this->value, (string) $characters);

        if (false === $return) {
            return 2 === \func_num_args() ? $this : $return;
        }

        $this->value = $return;

        return $this;

    }

    public function pos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static {

        $return = strpos($this->value, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function pregfilter(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static {

        $this->value = (string) preg_filter(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->value,
            Convert::fromFluentType($limit),
            $count
        );

        $count = num($count);

        return $this;

    }

    public function pregmatch(
        string|StrInterface $pattern,
        ?ArrInterface &$matches,
        int $flags,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static {

        $return = preg_match(
            (string) $pattern,
            $this->value,
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
        string|StrInterface $pattern,
        ?ArrInterface &$matches,
        int $flags,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static {

        $return = preg_match_all(
            (string) $pattern,
            $this->value,
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

    public function pregquote(string|StrInterface|null $delimiter = null): static
    {

        $this->value = preg_quote($this->value, Convert::fromFluentType($delimiter));

        return $this;

    }

    public function pregreplace(
        string|StrInterface|array|ArrInterface $pattern,
        string|StrInterface|array|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static {

        $this->value = (string) preg_replace(
            Convert::fromFluentType($pattern),
            Convert::fromFluentType($replacement),
            $this->value,
            Convert::fromFluentType($limit),
            $count
        );

        $count = num($count);

        return $this;

    }

    public function pregreplacecallback(
        string|StrInterface|array|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): static {

        $this->value = (string) preg_replace_callback(
            Convert::fromFluentType($pattern),
            $callback,
            $this->value,
            Convert::fromFluentType($limit),
            $count
        );

        $count = num($count);

        return $this;

    }

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): static {

        $this->value = (string) preg_replace_callback_array(
            Convert::fromFluentType($pattern),
            $this->value,
            Convert::fromFluentType($limit),
            $count,
            $flags
        );

        $count = num($count);

        return $this;

    }

    public function pregsplit(
        string|StrInterface $pattern,
        int|NumInterface $limit = -1,
        int $flags = 0,
        ?ArrInterface &$return = null
    ): ArrInterface|static {

        $return = arr((array) preg_split((string) $pattern, $this->value, Convert::fromFluentType($limit), $flags));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function printf(mixed ...$values): static
    {

        printf($this->value, ...Convert::fromFluentType($values));

        return $this;

    }

    public function printr(?StrInterface &$return = null): static
    {

        $return = print_r($this->value, 0 !== \func_num_args());

        if (\func_num_args()) {
            $return = str($return);
        }

        return $this;

    }

    public function quotedprintabledecode(): static
    {

        $this->value = quoted_printable_decode($this->value);

        return $this;

    }

    public function quotedprintableencode(): static
    {

        $this->value = quoted_printable_encode($this->value);

        return $this;

    }

    public function quotemeta(): static
    {

        $this->value = quotemeta($this->value);

        return $this;

    }

    public function rchr(
        string|StrInterface $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static {

        $args = [(string) $needle, $before_needle];

        $return = strrchr($this->value, ...$args);

        if (false === $return) {
            return 3 === \func_num_args() ? $this : $return;
        }

        $this->value = $return;

        return $this;

    }

    public static function repeat(
        string $string,
        int|NumInterface $times
    ): StrInterface {
        return str(str_repeat($string, Convert::fromFluentType($times)));
    }

    public function replace(
        string|StrInterface|array|ArrInterface $search,
        string|StrInterface|array|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static {

        $this->value = str_replace(
            Convert::fromFluentType($search),
            Convert::fromFluentType($replace),
            $this->value,
            $count
        );

        $count = num($count);

        return $this;

    }

    public function rev(): static
    {

        $this->value = strrev($this->value);

        return $this;

    }

    public function ripos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static {

        $return = strripos($this->value, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function rot13(): static
    {

        $this->value = str_rot13($this->value);

        return $this;

    }

    public function rpos(
        string|StrInterface $needle,
        int|NumInterface $offset = 0,
        NumInterface|false|null &$return = null
    ): NumInterface|false|static {

        $return = strrpos($this->value, (string) $needle, Convert::fromFluentType($offset));

        if (false !== $return) {
            $return = num($return);
        }

        return 3 === \func_num_args() ? $this : $return;

    }

    public function rtrim(string|StrInterface $characters = " \n\r\t\v\x00"): static
    {

        $this->value = rtrim($this->value, (string) $characters);

        return $this;

    }

    public function sha1(bool $binary = false): static
    {

        $this->value = sha1($this->value, $binary);

        return $this;

    }

    public function sha1file(bool $binary = false): static
    {

        $this->value = sha1_file($this->value, $binary);

        return $this;

    }

    public function shuffle(): static
    {

        $this->value = str_shuffle($this->value);

        return $this;

    }

    public function similartext(
        string|StrInterface $string2,
        ?NumInterface &$percent = null,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(similar_text($this->value, (string) $string2, $percent));

        $percent = num($percent);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function soundex(): static
    {

        $this->value = soundex($this->value);

        return $this;

    }

    public function split(
        int|NumInterface $length,
        ?ArrInterface &$return = null
    ): ArrInterface|static {

        $return = arr(str_split($this->value, Convert::fromFluentType($length)));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function spn(
        string|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(strspn(
            $this->value,
            (string) $characters,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function sprintf(mixed ...$values): static
    {

        $this->value = \sprintf($this->value, ...Convert::fromFluentType($values));

        return $this;

    }

    public function sscanf(
        string|StrInterface $format,
        ?ArrInterface &$return = null
    ): ArrInterface|static {

        $return = arr(sscanf($this->value, (string) $format));

        return 2 === \func_num_args() ? $this : $return;

    }

    public function startswith(
        string|StrInterface $needle,
        ?bool &$return = null
    ): bool|static {

        $return = str_starts_with($this->value, (string) $needle);

        return 2 === \func_num_args() ? $this : $return;

    }

    public function str(
        string|StrInterface $needle,
        bool $before_needle = false,
        ?false &$return = null
    ): false|static {

        $return = strstr($this->value, (string) $needle, $before_needle);

        if (false === $return) {
            return 3 === \func_num_args() ? $this : $return;
        }

        $this->value = $return;

        return $this;

    }

    public function stripcslashes(): static
    {

        $this->value = stripcslashes($this->value);

        return $this;

    }

    public function stripslashes(): static
    {

        $this->value = stripslashes($this->value);

        return $this;

    }

    public function striptags(array|ArrInterface|string|StrInterface|null $allowed_tags = null): static
    {

        $this->value = strip_tags($this->value, Convert::fromFluentType($allowed_tags));

        return $this;

    }

    public function substr(
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static {

        $this->value = substr($this->value, Convert::fromFluentType($offset), Convert::fromFluentType($length));

        return $this;

    }

    public function substrcompare(
        string|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        bool $case_insensitive = false,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(substr_compare(
            $this->value,
            (string) $needle,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length),
            $case_insensitive
        ));

        return 5 === \func_num_args() ? $this : $return;

    }

    public function substrcount(
        string|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        ?NumInterface &$return = null
    ): NumInterface|static {

        $return = num(substr_count(
            $this->value,
            (string) $needle,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        ));

        return 4 === \func_num_args() ? $this : $return;

    }

    public function substrreplace(
        string|StrInterface $replace,
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static {

        $this->value = substr_replace(
            $this->value,
            (string) $replace,
            Convert::fromFluentType($offset),
            Convert::fromFluentType($length)
        );

        return $this;

    }

    public function tolower(): static
    {

        $this->value = strtolower($this->value);

        return $this;

    }

    public function toupper(): static
    {

        $this->value = strtoupper($this->value);

        return $this;

    }

    public function tr(
        string|StrInterface|array|ArrInterface $from,
        string|StrInterface|null $to = null
    ): static {

        $this->value = strtr($this->value, ...Convert::fromFluentType(\func_get_args()));

        return $this;

    }

    public function trim(string|StrInterface $characters = " \n\r\t\v\x00"): static
    {

        $this->value = trim($this->value, (string) $characters);

        return $this;

    }

    public function ucfirst(): static
    {

        $this->value = ucfirst($this->value);

        return $this;

    }

    public function ucwords(string|StrInterface $separators = " \t\r\n\f\v"): static
    {

        $this->value = ucwords($this->value, (string) $separators);

        return $this;

    }

    public function vardump(): static
    {

        var_dump($this->value);

        return $this;

    }

    public function vfprintf(
        $stream,
        array|ArrInterface $values
    ): static {

        vfprintf($stream, $this->value, Convert::fromFluentType($values));

        return $this;

    }

    public function vprintf(array|ArrInterface $values): static
    {

        vprintf($this->value, Convert::fromFluentType($values));

        return $this;

    }

    public function vsprintf(array|ArrInterface $values): static
    {

        $this->value = vsprintf($this->value, Convert::fromFluentType($values));

        return $this;

    }

    public function wordcount(
        int $format = 0,
        string|StrInterface|null $characters = null,
        ArrInterface|NumInterface|null &$return = null
    ): ArrInterface|NumInterface|static {

        $return = str_word_count($this->value, $format, Convert::fromFluentType($characters));

        $return = $format ? arr($return) : num($return);

        return 3 === \func_num_args() ? $this : $return;

    }

    public function wordwrap(
        int|NumInterface $width = 75,
        string|StrInterface $break = "\n",
        bool $cut_long_words = false
    ): static {

        $this->value = wordwrap($this->value, Convert::fromFluentType($width), (string) $break, $cut_long_words);

        return $this;

    }

    public function __get(string $name): mixed
    {
        return $this->$name()->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
