<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of records that reference this Directory Agent Configuration record: GET /settings/agent/directory-agent/{id}/usage.
 */
class GetDirectoryAgentUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/'.$this->id.'/usage';
    }
}
