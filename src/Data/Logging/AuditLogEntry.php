<?php

namespace spkm\FortiNac\Data\Logging;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AuditLogEntry record.
 */
readonly class AuditLogEntry extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $recordID = null,
        public ?CarbonImmutable $date = null,
        public ?string $recordName = null,
        public ?string $userID = null,
        public ?string $summary = null,
        public ?string $recordType = null,
        public ?string $action = null,
        public ?array $auditObj = null,
        public ?string $yamsEventTag = null,
        public array $extra = [],
    ) {}
}
