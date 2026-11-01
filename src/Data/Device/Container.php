<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Container record.
 */
readonly class Container extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $mibs
     * @param  array<mixed>|null  $destroyEvent
     * @param  array<mixed>|null  $creationEvent
     * @param  array<mixed>|null  $establishedEvent
     * @param  array<mixed>|null  $lostEvent
     * @param  array<mixed>|null  $attributeNames
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $attribute
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?int $state = null,
        public ?int $elementClass = null,
        public mixed $role = null,
        public ?string $name = null,
        public mixed $type = null,
        public mixed $protocol = null,
        public ?int $status = null,
        public ?string $parent = null,
        public mixed $suffix = null,
        public ?float $version = null,
        public mixed $notes = null,
        public mixed $description = null,
        public mixed $group = null,
        public ?int $pollingInterval = null,
        public mixed $lastPoll = null,
        public ?CarbonImmutable $lastSuccessfulPoll = null,
        public ?array $mibs = null,
        public ?array $destroyEvent = null,
        public ?array $creationEvent = null,
        public ?array $establishedEvent = null,
        public ?array $lostEvent = null,
        public ?int $changeMask = null,
        public ?array $attributeNames = null,
        public mixed $physicalAddress = null,
        public mixed $sysOid = null,
        public ?float $packedVersion = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $addAuditSummary = null,
        public ?string $domainName = null,
        public ?string $identification = null,
        public ?string $requestString = null,
        public ?array $attribute = null,
        public ?int $lastChangeMask = null,
        public ?string $note = null,
        public ?bool $defaultAPLocation = null,
        public array $extra = [],
    ) {}
}
