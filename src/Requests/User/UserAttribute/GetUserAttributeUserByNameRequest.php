<?php

namespace spkm\FortiNac\Requests\User\UserAttribute;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the value currently stored for the requested attribute on the API user: GET /user/attributes/user/{name}.
 *
 * Parameters: userID.
 */
class GetUserAttributeUserByNameRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: userID
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/attributes/user/'.rawurlencode($this->name);
    }
}
