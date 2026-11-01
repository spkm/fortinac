<?php

namespace spkm\FortiNac\Requests\User\User;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the User that matches the supplied DBID: POST /user/{id}/enable.
 */
class EnableUserRequest extends ActionRequest
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
        return '/user/'.$this->id.'/enable';
    }
}
