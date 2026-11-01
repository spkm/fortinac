<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this record: GET /dynamic/dynamic-connection/{id}/usage.
 */
class GetFirewallSessionUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/dynamic/dynamic-connection/'.$this->id.'/usage';
    }
}
