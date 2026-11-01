<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A CertificateCsrGenerate record.
 */
readonly class CertificateCsrGenerate extends Data
{
    /**
     * @param  array<mixed>|null  $sans
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $keyLength = null,
        public ?string $countryName = null,
        public ?string $state = null,
        public ?string $city = null,
        public ?string $orgName = null,
        public ?string $ou = null,
        public ?string $cn = null,
        public ?array $sans = null,
        public ?bool $selfSigned = null,
        public ?string $certType = null,
        public ?string $newTargetAlias = null,
        public array $extra = [],
    ) {}
}
