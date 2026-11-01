<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A PortalConfiguration record.
 */
readonly class PortalConfiguration extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $note = null,
        public mixed $portalElement = null,
        public ?bool $overrideLastChangeSummary = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $id = null,
        public ?int $portalID = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public array $extra = [],
    ) {}
}
