<?php

namespace spkm\FortiNac\Requests\Policy\PortalConfiguration;

use spkm\FortiNac\Data\Policy\PortalConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Port Configuration records matching the supplied filter: GET /policy/portal-configuration/{id}.
 */
class GetPortalConfigurationRequest extends ItemRequest
{
    protected ?string $dto = PortalConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/portal-configuration/'.$this->id;
    }
}
