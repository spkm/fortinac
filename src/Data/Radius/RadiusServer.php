<?php

namespace spkm\FortiNac\Data\Radius;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A RadiusServer record.
 */
readonly class RadiusServer extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<mixed>|null  $tlsServiceConfiguration
     * @param  array<mixed>|null  $winbindConfigurations
     * @param  array<mixed>|null  $enabledEapTypes
     * @param  array<mixed>|null  $auditObjectType
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $name = null,
        public ?array $tlsServiceConfiguration = null,
        public ?array $winbindConfigurations = null,
        public ?int $tlsEapTlsFragmentSize = null,
        public ?int $tlsCommonFragmentSize = null,
        public ?bool $eapFastServerUnauthenticatedProvisioning = null,
        public ?bool $eapFastServerAuthenticatedProvisioning = null,
        public ?int $tlsConfigID = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?bool $allowAnyWinbindConfig = null,
        public ?bool $ocspEnabled = null,
        public ?array $enabledEapTypes = null,
        public ?string $winbindConfigStr = null,
        public ?string $tlsConfigName = null,
        public ?string $tlsCertificateAlias = null,
        public ?int $authPort = null,
        public ?string $fastPacKey = null,
        public ?int $transientTlsConfigID = null,
        public ?string $auditObjectName = null,
        public ?array $auditObjectType = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
