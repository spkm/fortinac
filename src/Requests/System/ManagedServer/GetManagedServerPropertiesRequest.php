<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns additional properties about a server that have been set in the manager: GET /system/managed-server/{id}/properties.
 */
class GetManagedServerPropertiesRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/managed-server/'.$this->id.'/properties';
    }
}
