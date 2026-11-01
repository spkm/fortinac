<?php

namespace spkm\FortiNac\Data\System;

use spkm\FortiNac\Data\Data;

/**
 * A LocalPropertiesCluster record.
 */
readonly class LocalPropertiesCluster extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $name = null,
        public ?string $ip = null,
        public ?string $product = null,
        public ?string $label = null,
        public ?string $type = null,
        public ?string $version = null,
        public ?string $firmware = null,
        public ?string $appliance = null,
        public ?bool $primary = null,
        public ?bool $l3HA = null,
        public ?bool $slaveInControl = null,
        public ?string $status = null,
        public ?string $serialNumber = null,
        public ?bool $certificates = null,
        public ?string $os = null,
        public array $extra = [],
    ) {}
}
