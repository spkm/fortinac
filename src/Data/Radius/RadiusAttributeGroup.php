<?php

namespace spkm\FortiNac\Data\Radius;

use spkm\FortiNac\Data\Data;

/**
 * A RadiusAttributeGroup record.
 */
readonly class RadiusAttributeGroup extends Data
{
    /**
     * @param  array<mixed>|null  $attributes
     * @param  array<mixed>|null  $auditObj
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?int $dbid = null,
        public ?string $name = null,
        public ?array $attributes = null,
        public ?string $usage = null,
        public ?string $yamsEventTag = null,
        public ?array $auditObj = null,
        public array $extra = [],
    ) {}
}
