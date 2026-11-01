<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the guest account record supplied, if it is not currently in use: DELETE /user/guest/{id}.
 */
class DeleteGuestRequest extends DeleteRequest
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
        return '/user/guest/'.$this->id;
    }
}
