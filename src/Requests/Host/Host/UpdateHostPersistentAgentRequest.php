<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Updates the Persistent Agent for the Host Record with the provided id: POST /host/{id}/update-persistent-agent.
 *
 * Parameters: uuid.
 */
class UpdateHostPersistentAgentRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: uuid
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id.'/update-persistent-agent';
    }
}
