<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantConfiguration;

use spkm\FortiNac\Data\Policy\SupplicantConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Supplicant Configuration records matching the supplied filter: GET /policy/supplicant-configuration.
 */
class GetSupplicantConfigurationsRequest extends ListRequest
{
    protected ?string $dto = SupplicantConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/supplicant-configuration';
    }
}
