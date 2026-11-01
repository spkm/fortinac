<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the health status of the Host Record for the provided id: POST /host/{id}/set-health.
 *
 * Parameters: profileName, status, profileID.
 */
class SetHostHealthRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: profileName, status, profileID
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id.'/set-health';
    }
}
