<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Data\Dynamic\FirewallSession;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of record matching the supplied filter: GET /dynamic/dynamic-connection.
 */
class GetFirewallSessionsRequest extends ListRequest
{
    protected ?string $dto = FirewallSession::class;

    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection';
    }
}
