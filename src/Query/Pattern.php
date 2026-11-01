<?php

namespace spkm\FortiNac\Query;

use Stringable;

/**
 * A filter pattern written by the package itself, such as the *text* whereContains() builds, which Filter sends as
 * it is rather than escaping it as a caller's value.
 */
final class Pattern implements Stringable
{
    public function __construct(private string $pattern) {}

    public function __toString(): string
    {
        return $this->pattern;
    }
}
