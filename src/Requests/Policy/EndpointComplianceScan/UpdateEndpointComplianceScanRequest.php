<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use JsonSerializable;
use spkm\FortiNac\Data\Policy\EndpointComplianceScan;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an existing Endpoint Compliance Scan: POST /policy/endpoint-compliance/scan/{id}.
 */
class UpdateEndpointComplianceScanRequest extends WriteRequest
{
    protected ?string $dto = EndpointComplianceScan::class;

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
        return '/policy/endpoint-compliance/scan/'.$this->id;
    }
}
