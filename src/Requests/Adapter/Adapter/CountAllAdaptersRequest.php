<?php

namespace spkm\FortiNac\Requests\Adapter\Adapter;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the count of all Adapter records in the database: GET /adapter/count/all.
 */
class CountAllAdaptersRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/adapter/count/all';
    }
}
