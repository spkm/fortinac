<?php

namespace spkm\FortiNac\Requests\Policy\AccessConfiguration;

use spkm\FortiNac\Data\Policy\AccessConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Access Configuration records matching the supplied filter: GET /policy/access-configuration.
 */
class GetAccessConfigurationsRequest extends ListRequest
{
    protected ?string $dto = AccessConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/access-configuration';
    }
}
