<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Firewall Tag records supplied under the id parameter: POST /settings/integration/firewall-tag/delete.
 *
 * Parameters: id.
 */
class DeleteManyFirewallTagsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/integration/firewall-tag/delete';
    }
}
