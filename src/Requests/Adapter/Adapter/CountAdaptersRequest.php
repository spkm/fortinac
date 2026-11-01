<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all Adapter records in the database that match the provided filter: GET /adapter/count.
 */
class CountAdaptersRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/adapter/count';
    }
}
