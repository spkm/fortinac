<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A LocalPropertiesSystemInitialize record.
 */
readonly class LocalPropertiesSystemInitialize extends Data
{
    protected const HIDDEN = ['adminUIPassword', 'adminCLIPassword', 'rootCLIPassword'];

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $adminUIUserID = null,
        public ?string $adminUIPassword = null,
        public ?string $adminCLIPassword = null,
        public ?string $rootCLIPassword = null,
        public ?bool $nmapScanning = null,
        public array $extra = [],
    ) {}
}
