<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Set PatchLink server properties: POST /settings/integration/patch-management/properties/patch-link/{id}.
 *
 * Parameters: pollingInterval.
 */
class PostPatchManagementPropertiesPatchLinkByIdRequest extends ActionRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: pollingInterval
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/integration/patch-management/properties/patch-link/'.$this->id;
    }
}
