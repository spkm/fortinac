<?php

namespace spkm\FortiNac\Data\Winbind;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A WinbindConfig record.
 */
readonly class WinbindConfig extends Data
{
    protected const HIDDEN = ['passwordServer'];

    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?int $dbid = null,
        public ?string $name = null,
        public ?string $workgroup = null,
        public ?string $localNetbios = null,
        public ?string $localNetbiosSecondary = null,
        public ?string $security = null,
        public ?string $realm = null,
        public ?int $logLevel = null,
        public ?string $passwordServer = null,
        public ?bool $virtual = null,
        public ?bool $joined = null,
        public ?string $logLevelStr = null,
        public ?bool $valid = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
