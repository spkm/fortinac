<?php

namespace spkm\FortiNac\Requests\Policy\PortalConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Portal Configuration record: GET /policy/portal-configuration/{id}/usage.
 */
class GetPortalConfigurationUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/policy/portal-configuration/'.$this->id.'/usage';
    }
}
