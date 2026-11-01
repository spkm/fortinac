<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Data\Settings\FirewallTag;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Firewall Tag records matching the supplied filter: GET /settings/integration/firewall-tag/{id}.
 */
class GetFirewallTagRequest extends ItemRequest
{
    protected ?string $dto = FirewallTag::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/integration/firewall-tag/'.$this->id;
    }
}
