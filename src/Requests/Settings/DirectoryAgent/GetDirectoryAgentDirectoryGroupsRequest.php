<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns all Device Groups for use when creating Directory Agent Configurations: GET /settings/agent/directory-agent/directory-groups.
 */
class GetDirectoryAgentDirectoryGroupsRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/directory-groups';
    }
}
