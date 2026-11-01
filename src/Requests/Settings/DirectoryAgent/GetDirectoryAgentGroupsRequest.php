<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all Device Groups for use when creating Directory Agent Configurations: GET /settings/agent/directory-agent/groups.
 */
class GetDirectoryAgentGroupsRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/groups';
    }
}
