<?php

declare(strict_types=1);

namespace MichaelRushton\Types\Traits;

trait Pipe
{
    public function pipe(callable $callback): mixed
    {
        return $callback($this);
    }
}
