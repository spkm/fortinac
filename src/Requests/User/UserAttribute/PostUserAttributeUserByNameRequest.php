<?php

namespace spkm\FortiNac\Requests\User\UserAttribute;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the value currently stored for the requested attribute on the target user: POST /user/attributes/user/{name}.
 *
 * Parameters: userID, value.
 */
class PostUserAttributeUserByNameRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: userID, value
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/attributes/user/'.rawurlencode($this->name);
    }
}
