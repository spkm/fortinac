<?php

namespace spkm\FortiNac\Tests\Fixtures;

use Carbon\CarbonImmutable;
use spkm\FortiNac\Data\Data;

/**
 * A model as FortiNAC's logs keep them: dates as ISO 8601 strings, and nothing beyond the documented fields.
 */
readonly class ExampleIsoData extends Data
{
    protected const EXTRA = false;

    protected const DATE_FORMAT = 'Y-m-d\TH:i:s.vO';

    public function __construct(
        public ?int $id = null,
        public ?CarbonImmutable $creationTime = null,
    ) {}
}
