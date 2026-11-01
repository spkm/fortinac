<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Requests\CountRequest;

/**
 * Returns a count of Access Configuration records matching the supplied filter: GET /policy/access-configuration/count.
 */
class CountAccessConfigurationsRequest extends CountRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration/count';
    }
}
