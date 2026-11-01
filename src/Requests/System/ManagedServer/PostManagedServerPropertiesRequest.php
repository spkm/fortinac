<?php

namespace spkm\FortiNac\Requests\System\ManagedServer;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets additional properties about a server in the manager: POST /system/managed-server/{id}/properties.
 *
 * Parameters: ip.
 */
class PostManagedServerPropertiesRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: ip
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/system/managed-server/'.$this->id.'/properties';
    }
}
