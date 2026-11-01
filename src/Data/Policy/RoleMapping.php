<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A RoleMapping record.
 */
readonly class RoleMapping extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $logicalNetwork
     * @param  array<mixed>|null  $groupIDs
     * @param  array<mixed>|null  $groupNames
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $roles
     * @param  array<mixed>|null  $cliobject
     * @param  array<mixed>|null  $filterSet
     * @param  array<mixed>|null  $role
     * @param  array<mixed>|null  $filters
     * @param  array<mixed>|null  $groups
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?int $rank = null,
        public ?int $version = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $roleID = null,
        public ?string $note = null,
        public ?array $logicalNetwork = null,
        public ?array $groupIDs = null,
        public ?string $accessValue = null,
        public ?array $groupNames = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $roleName = null,
        public ?int $cli = null,
        public ?array $roles = null,
        public ?bool $roleWildcard = null,
        public ?array $cliobject = null,
        public ?bool $roleWildcarded = null,
        public ?array $filterSet = null,
        public ?array $role = null,
        public ?int $logicalNetworkID = null,
        public ?array $filters = null,
        public ?array $groups = null,
        public array $extra = [],
    ) {}
}
