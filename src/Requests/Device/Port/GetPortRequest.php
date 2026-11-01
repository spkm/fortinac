<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Data\Device\Port;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the Port record that matches the provided id: GET /device/port/{id}.
 */
class GetPortRequest extends ItemRequest
{
    protected ?string $dto = Port::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/device/port/'.$this->id;
    }
}
