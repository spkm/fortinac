<?php

namespace spkm\FortiNac\Requests\Policy\SecurityRuleTrigger;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Security Trigger records supplied under the id parameter: POST /policy/security-rule-trigger/delete.
 *
 * Parameters: id.
 */
class DeleteManySecurityRuleTriggersRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/policy/security-rule-trigger/delete';
    }
}
