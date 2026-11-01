<?php

namespace spkm\FortiNac\Requests\Settings\PatchManagement;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Test BigFix Server connection: POST /settings/integration/patch-management/test/{id}.
 */
class TestPatchManagementByIdRequest extends ActionRequest
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
        return '/settings/integration/patch-management/test/'.$this->id;
    }
}
