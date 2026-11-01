<?php

namespace spkm\FortiNac\Data\Settings;

use spkm\FortiNac\Data\Data;

/**
 * A AaaMappingSwapAaaMapping record.
 */
readonly class AaaMappingSwapAaaMapping extends Data
{
    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $server1 = null,
        public ?string $domain1 = null,
        public ?string $server2 = null,
        public ?string $domain2 = null,
        public array $extra = [],
    ) {}
}
