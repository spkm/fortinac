<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A NetworkDevice record.
 */
readonly class NetworkDevice extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $description
     * @param  array<mixed>|null  $mibs
     * @param  array<mixed>|null  $creationEvent
     * @param  array<mixed>|null  $destroyEvent
     * @param  array<mixed>|null  $establishedEvent
     * @param  array<mixed>|null  $lostEvent
     * @param  array<mixed>|null  $attribute
     * @param  array<mixed>|null  $attributeNames
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $elementClass = null,
        public ?string $role = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?string $protocol = null,
        public ?string $status = null,
        public ?string $parent = null,
        public ?string $suffix = null,
        public ?int $version = null,
        public ?string $notes = null,
        public ?array $description = null,
        public ?string $group = null,
        public ?CarbonImmutable $pollingInterval = null,
        public ?CarbonImmutable $lastPoll = null,
        public ?CarbonImmutable $lastSuccessfulPoll = null,
        public ?array $mibs = null,
        public ?string $deviceType = null,
        public ?array $creationEvent = null,
        public ?array $destroyEvent = null,
        public ?array $establishedEvent = null,
        public ?array $lostEvent = null,
        public ?string $sysOid = null,
        public ?array $attribute = null,
        public ?array $attributeNames = null,
        public ?string $identification = null,
        public ?string $physicalAddress = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $addAuditSummary = null,
        public ?string $requestString = null,
        public ?string $domainName = null,
        public ?int $packedVersion = null,
        public ?int $changeMask = null,
        public ?int $lastChangeMask = null,
        public array $extra = [],
    ) {}
}
