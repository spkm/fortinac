<?php

namespace spkm\FortiNac\Requests\Device\PortChange;

use spkm\FortiNac\Data\Device\PortChange;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Port Change record with the supplied DBID: GET /device/port-changes/{id}.
 */
class GetPortChangeRequest extends ItemRequest
{
    protected ?string $dto = PortChange::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/port-changes/'.$this->id;
    }
}
