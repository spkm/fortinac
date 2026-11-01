<?php

namespace spkm\FortiNac\Data\Policy;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A SupplicantConfiguration record.
 */
readonly class SupplicantConfiguration extends Data
{
    protected const HIDDEN = ['password'];

    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $badSSIDNameSet
     * @param  array<mixed>|null  $auditObj
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $badSSIDNames
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $name = null,
        public ?string $note = null,
        public ?string $ssid = null,
        public ?string $bssid = null,
        public ?bool $hidden = null,
        public ?string $password = null,
        public ?string $certificate = null,
        public ?bool $validateServerCertWindows = null,
        public ?string $eapconfig = null,
        public ?string $configCipher = null,
        public ?array $badSSIDNameSet = null,
        public ?string $cafingerprint = null,
        public ?string $securityType = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?int $id = null,
        public ?string $security = null,
        public ?string $cipher = null,
        public ?array $badSSIDNames = null,
        public ?string $eapType = null,
        public array $extra = [],
    ) {}
}
