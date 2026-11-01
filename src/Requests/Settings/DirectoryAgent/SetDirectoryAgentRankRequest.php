<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the rank of the supplied Directory Agent Configuration, shifting other rank as necessary: POST /settings/agent/directory-agent/rank/set.
 *
 * Parameters: id, rank.
 */
class SetDirectoryAgentRankRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/rank/set';
    }
}
