<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Approves a self registration request, supplying a message back to the user: POST /user/guest-self-registration/{id}/approve.
 *
 * Parameters: guestMessage, requestKey.
 */
class ApproveSelfRegistrationRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: guestMessage, requestKey
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration/'.$this->id.'/approve';
    }
}
