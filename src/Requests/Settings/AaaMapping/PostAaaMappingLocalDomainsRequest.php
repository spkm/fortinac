<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new local domain for roaming guests: POST /settings/integration/aaa-mappings/local-domains.
 */
class PostAaaMappingLocalDomainsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/local-domains';
    }
}
