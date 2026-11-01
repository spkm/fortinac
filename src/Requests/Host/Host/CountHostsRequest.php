<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns the count of all Host Records in the database that match the provided filter: GET /host/count.
 */
class CountHostsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/count';
    }
}
