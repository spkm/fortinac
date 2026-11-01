<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Endpoint Compliance Configuration record, updating instead if the supplied profile has a DBID of one that already exists: POST /policy/endpoint-compliance-configuration.
 */
class CreateEndpointComplianceConfigurationRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance-configuration';
    }
}
