<?php

namespace spkm\FortiNac\Data\Device;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A ContainerStartContainerMonitor record.
 */
readonly class ContainerStartContainerMonitor extends Data
{
    /**
     * @param  array<mixed>|null  $methodNames
     * @param  array<mixed>|null  $groupNames
     * @param  array<mixed>|null  $queryFilters
     * @param  array<mixed>|null  $ids
     * @param  array<mixed>|null  $attributeNames
     * @param  array<mixed>|null  $elementIDs
     * @param  array<mixed>|null  $attributeSearchValues
     * @param  array<mixed>|null  $typeList
     * @param  array<mixed>|null  $methodSearchValues
     * @param  array<mixed>|null  $groupIDsToFilter
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $landscape = null,
        public ?int $id = null,
        public ?string $state = null,
        public ?string $name = null,
        public ?string $elementType = null,
        public ?int $elementID = null,
        public ?string $elementName = null,
        public ?string $message = null,
        public ?CarbonImmutable $timeOfEvent = null,
        public ?int $version = null,
        public ?string $eventFormatString = null,
        public ?CarbonImmutable $time = null,
        public ?bool $empty = null,
        public ?int $maxRowLimit = null,
        public ?array $methodNames = null,
        public ?string $groupIDsOperator = null,
        public ?array $groupNames = null,
        public ?string $groupNamesOperator = null,
        public ?string $sortColumn = null,
        public ?array $queryFilters = null,
        public ?string $identification = null,
        public ?array $ids = null,
        public ?array $attributeNames = null,
        public ?int $changeMask = null,
        public ?string $operation = null,
        public ?string $requestString = null,
        public ?string $role = null,
        public ?string $elementClass = null,
        public ?string $physicalAddress = null,
        public ?string $hardwareType = null,
        public ?string $domainName = null,
        public ?string $protocol = null,
        public ?string $notes = null,
        public ?array $elementIDs = null,
        public ?string $sysOid = null,
        public ?bool $elementClasses = null,
        public ?array $attributeSearchValues = null,
        public ?array $typeList = null,
        public ?string $suffix = null,
        public ?string $type = null,
        public ?string $status = null,
        public ?string $description = null,
        public ?string $parent = null,
        public ?array $methodSearchValues = null,
        public ?bool $sortEnabled = null,
        public ?bool $sortAscending = null,
        public ?bool $sortDescending = null,
        public ?array $groupIDsToFilter = null,
        public ?string $queryFilterWhereClause = null,
        public array $extra = [],
    ) {}
}
