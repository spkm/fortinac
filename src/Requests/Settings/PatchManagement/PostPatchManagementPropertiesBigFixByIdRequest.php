<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Set BigFix server properties: POST /settings/integration/patch-management/properties/big-fix/{id}.
 */
class PostPatchManagementPropertiesBigFixByIdRequest extends ActionRequest
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
        return '/settings/integration/patch-management/properties/big-fix/'.$this->id;
    }
}
