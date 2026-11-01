<?php

namespace spkm\FortiNac\Requests\User\UserAttribute;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the value currently stored for the requested attribute on the API user: POST /user/attributes/{name}.
 *
 * Parameters: value.
 */
class UpdateUserAttributeRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: value
     */
    public function __construct(protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/user/attributes/'.rawurlencode($this->name);
    }
}
