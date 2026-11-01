<?php

namespace spkm\FortiNac\Requests\Device\Port;

use spkm\FortiNac\Data\Device\PortProperties;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Sets administration properties for the port or ports: POST /device/port/properties.
 */
class PostPortPropertiesRequest extends WriteRequest
{
    protected ?string $dto = PortProperties::class;

    public function resolveEndpoint(): string
    {
        return '/device/port/properties';
    }
}
