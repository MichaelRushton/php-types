# Str

## API reference

```php
public string $value { get; }
```

```php
public function addcslashes(string|StrInterface $characters): static;
```

```php
public function addslashes(): static;
```

```php
public function bin2hex(): static;
```

```php
public function casecmp(
    string|StrInterface $string2,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function chunksplit(
    int|NumInterface $length = 76,
    string|StrInterface $separator = "\r\n"
): static;
```

```php
public function clone(?StrInterface &$return = null): static;
```

```php
public function cmp(
    string|StrInterface $string2,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function coll(
    string|StrInterface $string2,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function contains(
    string|StrInterface $needle,
    ?bool &$return = null
): bool|static;
```

```php
public function convertuudecode(): static;
```

```php
public function convertuuencode(): static;
```

```php
public function countchars(
    int|NumInterface $mode = 0,
    ?ArrInterface &$return = null
): ArrInterface|static;
```

```php
public function crc32(?NumInterface &$return = null): NumInterface|static;
```

```php
public function crypt(string|StrInterface $salt): static;
```

```php
public function cspn(
    string|StrInterface $characters,
    int|NumInterface $offset = 0,
    int|NumInterface|null $length = null,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function decrement(): static;
```

```php
public function echo(): static;
```

```php
public function endswith(
    string|StrInterface $needle,
    ?bool &$return = null
): bool|static;
```

```php
public function explode(
    string|StrInterface $separator,
    int|NumInterface $limit = PHP_INT_MAX,
    ?ArrInterface &$return = null
): ArrInterface|static;
```

```php
public function fprintf(
    $stream,
    mixed ...$values
): static;
```

```php
public function getcsv(
    string|StrInterface $separator = ',',
    string|StrInterface $enclosure = '"',
    string|StrInterface $escape = "\\",
    ?ArrInterface &$return = null
): ArrInterface|static;
```

```php
public function hebrev(int|NumInterface $max_chars_per_line = 0): static;
```

```php
public function hex2bin(): static;
```

```php
public function htmlentities(
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    string|StrInterface|null $encoding = null,
    bool $double_encode = true
): static;
```

```php
public function htmlentitydecode(
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    string|StrInterface|null $encoding = null
): static;
```

```php
public function htmlspecialchars(
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    string|StrInterface|null $encoding = null,
    bool $double_encode = true
): static;
```

```php
public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static;
```

```php
public function increment(): static;
```

```php
public function ipos(
    string|StrInterface $needle,
    int|NumInterface $offset = 0,
    NumInterface|false|null &$return = null
): NumInterface|false|static;
```

```php
public function ireplace(
    string|StrInterface|array|ArrInterface $search,
    string|StrInterface|array|ArrInterface $replace,
    ?NumInterface &$count = null
): static;
```

```php
public function istr(
    string|StrInterface $needle,
    bool $before_needle = false,
    ?false &$return = null
): false|static;
```

```php
public function lcfirst(): static;
```

```php
public function len(?NumInterface &$return = null): NumInterface|static;
```

```php
public function levenshtein(
    string|StrInterface $string2,
    int|NumInterface $insertion_cost = 1,
    int|NumInterface $replacement_cost = 1,
    int|NumInterface $deletion_cost = 1,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function ltrim(string|StrInterface $characters = " \n\r\t\v\x00"): static;
```

```php
public function md5(bool $binary = false): static;
```

```php
public function md5file(bool $binary = false): static;
```

```php
public function metaphone(int|NumInterface $max_phonemes = 0): static;
```

```php
public function natcasecmp(
    string|StrInterface $string2,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function natcmp(
    string|StrInterface $string2,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function ncasecmp(
    string|StrInterface $string2,
    int|NumInterface $length,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function ncmp(
    string|StrInterface $string2,
    int|NumInterface $length,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public static function nllanginfo(int $item): StrInterface;
```

```php
public function nl2br(bool $use_xhtml = true): static;
```

```php
public function ord(?NumInterface &$return = null): NumInterface|static;
```

```php
public function pad(
    int|NumInterface $length,
    string|StrInterface $pad_string = ' ',
    int $pad_type = STR_PAD_RIGHT
): static;
```

```php
public function parsestr(?ArrInterface &$return = null): ArrInterface|static;
```

```php
public function pbrk(
    string|StrInterface $characters,
    ?false &$return = null
): false|static;
```

```php
public function pos(
    string|StrInterface $needle,
    int|NumInterface $offset = 0,
    NumInterface|false|null &$return = null
): NumInterface|false|static;
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
public function pregmatch(
    string|StrInterface $pattern,
    ?ArrInterface &$matches,
    int $flags,
    int|NumInterface $offset = 0,
    NumInterface|false|null &$return = null
): NumInterface|false|static;
```

```php
public function pregmatchall(
    string|StrInterface $pattern,
    ?ArrInterface &$matches,
    int $flags,
    int|NumInterface $offset = 0,
    NumInterface|false|null &$return = null
): NumInterface|false|static;
```

```php
public function pregquote(string|StrInterface|null $delimiter = null): static;
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
public function pregsplit(
    string|StrInterface $pattern,
    int|NumInterface $limit = -1,
    int $flags = 0,
    ?ArrInterface &$return = null
): ArrInterface|static;
```

```php
public function printf(mixed ...$values): static;
```

```php
public function printr(?StrInterface &$return = null): static;
```

```php
public function quotedprintabledecode(): static;
```

```php
public function quotedprintableencode(): static;
```

```php
public function quotemeta(): static;
```

```php
public function rchr(
    string|StrInterface $needle,
    bool $before_needle = false,
    ?false &$return = null
): false|static;
```

```php
public static function repeat(
    string $string,
    int|NumInterface $times
): StrInterface;
```

```php
public function replace(
    string|StrInterface|array|ArrInterface $search,
    string|StrInterface|array|ArrInterface $replace,
    ?NumInterface &$count = null
): static;
```

```php
public function rev(): static;
```

```php
public function ripos(
    string|StrInterface $needle,
    int|NumInterface $offset = 0,
    NumInterface|false|null &$return = null
): NumInterface|false|static;
```

```php
public function rot13(): static;
```

```php
public function rpos(
    string|StrInterface $needle,
    int|NumInterface $offset = 0,
    NumInterface|false|null &$return = null
): NumInterface|false|static;
```

```php
public function rtrim(string|StrInterface $characters = " \n\r\t\v\x00"): static;
```

```php
public function sha1(bool $binary = false): static;
```

```php
public function sha1file(bool $binary = false): static;
```

```php
public function shuffle(): static;
```

```php
public function similartext(
    string|StrInterface $string2,
    ?NumInterface &$percent = null,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function soundex(): static;
```

```php
public function split(
    int|NumInterface $length,
    ?ArrInterface &$return = null
): ArrInterface|static;
```

```php
public function spn(
    string|StrInterface $characters,
    int|NumInterface $offset = 0,
    int|NumInterface|null $length = null,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function sprintf(mixed ...$values): static;
```

```php
public function sscanf(
    string|StrInterface $format,
    ?ArrInterface &$return = null
): ArrInterface|static;
```

```php
public function startswith(
    string|StrInterface $needle,
    ?bool &$return = null
): bool|static;
```

```php
public function str(
    string|StrInterface $needle,
    bool $before_needle = false,
    ?false &$return = null
): false|static;
```

```php
public function stripcslashes(): static;
```

```php
public function stripslashes(): static;
```

```php
public function striptags(array|ArrInterface|string|StrInterface|null $allowed_tags = null): static;
```

```php
public function substr(
    int|NumInterface $offset,
    int|NumInterface|null $length = null
): static;
```

```php
public function substrcompare(
    string|StrInterface $needle,
    int|NumInterface $offset,
    int|NumInterface|null $length = null,
    bool $case_insensitive = false,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function substrcount(
    string|StrInterface $needle,
    int|NumInterface $offset,
    int|NumInterface|null $length = null,
    ?NumInterface &$return = null
): NumInterface|static;
```

```php
public function substrreplace(
    string|StrInterface $replace,
    int|NumInterface $offset,
    int|NumInterface|null $length = null
): static;
```

```php
public function tolower(): static;
```

```php
public function toupper(): static;
```

```php
public function tr(
    string|StrInterface|array|ArrInterface $from,
    string|StrInterface|null $to = null
): static;
```

```php
public function trim(string|StrInterface $characters = " \n\r\t\v\x00"): static;
```

```php
public function ucfirst(): static;
```

```php
public function ucwords(string|StrInterface $separators = " \t\r\n\f\v"): static;
```

```php
public function vardump(): static;
```

```php
public function vfprintf(
    $stream,
    array|ArrInterface $values
): static;
```

```php
public function vprintf(array|ArrInterface $values): static;
```

```php
public function vsprintf(array|ArrInterface $values): static;
```

```php
public function wordcount(
    int $format = 0,
    string|StrInterface|null $characters = null,
    ArrInterface|NumInterface|null &$return = null
): ArrInterface|NumInterface|static;
```

```php
public function wordwrap(
    int|NumInterface $width = 75,
    string|StrInterface $break = "\n",
    bool $cut_long_words = false
): static;
```

```php
public static function class(): string;
```

```php
public static function extend(string|StrInterface $class): void;
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

```php
public function __toString(): string;
```
