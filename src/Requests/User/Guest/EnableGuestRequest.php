<?php

namespace spkm\FortiNac\Requests\User\Guest;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied guest account: POST /user/guest/{id}/enable.
 */
class EnableGuestRequest extends ActionRequest
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
        return '/user/guest/'.$this->id.'/enable';
    }
}
