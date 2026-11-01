<?php

namespace spkm\FortiNac\Data\Ssid;

use spkm\FortiNac\Data\Data;

/**
 * A Ssid record.
 */
readonly class Ssid extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?int $devID = null,
        public ?string $devName = null,
        public ?int $domainID = null,
        public ?string $domName = null,
        public ?bool $networkPolicyFromDev = null,
        public ?bool $radiusFromDev = null,
        public ?string $priRadiusServer = null,
        public ?string $secRadiusServer = null,
        public ?string $radiusMode = null,
        public ?string $defaultRag = null,
        public ?string $radiusServerCfg = null,
        public ?string $defaultAccessVal = null,
        public ?string $deadAccessVal = null,
        public ?string $regAccessVal = null,
        public ?string $quarAccessVal = null,
        public ?string $authAccessVal = null,
        public array $extra = [],
    ) {}
}
