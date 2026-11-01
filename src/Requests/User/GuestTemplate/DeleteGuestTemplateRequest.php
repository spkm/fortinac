<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes the guest template record supplied, if it is not currently in use: DELETE /user/guest-template/{id}.
 */
class DeleteGuestTemplateRequest extends DeleteRequest
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
        return '/user/guest-template/'.$this->id;
    }
}
