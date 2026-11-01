<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A LocalPropertiesPasswordsChange record.
 */
readonly class LocalPropertiesPasswordsChange extends Data
{
    protected const HIDDEN = ['csAdminCLIPassword', 'asAdminCLIPassword', 'csRootCLIPassword', 'asRootCLIPassword'];

    /**
     * @param  array<mixed>|null  $csAdminCLIPassword
     * @param  array<mixed>|null  $asAdminCLIPassword
     * @param  array<mixed>|null  $csRootCLIPassword
     * @param  array<mixed>|null  $asRootCLIPassword
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $csAdminCLIPassword = null,
        public ?array $asAdminCLIPassword = null,
        public ?array $csRootCLIPassword = null,
        public ?array $asRootCLIPassword = null,
        public array $extra = [],
    ) {}
}
