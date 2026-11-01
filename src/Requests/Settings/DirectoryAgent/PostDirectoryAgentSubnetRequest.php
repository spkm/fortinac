<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Adds a new IP range of subnet to allow the Directory agent configurations: POST /settings/agent/directory-agent/subnet.
 *
 * Parameters: startIP, endIP.
 */
class PostDirectoryAgentSubnetRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/subnet';
    }
}
