<?php

namespace spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Delete the user-defined RADIUS dictionary entry by ID: DELETE /radius/dictionary/{id}.
 */
class DeleteRadiusDictionaryAttributeRequest extends DeleteRequest
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
        return '/radius/dictionary/'.$this->id;
    }
}
