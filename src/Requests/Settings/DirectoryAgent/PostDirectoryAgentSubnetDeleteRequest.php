<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\WriteRequest;

/**
 * Deletes the subnet or subnets from the set of configured IP ranges: POST /settings/agent/directory-agent/subnet/delete.
 */
class PostDirectoryAgentSubnetDeleteRequest extends WriteRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/subnet/delete';
    }
}
