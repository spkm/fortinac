<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all IP ranges currently configured for Directory Agent Configurations: GET /settings/agent/directory-agent/subnet.
 */
class GetDirectoryAgentSubnetRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/subnet';
    }
}
