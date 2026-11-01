<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceScan;

use spkm\FortiNac\Data\Policy\EndpointComplianceScan;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Scan Result record that matches the supplied DBID: GET /policy/endpoint-compliance/scan/{id}.
 */
class GetEndpointComplianceScanRequest extends ItemRequest
{
    protected ?string $dto = EndpointComplianceScan::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance/scan/'.$this->id;
    }
}
