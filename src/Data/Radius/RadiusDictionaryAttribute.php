<?php

namespace spkm\FortiNac\Data\Radius;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A RadiusDictionaryAttribute record.
 */
readonly class RadiusDictionaryAttribute extends Data
{
    /**
     * @param  array<mixed>|null  $definedValues
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $type = null,
        public ?string $attribute = null,
        public ?string $value = null,
        public ?bool $hasTag = null,
        public ?bool $custom = null,
        public ?array $definedValues = null,
        public ?string $format = null,
        public ?string $vendor = null,
        public ?CarbonImmutable $vendorId = null,
        public ?int $encryptMethod = null,
        public array $extra = [],
    ) {}
}
