<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Firewall Tag record: GET /settings/integration/firewall-tag/{id}/usage.
 */
class GetFirewallTagUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/firewall-tag/'.$this->id.'/usage';
    }
}
