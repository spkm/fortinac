<?php

namespace spkm\FortiNac\Requests\Radius\RadiusDictionaryAttribute;

use spkm\FortiNac\Data\Radius\RadiusDictionaryAttribute;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Get the RADIUS dictionary entries. (If filter is specified, matching attribute, vendor, vendorId, isCustom): GET /radius/dictionary.
 */
class GetRadiusDictionaryAttributesRequest extends ListRequest
{
    protected ?string $dto = RadiusDictionaryAttribute::class;

    public function resolveEndpoint(): string
    {
        return '/radius/dictionary';
    }
}
