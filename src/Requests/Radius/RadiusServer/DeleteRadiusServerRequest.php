<?php

namespace spkm\FortiNac\Requests\Radius\RadiusServer;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Delete RADIUS server configuration object by ID: DELETE /radius/radius-server-config/{id}.
 */
class DeleteRadiusServerRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/radius/radius-server-config/'.$this->id;
    }
}
