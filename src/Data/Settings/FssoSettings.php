<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A FssoSettings record.
 */
readonly class FssoSettings extends Data
{
    protected const HIDDEN = ['password'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $enabled = null,
        public ?string $port = null,
        public ?string $password = null,
        public array $extra = [],
    ) {}
}
