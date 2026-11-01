<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Data\Dynamic\FirewallSession;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new record, updating instead if the supplied profile has a DBID of one that already exists: POST /dynamic/dynamic-connection.
 */
class CreateFirewallSessionRequest extends WriteRequest
{
    protected ?string $dto = FirewallSession::class;

    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection';
    }
}
