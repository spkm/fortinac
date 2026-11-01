<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Swaps the rank position of the two supplied Directory Agent Configurations: POST /settings/agent/directory-agent/rank/swap.
 *
 * Parameters: id1, id2.
 */
class SwapDirectoryAgentRanksRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/rank/swap';
    }
}
