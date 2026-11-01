<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use JsonSerializable;
use spkm\FortiNac\Data\Radius\RadiusServer;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Update an existing RADIUS server configuration object: POST /radius/radius-server-config/{id}.
 */
class UpdateRadiusServerRequest extends WriteRequest
{
    protected ?string $dto = RadiusServer::class;

    protected string $responseShape = self::LIST;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/'.$this->id;
    }
}
