<?php

namespace spkm\FortiNac\Requests\User\GuestTemplate;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes the guest template record supplied, if it is not currently in use: POST /user/guest-template/{id}/delete.
 */
class DeleteGuestTemplateViaPostRequest extends ActionRequest
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
        return '/user/guest-template/'.$this->id.'/delete';
    }
}
