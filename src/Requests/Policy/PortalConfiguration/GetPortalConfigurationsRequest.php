<?php

namespace spkm\FortiNac\Requests\Policy\PortalConfiguration;

use spkm\FortiNac\Data\Policy\PortalConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Port Configuration records matching the supplied filter: GET /policy/portal-configuration.
 */
class GetPortalConfigurationsRequest extends ListRequest
{
    protected ?string $dto = PortalConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/portal-configuration';
    }
}
