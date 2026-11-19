<?php

declare(strict_types=1);

namespace MichaelRushton\Types;

use MichaelRushton\Types\Interfaces\ArrInterface;
use MichaelRushton\Types\Interfaces\NumInterface;
use MichaelRushton\Types\Interfaces\StrInterface;
use MichaelRushton\Types\Traits\Convert;
use MichaelRushton\Types\Traits\Pipe;
use MichaelRushton\Types\Traits\Through;
use Stringable;

class Str implements StrInterface, Stringable
{
    use Convert;
    use Pipe;
    use Through;

    public const string ARR_CLASS = Arr::class;
    public const string NUM_CLASS = Num::class;

    public protected(set) string $value;

    public function __construct(string|Stringable|StrInterface $value)
    {
        $this->value = (string) $value;
    }

    public function addcslashes(string|Stringable|StrInterface $characters): static
    {
        return new static(addcslashes($this->value, (string) $characters));
    }

    public function addslashes(): static
    {
        return new static(addslashes($this->value));
    }

    public function bin2hex(): static
    {
        return new static(bin2hex($this->value));
    }

    public function casecmp(string|Stringable|StrInterface $string2): NumInterface
    {
        return new (static::NUM_CLASS)(strcasecmp($this->value, (string) $string2));
    }

    public function chunksplit(
        int|NumInterface $length = 76,
        string|Stringable|StrInterface $separator = "\r\n"
    ): static {
        return new static(chunk_split($this->value, static::convert($length), (string) $separator));
    }

    public function cmp(string|Stringable|StrInterface $string2): NumInterface
    {
        return new (static::NUM_CLASS)(strcmp($this->value, (string) $string2));
    }

    public function coll(string|Stringable|StrInterface $string2): NumInterface
    {
        return new (static::NUM_CLASS)(strcoll($this->value, (string) $string2));
    }

    public function contains(string|Stringable|StrInterface $needle): bool
    {
        return str_contains($this->value, (string) $needle);
    }

    public function convertuudecode(): static|false
    {

        $return = convert_uudecode($this->value);

        return false === $return ? $return : new static($return);

    }

    public function convertuuencode(): static
    {
        return new static(convert_uuencode($this->value));
    }

    public function countchars(int|NumInterface $mode = 0): static|ArrInterface
    {

        if (\is_array($result = count_chars($this->value, static::convert($mode)))) {
            return new (static::ARR_CLASS)($result);
        }

        return new static($result);

    }

    public function crc32(): NumInterface
    {
        return new (static::NUM_CLASS)(crc32($this->value));
    }

    public function crypt(string|Stringable|StrInterface $salt): static
    {
        return new static(crypt($this->value, (string) $salt));
    }

    public function cspn(
        string|Stringable|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null
    ): NumInterface {

        return new (static::NUM_CLASS)(strcspn(
            $this->value,
            (string) $characters,
            static::convert($offset),
            static::convert($length)
        ));

    }

    public function decrement(): static
    {
        return new static(str_decrement($this->value));
    }

    public function endswith(string|Stringable|StrInterface $needle): bool
    {
        return str_ends_with($this->value, (string) $needle);
    }

    public function explode(
        string|Stringable|StrInterface $separator,
        int|NumInterface $limit = PHP_INT_MAX
    ): ArrInterface {
        return new (static::ARR_CLASS)(explode((string) $separator, $this->value, static::convert($limit)));
    }

    public function getcsv(
        string|Stringable|StrInterface $separator = ',',
        string|Stringable|StrInterface $enclosure = '"',
        string|Stringable|StrInterface $escape = "\\"
    ): ArrInterface {

        return new (static::ARR_CLASS)(str_getcsv(
            $this->value,
            (string) $separator,
            (string) $enclosure,
            (string) $escape
        ));

    }

    public function hebrev(int|NumInterface $max_chars_per_line = 0): static
    {
        return new static(hebrev($this->value, static::convert($max_chars_per_line)));
    }

    public function hex2bin(): static|false
    {

        $return = hex2bin($this->value);

        return false === $return ? $return : new static($return);

    }

    public function htmlentities(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|Stringable|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static {
        return new static(htmlentities($this->value, $flags, static::convert($encoding), $double_encode));
    }

    public function htmlentitydecode(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|Stringable|StrInterface|null $encoding = null
    ): static {
        return new static(html_entity_decode($this->value, $flags, static::convert($encoding)));
    }

    public function htmlspecialchars(
        int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
        string|Stringable|StrInterface|null $encoding = null,
        bool $double_encode = true
    ): static {
        return new static(htmlspecialchars($this->value, $flags, static::convert($encoding), $double_encode));
    }

    public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static
    {
        return new static(htmlspecialchars_decode($this->value, $flags));
    }

    public function increment(): static
    {
        return new static(str_increment($this->value));
    }

    public function ipos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false {

        $return = stripos($this->value, (string) $needle, static::convert($offset));

        return false === $return ? $return : new (static::NUM_CLASS)($return);

    }

    public function ireplace(
        string|array|Stringable|StrInterface|ArrInterface $search,
        string|array|Stringable|StrInterface|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static {

        $return = new static(str_ireplace(
            static::convert($search),
            static::convert($replace),
            $this->value,
            $count
        ));

        $count = new (static::NUM_CLASS)($count);

        return $return;

    }

    public function istr(
        string|Stringable|StrInterface $needle,
        bool $before_needle = false
    ): static|false {

        $return = stristr($this->value, (string) $needle, $before_needle);

        return false === $return ? $return : new static($return);

    }

    public function jsonencode(int|NumInterface $flags = 0): static|false
    {

        $return = json_encode($this->value, $flags);

        return false === $return ? $return : new static($return);

    }

    public function jsonvalidate(
        int|NumInterface $depth = 512,
        int|NumInterface $flags = 0
    ): bool {
        return json_validate($this->value, $depth, $flags);
    }

    public function lcfirst(): static
    {
        return new static(lcfirst($this->value));
    }

    public function len(): NumInterface
    {
        return new (static::NUM_CLASS)(\strlen($this->value));
    }

    public function levenshtein(
        string|Stringable|StrInterface $string2,
        int|NumInterface $insertion_cost = 1,
        int|NumInterface $replacement_cost = 1,
        int|NumInterface $deletion_cost = 1
    ): NumInterface {

        return new (static::NUM_CLASS)(levenshtein(
            $this->value,
            (string) $string2,
            static::convert($insertion_cost),
            static::convert($replacement_cost),
            static::convert($deletion_cost)
        ));

    }

    public function ltrim(string|Stringable|StrInterface $characters = " \n\r\t\v\x00"): static
    {
        return new static(ltrim($this->value, (string) $characters));
    }

    public function md5(bool $binary = false): static
    {
        return new static(md5($this->value, $binary));
    }

    public function md5file(bool $binary = false): static
    {
        return new static(md5_file($this->value, $binary));
    }

    public function metaphone(int|NumInterface $max_phonemes = 0): static
    {
        return new static(metaphone($this->value, static::convert($max_phonemes)));
    }

    public function natcasecmp(string|Stringable|StrInterface $string2): NumInterface
    {
        return new (static::NUM_CLASS)(strnatcasecmp($this->value, (string) $string2));
    }

    public function natcmp(string|Stringable|StrInterface $string2): NumInterface
    {
        return new (static::NUM_CLASS)(strnatcmp($this->value, (string) $string2));
    }

    public function ncasecmp(
        string|Stringable|StrInterface $string2,
        int|NumInterface $length
    ): NumInterface {
        return new (static::NUM_CLASS)(strncasecmp($this->value, (string) $string2, static::convert($length)));
    }

    public function ncmp(
        string|Stringable|StrInterface $string2,
        int|NumInterface $length
    ): NumInterface {
        return new (static::NUM_CLASS)(strncmp($this->value, (string) $string2, static::convert($length)));
    }

    public static function nllanginfo(int $item): static|false
    {

        $return = nl_langinfo($item);

        return false === $return ? $return : new static($return);

    }

    public function nl2br(bool $use_xhtml = true): static
    {
        return new static(nl2br($this->value, $use_xhtml));
    }

    public function ord(): NumInterface
    {
        return new (static::NUM_CLASS)(\ord($this->value));
    }

    public function pad(
        int|NumInterface $length,
        string|Stringable|StrInterface $pad_string = ' ',
        int $pad_type = STR_PAD_RIGHT
    ): static {
        return new static(str_pad($this->value, static::convert($length), (string) $pad_string, $pad_type));
    }

    public function parsestr(): ArrInterface
    {

        parse_str($this->value, $return);

        return new (static::ARR_CLASS)($return);

    }

    public function pbrk(string|Stringable|StrInterface $characters): static|false
    {

        $return = strpbrk($this->value, (string) $characters);

        return false === $return ? $return : new static($return);

    }

    public function pos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false {

        $return = strpos($this->value, (string) $needle, static::convert($offset));

        return false === $return ? $return : new (static::NUM_CLASS)($return);

    }

    public function pregfilter(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static {

        $return = preg_filter(
            static::convert($pattern),
            static::convert($replacement),
            $this->value,
            static::convert($limit),
            $count
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function pregmatch(
        string|Stringable|StrInterface $pattern,
        ?ArrInterface &$matches = null,
        int $flags = 0,
        int|NumInterface $offset = 0
    ): NumInterface|false {

        $return = preg_match(
            (string) $pattern,
            $this->value,
            $matches,
            $flags,
            static::convert($offset)
        );

        $matches = new (static::ARR_CLASS)($matches);

        return false === $return ? $return : new (static::NUM_CLASS)($return);

    }

    public function pregmatchall(
        string|Stringable|StrInterface $pattern,
        ?ArrInterface &$matches = null,
        int $flags = 0,
        int|NumInterface $offset = 0
    ): NumInterface|false {

        $return = preg_match_all(
            (string) $pattern,
            $this->value,
            $matches,
            $flags,
            static::convert($offset)
        );

        $matches = new (static::ARR_CLASS)($matches);

        return false === $return ? $return : new (static::NUM_CLASS)($return);

    }

    public function pregquote(string|Stringable|StrInterface|null $delimiter = null): static
    {
        return new static(preg_quote($this->value, static::convert($delimiter)));
    }

    public function pregreplace(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        string|array|Stringable|StrInterface|ArrInterface $replacement,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static {

        $return = preg_replace(
            static::convert($pattern),
            static::convert($replacement),
            $this->value,
            static::convert($limit),
            $count
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function pregreplacecallback(
        string|array|Stringable|StrInterface|ArrInterface $pattern,
        callable $callback,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null
    ): ?static {

        $return = preg_replace_callback(
            static::convert($pattern),
            $callback,
            $this->value,
            static::convert($limit),
            $count
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function pregreplacecallbackarray(
        array|ArrInterface $pattern,
        int|NumInterface $limit = -1,
        ?NumInterface &$count = null,
        int $flags = 0
    ): ?static {

        $return = preg_replace_callback_array(
            static::convert($pattern),
            $this->value,
            static::convert($limit),
            $count,
            $flags
        );

        $count = new (static::NUM_CLASS)($count);

        return null === $return ? $return : new static($return);

    }

    public function pregsplit(
        string|Stringable|StrInterface $pattern,
        int|NumInterface $limit = -1,
        int $flags = 0
    ): ArrInterface|false {

        $return = preg_split((string) $pattern, $this->value, static::convert($limit), $flags);

        return false === $return ? $return : new (static::ARR_CLASS)($return);

    }

    public function quotedprintabledecode(): static
    {
        return new static(quoted_printable_decode($this->value));
    }

    public function quotedprintableencode(): static
    {
        return new static(quoted_printable_encode($this->value));
    }

    public function quotemeta(): static
    {
        return new static(quotemeta($this->value));
    }

    public function rchr(
        string|Stringable|StrInterface $needle,
        bool $before_needle = false
    ): static|false {

        $args = [(string) $needle, $before_needle];

        $return = strrchr($this->value, ...$args);

        return false === $return ? $return : new static($return);

    }

    public static function repeat(
        string $string,
        int|NumInterface $times
    ): static {
        return new static(str_repeat($string, static::convert($times)));
    }

    public function replace(
        string|array|Stringable|StrInterface|ArrInterface $search,
        string|array|Stringable|StrInterface|ArrInterface $replace,
        ?NumInterface &$count = null
    ): static {

        $return = new static(str_replace(
            static::convert($search),
            static::convert($replace),
            $this->value,
            $count
        ));

        $count = new (static::NUM_CLASS)($count);

        return $return;

    }

    public function rev(): static
    {
        return new static(strrev($this->value));
    }

    public function ripos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false {

        $return = strripos($this->value, (string) $needle, static::convert($offset));

        return false === $return ? $return : new (static::NUM_CLASS)($return);

    }

    public function rot13(): static
    {
        return new static(str_rot13($this->value));
    }

    public function rpos(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset = 0
    ): NumInterface|false {

        $return = strrpos($this->value, (string) $needle, static::convert($offset));

        return false === $return ? $return : new (static::NUM_CLASS)($return);

    }

    public function rtrim(string|Stringable|StrInterface $characters = " \n\r\t\v\x00"): static
    {
        return new static(rtrim($this->value, (string) $characters));
    }

    public function serialize(): static
    {
        return new static(serialize($this->value));
    }

    public function sha1(bool $binary = false): static
    {
        return new static(sha1($this->value, $binary));
    }

    public function sha1file(bool $binary = false): static|false
    {

        $return = sha1_file($this->value, $binary);

        return false === $return ? $return : new static($return);

    }

    public function shuffle(): static
    {
        return new static(str_shuffle($this->value));
    }

    public function similartext(
        string|Stringable|StrInterface $string2,
        ?NumInterface &$percent = null
    ): NumInterface {

        $return = new (static::NUM_CLASS)(similar_text($this->value, (string) $string2, $percent));

        $percent = new (static::NUM_CLASS)($percent);

        return $return;

    }

    public function soundex(): static
    {
        return new static(soundex($this->value));
    }

    public function split(int|NumInterface $length): ArrInterface
    {
        return new (static::ARR_CLASS)(str_split($this->value, static::convert($length)));
    }

    public function spn(
        string|Stringable|StrInterface $characters,
        int|NumInterface $offset = 0,
        int|NumInterface|null $length = null
    ): NumInterface {

        return new (static::NUM_CLASS)(strspn(
            $this->value,
            (string) $characters,
            static::convert($offset),
            static::convert($length)
        ));

    }

    public function sprintf(mixed ...$values): static
    {
        return new static(\sprintf($this->value, ...static::convert($values)));
    }

    public function sscanf(string|Stringable|StrInterface $format): ArrInterface
    {
        return new (static::ARR_CLASS)(sscanf($this->value, (string) $format));
    }

    public function startswith(string|Stringable|StrInterface $needle): bool
    {
        return str_starts_with($this->value, (string) $needle);
    }

    public function str(
        string|Stringable|StrInterface $needle,
        bool $before_needle = false
    ): static|false {

        $return = strstr($this->value, (string) $needle, $before_needle);

        return false === $return ? $return : new static($return);

    }

    public function stripcslashes(): static
    {
        return new static(stripcslashes($this->value));
    }

    public function stripslashes(): static
    {
        return new static(stripslashes($this->value));
    }

    public function striptags(array|string|Stringable|ArrInterface|StrInterface|null $allowed_tags = null): static
    {
        return new static(strip_tags($this->value, static::convert($allowed_tags)));
    }

    public function substr(
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static {
        return new static(substr($this->value, static::convert($offset), static::convert($length)));
    }

    public function substrcompare(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null,
        bool $case_insensitive = false
    ): NumInterface {

        return new (static::NUM_CLASS)(substr_compare(
            $this->value,
            (string) $needle,
            static::convert($offset),
            static::convert($length),
            $case_insensitive
        ));

    }

    public function substrcount(
        string|Stringable|StrInterface $needle,
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): NumInterface {

        return new (static::NUM_CLASS)(substr_count(
            $this->value,
            (string) $needle,
            static::convert($offset),
            static::convert($length)
        ));

    }

    public function substrreplace(
        string|Stringable|StrInterface $replace,
        int|NumInterface $offset,
        int|NumInterface|null $length = null
    ): static {

        return new static(substr_replace(
            $this->value,
            (string) $replace,
            static::convert($offset),
            static::convert($length)
        ));

    }

    public function tolower(): static
    {
        return new static(strtolower($this->value));
    }

    public function toupper(): static
    {
        return new static(strtoupper($this->value));
    }

    public function tr(
        string|array|Stringable|StrInterface|ArrInterface $from,
        string|Stringable|StrInterface|null $to = null
    ): static {
        return new static(strtr($this->value, ...static::convert(\func_get_args())));
    }

    public function trim(string|Stringable|StrInterface $characters = " \n\r\t\v\x00"): static
    {
        return new static(trim($this->value, (string) $characters));
    }

    public function ucfirst(): static
    {
        return new static(ucfirst($this->value));
    }

    public function ucwords(string|Stringable|StrInterface $separators = " \t\r\n\f\v"): static
    {
        return new static(ucwords($this->value, (string) $separators));
    }

    public function unserialize(array|ArrInterface $options = []): mixed
    {
        return static::object(unserialize($this->value, static::convert($options)));
    }

    public function vsprintf(array|ArrInterface $values): static
    {
        return new static(vsprintf($this->value, static::convert($values)));
    }

    public function wordcount(
        int $format = 0,
        string|Stringable|StrInterface|null $characters = null
    ): ArrInterface|NumInterface {

        $return = str_word_count($this->value, $format, (string) $characters);

        return $format ? new (static::ARR_CLASS)($return) : new (static::NUM_CLASS)($return);

    }

    public function wordwrap(
        int|NumInterface $width = 75,
        string|Stringable|StrInterface $break = "\n",
        bool $cut_long_words = false
    ): static {
        return new static(wordwrap($this->value, static::convert($width), (string) $break, $cut_long_words));
    }

    protected static function object(mixed $value): mixed
    {

        return match (true) {
            \is_array($value) => new (static::ARR_CLASS)($value),
            \is_int($value) || \is_float($value) => new (static::NUM_CLASS)($value),
            \is_string($value) => new static($value),
            default => $value,
        };

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
