<?php

namespace spkm\FortiNac\Requests\Policy\EndpointCompliancePolicy;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\EndpointCompliancePolicy;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Endpoint Compliance Policy record: POST /policy/endpoint-compliance/{id}.
 */
class UpdateEndpointCompliancePolicyRequest extends WriteRequest
{
    protected ?string $dto = EndpointCompliancePolicy::class;

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
        return '/policy/endpoint-compliance/'.$this->id;
    }
}
