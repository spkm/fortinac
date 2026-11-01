<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all scan configurations available on the requested managed server: GET /system/managed-server/{id}/scans.
 */
class GetManagedServerScansRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/system/managed-server/'.$this->id.'/scans';
    }
}
