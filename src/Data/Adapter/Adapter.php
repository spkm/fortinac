<?php

namespace spkm\FortiNac\Data\Adapter;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A Adapter record.
 */
readonly class Adapter extends Data
{
    /**
     * @param  array<mixed>|null  $user
     * @param  array<mixed>|null  $ips
     * @param  array<mixed>|null  $attributes
     * @param  array<mixed>|null  $destroyEvent
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $creationEvent
     * @param  array<mixed>|null  $establishedEvent
     * @param  array<mixed>|null  $lostEvent
     * @param  array<mixed>|null  $host
     * @param  array<mixed>|null  $currentEnvironment
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $identification = null,
        public mixed $state = null,
        public mixed $type = null,
        public ?string $vendorName = null,
        public ?string $parent = null,
        public ?CarbonImmutable $lastSuccessfulPoll = null,
        public ?int $status = null,
        public ?float $version = null,
        public ?array $user = null,
        public mixed $clientState = null,
        public ?CarbonImmutable $creationTime = null,
        public ?string $mediumType = null,
        public ?string $location = null,
        public ?string $container = null,
        public ?int $dpcRuleId = null,
        public ?string $dpcRuleName = null,
        public ?string $accessValue = null,
        public ?int $authType = null,
        public ?int $innerEapType = null,
        public ?int $outerEapType = null,
        public ?array $ips = null,
        public ?int $hostID = null,
        public ?array $attributes = null,
        public ?bool $device = null,
        public ?array $destroyEvent = null,
        public ?string $physicalAddress = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $addAuditSummary = null,
        public ?array $creationEvent = null,
        public ?array $establishedEvent = null,
        public ?array $lostEvent = null,
        public ?string $ipaddress = null,
        public ?string $userID = null,
        public ?string $outerEapTypeStr = null,
        public ?string $iconType = null,
        public ?string $pctype = null,
        public ?string $allIPsString = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $operatingSystem = null,
        public ?string $directoryPolicyValue = null,
        public ?string $hardwareType = null,
        public ?string $authTypeStr = null,
        public ?string $innerEapTypeStr = null,
        public ?string $name = null,
        public ?string $hostName = null,
        public ?array $host = null,
        public ?array $currentEnvironment = null,
        public array $extra = [],
    ) {}
}
