<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Return RADIUS server configuration object by ID: GET /radius/radius-server-config/{id}.
 */
class GetRadiusServerRequest extends ItemRequest
{
    protected ?string $dto = RadiusServer::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/'.$this->id;
    }
}
