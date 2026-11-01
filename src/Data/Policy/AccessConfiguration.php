<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AccessConfiguration record.
 */
readonly class AccessConfiguration extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $logicalNetwork
     * @param  array<mixed>|null  $firewallGroups
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $task
     * @param  array<mixed>|null  $requestedTags
     * @param  array<mixed>|null  $tags
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?int $taskID = null,
        public ?string $access = null,
        public ?int $accessAction = null,
        public ?bool $alias = null,
        public ?array $logicalNetwork = null,
        public ?bool $sendGroupsToFirewall = null,
        public ?array $firewallGroups = null,
        public ?int $radiusAttributeGroupId = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?string $yamsEventTag = null,
        public ?string $accessValue = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?int $logicalNetworkID = null,
        public ?array $task = null,
        public ?string $logicalNetworkName = null,
        public ?string $accessActionStr = null,
        public ?int $id = null,
        public ?array $requestedTags = null,
        public ?array $tags = null,
        public array $extra = [],
    ) {}
}
