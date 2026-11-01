<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the information used to create an Endpoint Compliance Configuration: GET /policy/endpoint-compliance-configuration/supporting-info.
 */
class GetEndpointComplianceConfigurationSupportingInfoRequest extends ItemRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance-configuration/supporting-info';
    }
}
