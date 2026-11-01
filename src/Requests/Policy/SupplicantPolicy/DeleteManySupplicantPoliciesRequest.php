<?php

namespace spkm\FortiNac\Requests\Policy\SupplicantPolicy;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Supplicant Policy records supplied under the id parameter: POST /policy/supplicant/delete.
 *
 * Parameters: id.
 */
class DeleteManySupplicantPoliciesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/supplicant/delete';
    }
}
