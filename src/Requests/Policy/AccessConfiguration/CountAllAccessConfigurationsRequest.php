<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a total count of all Access Configuration records: GET /policy/access-configuration/count/all.
 */
class CountAllAccessConfigurationsRequest extends ItemRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration/count/all';
    }
}
