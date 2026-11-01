<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Generates a new password using the template associated with the guest record, but does not modify that guest record: POST /user/guest/{id}/generate-password.
 */
class GenerateGuestPasswordRequest extends ActionRequest
{
    protected string $responseShape = self::SCALAR;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/guest/'.$this->id.'/generate-password';
    }
}
