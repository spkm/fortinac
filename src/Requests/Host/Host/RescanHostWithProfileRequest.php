<?php

namespace spkm\FortiNac\Requests\Host\Host;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Re-Scans a Host Record with a particular script profile: POST /host/{id}/rescan-with-profile.
 *
 * Parameters: profileID.
 */
class RescanHostWithProfileRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: profileID
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/host/'.$this->id.'/rescan-with-profile';
    }
}
