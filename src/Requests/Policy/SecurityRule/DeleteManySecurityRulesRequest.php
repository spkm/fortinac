<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRule;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Security Rule records supplied under the id parameter: POST /policy/security-rule/delete.
 *
 * Parameters: id.
 */
class DeleteManySecurityRulesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/security-rule/delete';
    }
}
