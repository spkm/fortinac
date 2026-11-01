<?php

namespace spkm\FortiNac\Tests\Fixtures;

use spkm\FortiNac\Data\Data;

readonly class ExampleChild extends Data
{
    protected const EXTRA = false;

    public function __construct(
        public ?int $id = null,
        public ?string $label = null,
    ) {}
}
