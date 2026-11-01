<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Data\Dynamic\FirewallSession;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of record matching the supplied filter: GET /dynamic/dynamic-connection/{id}.
 */
class GetFirewallSessionRequest extends ItemRequest
{
    protected ?string $dto = FirewallSession::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection/'.$this->id;
    }
}
