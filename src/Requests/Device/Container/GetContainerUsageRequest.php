<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Container records that reference this record: GET /device/container/{id}/usage.
 */
class GetContainerUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/container/'.$this->id.'/usage';
    }
}
