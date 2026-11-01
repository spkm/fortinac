<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets the password from the guest record using the provided record id, if possible: GET /user/guest/{id}/get-password.
 */
class GetGuestGetPasswordRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/user/guest/'.$this->id.'/get-password';
    }
}
