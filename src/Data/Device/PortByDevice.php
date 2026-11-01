<?php

namespace spkm\FortiNac\Data\Device;

use spkm\FortiNac\Data\Data;

/**
 * A PortByDevice record.
 */
readonly class PortByDevice extends Data
{
    /**
     * @param  array<mixed>|null  $additionalProp1
     * @param  array<mixed>|null  $additionalProp2
     * @param  array<mixed>|null  $additionalProp3
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?array $additionalProp1 = null,
        public ?array $additionalProp2 = null,
        public ?array $additionalProp3 = null,
        public array $extra = [],
    ) {}
}
