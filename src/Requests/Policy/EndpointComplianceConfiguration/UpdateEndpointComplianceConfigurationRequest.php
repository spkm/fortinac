<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use JsonSerializable;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Endpoint Compliance Configuration record: POST /policy/endpoint-compliance-configuration/{id}.
 */
class UpdateEndpointComplianceConfigurationRequest extends WriteRequest
{
    protected string $responseShape = self::SCALAR;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance-configuration/'.$this->id;
    }
}
