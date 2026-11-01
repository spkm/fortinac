<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Data\Host\Host;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Host Record with the supplied DBID: GET /host/{id}.
 */
class GetHostRequest extends ItemRequest
{
    protected ?string $dto = Host::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id;
    }
}
