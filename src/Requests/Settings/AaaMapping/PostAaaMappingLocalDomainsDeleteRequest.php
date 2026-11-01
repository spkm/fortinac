<?php

namespace spkm\FortiNac\Requests\Settings\AaaMapping;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes one or more domains from the list of local domains: POST /settings/integration/aaa-mappings/local-domains/delete.
 *
 * Parameters: domain.
 */
class PostAaaMappingLocalDomainsDeleteRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/aaa-mappings/local-domains/delete';
    }
}
