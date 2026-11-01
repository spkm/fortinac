<?php

namespace spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute;

use spkm\FortiNac\Data\Radius\RadiusDictionaryAttribute;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Create user-defined RADIUS dictionary entry: POST /radius/dictionary.
 */
class CreateRadiusDictionaryAttributeRequest extends WriteRequest
{
    protected ?string $dto = RadiusDictionaryAttribute::class;

    public function resolveEndpoint(): string
    {
        return '/radius/dictionary';
    }
}
