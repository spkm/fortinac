<?php

namespace spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute;

use spkm\FortiNac\Data\Radius\RadiusDictionaryAttribute;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Get the RADIUS dictinoary entry of the specified name: GET /radius/dictionary/attribute/{name}.
 */
class GetRadiusDictionaryAttributeAttributeByNameRequest extends ItemRequest
{
    protected ?string $dto = RadiusDictionaryAttribute::class;

    public function __construct(protected string $name) {}

    public function resolveEndpoint(): string
    {
        return '/radius/dictionary/attribute/'.rawurlencode($this->name);
    }
}
