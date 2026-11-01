<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A BackupConfigurationFtp record.
 */
readonly class BackupConfigurationFtp extends Data
{
    protected const HIDDEN = ['password'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?string $host = null,
        public ?string $user = null,
        public ?string $path = null,
        public ?string $password = null,
        public array $extra = [],
    ) {}
}
