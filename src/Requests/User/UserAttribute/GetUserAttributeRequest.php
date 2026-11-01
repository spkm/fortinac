<?php

namespace spkm\FortiNac\Requests\User\UserAttribute;

use spkm\FortiNac\Requests\ItemRequest;
use spkm\FortiNac\Support\Path;

/**
 * Returns the value currently stored for the requested attribute on the API user: GET /user/attributes/{name}.
 */
class GetUserAttributeRequest extends ItemRequest
{
    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/user/attributes/'.Path::segment($this->name);
    }
}
