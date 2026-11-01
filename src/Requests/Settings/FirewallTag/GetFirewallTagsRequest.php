<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Data\Settings\FirewallTag;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Firewall Tag records matching the supplied filter: GET /settings/integration/firewall-tag.
 */
class GetFirewallTagsRequest extends ListRequest
{
    protected ?string $dto = FirewallTag::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/firewall-tag';
    }
}
