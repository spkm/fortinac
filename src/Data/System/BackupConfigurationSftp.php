<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A BackupConfigurationSftp record.
 */
readonly class BackupConfigurationSftp extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $status = null,
        public ?string $errorMessage = null,
        public ?string $host = null,
        public ?string $path = null,
        public array $extra = [],
    ) {}
}
