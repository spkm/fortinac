<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A BackupSettingsArchives record.
 */
readonly class BackupSettingsArchives extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $dbArchiveBackupDays = null,
        public ?string $evtAlarmAgeTime = null,
        public ?string $scanResultsAgeTime = null,
        public ?string $connectionAgeTime = null,
        public array $extra = [],
    ) {}
}
