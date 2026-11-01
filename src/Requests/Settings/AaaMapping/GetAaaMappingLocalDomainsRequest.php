<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the set of domains configured for roaming guests: GET /settings/integration/aaa-mappings/local-domains.
 */
class GetAaaMappingLocalDomainsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/local-domains';
    }
}
