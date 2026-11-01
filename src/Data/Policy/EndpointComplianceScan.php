<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A EndpointComplianceScan record.
 */
readonly class EndpointComplianceScan extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $bypassedOperatingSystems
     * @param  array<mixed>|null  $persistenAgentRequired
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $allAgentUUIDs
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $lastChangeSummary = null,
        public ?string $name = null,
        public ?int $guid = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?string $scriptType = null,
        public ?string $entityType = null,
        public ?int $groupID = null,
        public ?string $patchURL = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $portGroupName = null,
        public ?string $deviceGroupName = null,
        public ?string $patchInformation = null,
        public ?bool $renewIP = null,
        public ?bool $scanRogue = null,
        public ?bool $registerFailedRogue = null,
        public ?string $groupName = null,
        public ?array $bypassedOperatingSystems = null,
        public ?array $persistenAgentRequired = null,
        public ?bool $scanOnConnect = null,
        public ?string $label = null,
        public ?bool $auditOnly = null,
        public ?int $elapsedNumberOfDays = null,
        public ?int $jailbreakThreshold = null,
        public ?int $rootThreshold = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $modifyAuditSummary = null,
        public ?string $addAuditSummary = null,
        public ?string $directoryAttrVal = null,
        public ?int $policyHash = null,
        public ?CarbonImmutable $timeToWait = null,
        public ?array $allAgentUUIDs = null,
        public ?bool $linkUp = null,
        public ?bool $defaultPolicy = null,
        public ?bool $registrationPolicy = null,
        public ?bool $remediationPolicy = null,
        public ?bool $agentPolicy = null,
        public ?bool $vpnPolicy = null,
        public ?int $securityElement = null,
        public ?bool $epcmodifyAuditSummary = null,
        public ?bool $otherModifyAuditSummary = null,
        public array $extra = [],
    ) {}
}
