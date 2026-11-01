<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A WebServiceDefinition record.
 */
readonly class WebServiceDefinition extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $lastChangeSummary = null,
        public ?int $id = null,
        public ?string $serviceType = null,
        public ?string $serviceMatcher = null,
        public ?string $serviceAction = null,
        public ?string $serviceTarget = null,
        public mixed $GUID = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public ?CarbonImmutable $globallyModifiedDateMilliseconds = null,
        public ?CarbonImmutable $lastModifiedDateMilliseconds = null,
        public ?int $gUID = null,
        public array $extra = [],
    ) {}
}
