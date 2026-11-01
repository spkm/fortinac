<?php

namespace spkm\FortiNac\Requests\Device\Container;

use spkm\FortiNac\Data\Device\Container;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all Container records which match the supplied filter: GET /device/container/{id}.
 */
class GetContainerRequest extends ItemRequest
{
    protected ?string $dto = Container::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/container/'.$this->id;
    }
}
