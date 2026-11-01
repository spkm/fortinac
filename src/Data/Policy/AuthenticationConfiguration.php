<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A AuthenticationConfiguration record.
 */
readonly class AuthenticationConfiguration extends Data
{
    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $note = null,
        public ?string $authenticationMethod = null,
        public ?CarbonImmutable $authenticationTime = null,
        public ?CarbonImmutable $authenticationTimeOffLine = null,
        public ?bool $reauthentication = null,
        public ?CarbonImmutable $reauthenticationTime = null,
        public ?string $errorMessage = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $id = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public array $extra = [],
    ) {}
}
