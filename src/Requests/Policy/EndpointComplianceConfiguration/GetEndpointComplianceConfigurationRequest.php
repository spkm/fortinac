<?php

namespace spkm\FortiNac\Requests\Policy\EndpointComplianceConfiguration;

use spkm\FortiNac\Data\Policy\EndpointComplianceConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Endpoint Compliance Configuration records matching the supplied filter: GET /policy/endpoint-compliance-configuration/{id}.
 */
class GetEndpointComplianceConfigurationRequest extends ItemRequest
{
    protected ?string $dto = EndpointComplianceConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/endpoint-compliance-configuration/'.$this->id;
    }
}
