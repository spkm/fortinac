<?php

namespace spkm\FortiNac\Data\Settings;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A TlsServiceConfiguration record.
 */
readonly class TlsServiceConfiguration extends Data
{
    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $lastModifiedBy = null,
        public ?CarbonImmutable $lastModifiedDate = null,
        public ?string $name = null,
        public ?string $ciphers = null,
        public ?string $tlsProtocols = null,
        public ?string $certAlias = null,
        public ?string $clientAuthMode = null,
        public ?string $clientAuthAliases = null,
        public ?bool $autoUpdateCiphersAndProtocols = null,
        public ?CarbonImmutable $globalModifiedDate = null,
        public mixed $GUID = null,
        public ?int $gUID = null,
        public array $extra = [],
    ) {}
}
