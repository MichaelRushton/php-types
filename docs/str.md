# Str

## API reference

```php
public function __construct(protected string $string = '')
```

```php
public function addcslashes(string|self $characters): static
```

```php
public function addslashes(): static
```

```php
public function bin2hex(): static
```

```php
public function casecmp(
    string|self $string2,
    ?Num &$return = null
): Num|static
```

```php
public function chunksplit(
    int|Num $length = 76,
    string|self $separator = "\r\n"
): static
```

```php
public function clone(?self &$return = null): static
```

```php
public function cmp(
    string|self $string2,
    ?Num &$return = null
): Num|static
```

```php
public function coll(
    string|self $string2,
    ?Num &$return = null
): Num|static
```

```php
public function contains(
    string|self $needle,
    ?bool &$return = null
): bool|static
```

```php
public function convertuudecode(): static
```

```php
public function convertuuencode(): static
```

```php
public function countchars(
    int|Num $mode = 0,
    ?Arr &$return = null
): Arr|static
```

```php
public function crc32(?Num &$return = null): Num|static
```

```php
public function crypt(string|self $salt): static
```

```php
public function cspn(
    string|self $characters,
    int|Num $offset = 0,
    int|Num|null $length = null,
    ?Num &$return = null
): Num|static
```

```php
public function decrement(): static
```

```php
public function echo(): static
```

```php
public function endswith(
    string|self $needle,
    ?bool &$return = null
): bool|static
```

```php
public function explode(
    string|self $separator,
    int|Num $limit = PHP_INT_MAX,
    ?Arr &$return = null
): Arr|static
```

```php
public function fprintf(
    $stream,
    mixed ...$values
): static
```

```php
public function getcsv(
    string|self $separator = ',',
    string|self $enclosure = '"',
    string|self $escape = "\\",
    ?Arr &$return = null
): Arr|static
```

```php
public function hebrev(int|Num $max_chars_per_line = 0): static
```

```php
public function hex2bin(): static
```

```php
public function htmlentities(
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    string|self|null $encoding = null,
    bool $double_encode = true
): static
```

```php
public function htmlentitydecode(
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    string|self|null $encoding = null
): static
```

```php
public function htmlspecialchars(
    int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401,
    string|self|null $encoding = null,
    bool $double_encode = true
): static
```

```php
public function htmlspecialcharsdecode(int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): static
```

```php
public function increment(): static
```

```php
public function ipos(
    string|self $needle,
    int|Num $offset = 0,
    Num|false|null &$return = null
): Num|false|static
```

```php
public function ireplace(
    string|self|array|Arr $search,
    string|self|array|Arr $replace,
    ?Num &$count = null
): static
```

```php
public function istr(
    string|self $needle,
    bool $before_needle = false,
    ?false &$return = null
): false|static
```

```php
public function lcfirst(): static
```

```php
public function len(?Num &$return = null): Num|static
```

```php
public function levenshtein(
    string|self $string2,
    int|Num $insertion_cost = 1,
    int|Num $replacement_cost = 1,
    int|Num $deletion_cost  = 1,
    ?Num &$return = null
): Num|static
```

```php
public function ltrim(string|self $characters = " \n\r\t\v\x00"): static
```

```php
public function md5(bool $binary = false): static
```

```php
public function md5file(bool $binary = false): static
```

```php
public function metaphone(int|Num $max_phonemes = 0): static
```

```php
public function natcasecmp(
    string|self $string2,
    ?Num &$return = null
): Num|static
```

```php
public function natcmp(
    string|self $string2,
    ?Num &$return = null
): Num|static
```

```php
public function ncasecmp(
    string|self $string2,
    int|Num $length,
    ?Num &$return = null
): Num|static
```

```php
public function ncmp(
    string|self $string2,
    int|Num $length,
    ?Num &$return = null
): Num|static
```

```php
public static function nllanginfo(int $item): self
```

```php
public function nl2br(bool $use_xhtml = true): static
```

```php
public function ord(?Num &$return = null): Num|static
```

```php
public function pad(
    int|Num $length,
    string|self $pad_string = ' ',
    int $pad_type = STR_PAD_RIGHT
): static
```

```php
public function parsestr(?Arr &$return = null): Arr|static
```

```php
public function pbrk(
    string|self $characters,
    ?false &$return = null
): false|static
```

```php
public function pos(
    string|self $needle,
    int|Num $offset = 0,
    Num|false|null &$return = null
): Num|false|static
```

```php
public function pregfilter(
    string|self|array|Arr $pattern,
    string|self|array|Arr $replacement,
    int|Num $limit = -1,
    ?Num &$count = null
): static
```

```php
public function pregmatch(
    string|self $pattern,
    ?Arr &$matches,
    int $flags,
    int|Num $offset = 0,
    Num|false|null &$return = null
): Num|false|static
```

```php
public function pregmatchall(
    string|self $pattern,
    ?Arr &$matches,
    int $flags,
    int|Num $offset = 0,
    Num|false|null &$return = null
): Num|false|static
```

```php
public function pregquote(string|Str|null $delimiter = null): static
```

```php
public function pregreplace(
    string|self|array|Arr $pattern,
    string|self|array|Arr $replacement,
    int|Num $limit = -1,
    ?Num &$count = null
): static
```

```php
public function pregreplacecallback(
    string|self|array|Arr $pattern,
    callable $callback,
    int|Num $limit = -1,
    ?Num &$count = null
): static
```

```php
public function pregreplacecallbackarray(
    array|Arr $pattern,
    int|Num $limit = -1,
    ?Num &$count = null,
    int $flags = 0
): static
```

```php
public function pregsplit(
    string|Str $pattern,
    int|Num $limit = -1,
    int $flags = 0,
    ?Arr &$return = null
): Arr|static
```

```php
public function printf(mixed ...$values): static
```

```php
public function printr(?self &$return = null): static
```

```php
public function quotedprintabledecode(): static
```

```php
public function quotedprintableencode(): static
```

```php
public function quotemeta(): static
```

```php
public function rchr(
    string|self $needle,
    bool $before_needle = false,
    ?false &$return = null
): false|static
```

```php
public static function repeat(
    string $string,
    int|Num $times
): self
```

```php
public function replace(
    string|self|array|Arr $search,
    string|self|array|Arr $replace,
    ?Num &$count = null
): static
```

```php
public function rev(): static
```

```php
public function ripos(
    string|self $needle,
    int|Num $offset = 0,
    Num|false|null &$return = null
): Num|false|static
```

```php
public function rot13(): static
```

```php
public function rpos(
    string|self $needle,
    int|Num $offset = 0,
    Num|false|null &$return = null
): Num|false|static
```

```php
public function rtrim(string|self $characters = " \n\r\t\v\x00"): static
```

```php
public function sha1(bool $binary = false): static
```

```php
public function sha1file(bool $binary = false): static
```

```php
public function shuffle(): static
```

```php
public function similartext(
    string|self $string2,
    ?Num &$percent = null,
    ?Num &$return = null
): Num|static
```

```php
public function soundex(): static
```

```php
public function split(
    int|Num $length,
    ?Arr &$return = null
): Arr|static
```

```php
public function spn(
    string|self $characters,
    int|Num $offset = 0,
    int|Num|null $length = null,
    ?Num &$return = null
): Num|static
```

```php
public function sprintf(mixed ...$values): static
```

```php
public function sscanf(
    string|self $format,
    ?Arr &$return = null
): Arr|static
```

```php
public function startswith(
    string|self $needle,
    ?bool &$return = null
): bool|static
```

```php
public function str(
    string|self $needle,
    bool $before_needle = false,
    ?false &$return = null
): false|static
```

```php
public function stripcslashes(): static
```

```php
public function stripslashes(): static
```

```php
public function striptags(array|Arr|string|self|null $allowed_tags = null): static
```

```php
public function substr(
    int|Num $offset,
    int|Num|null $length = null
): static
```

```php
public function substrcompare(
    string|self $needle,
    int|Num $offset,
    int|Num|null $length = null,
    bool $case_insensitive = false,
    ?Num &$return = null
): Num|static
```

```php
public function substrcount(
    string|self $needle,
    int|Num $offset,
    int|Num|null $length = null,
    ?Num &$return = null
): Num|static
```

```php
public function substrreplace(
    string|self $replace,
    int|Num $offset,
    int|Num|null $length = null
): static
```

```php
public function tolower(): static
```

```php
public function toupper(): static
```

```php
public function tr(
    string|self|array|Arr $from,
    string|self|null $to = null
): static
```

```php
public function trim(string|self $characters = " \n\r\t\v\x00"): static
```

```php
public function ucfirst(): static
```

```php
public function ucwords(string|self $separators = " \t\r\n\f\v"): static
```

```php
public function vardump(): static
```

```php
public function vfprintf(
    $stream,
    array|Arr $values
): static
```

```php
public function vprintf(array|Arr $values): static
```

```php
public function vsprintf(array|Arr $values): static
```

```php
public function wordcount(
    int $format = 0,
    string|self|null $characters = null,
    Arr|Num|null &$return = null
): Arr|Num|static
```

```php
public function wordwrap(
    int|Num $width = 75,
    string|self $break = "\n",
    bool $cut_long_words = false
): static
```
