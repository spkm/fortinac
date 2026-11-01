<?php

namespace spkm\FortiNac\Requests\User\SelfRegistration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Denies a self registration request, supplying a message back to the user: GET /user/guest-self-registration/{id}/deny.
 *
 * Parameters: guestMessage, requestKey.
 */
class GetSelfRegistrationDenyRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options: guestMessage, requestKey
     */
    public function __construct(protected int $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/guest-self-registration/'.$this->id.'/deny';
    }
}
