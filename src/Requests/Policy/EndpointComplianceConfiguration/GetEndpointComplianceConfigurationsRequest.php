<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Data\Policy\EndpointComplianceConfiguration;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Endpoint Compliance Configuration records matching the supplied filter: GET /policy/endpoint-compliance-configuration.
 */
class GetEndpointComplianceConfigurationsRequest extends ListRequest
{
    protected ?string $dto = EndpointComplianceConfiguration::class;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance-configuration';
    }
}
