<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Data\Settings\FirewallTag;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Firewall Tag record, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/integration/firewall-tag.
 */
class CreateFirewallTagRequest extends WriteRequest
{
    protected ?string $dto = FirewallTag::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/firewall-tag';
    }
}
