<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Data\Settings\DirectoryAgent;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a list of Device Identity Source records matching the supplied filter: GET /settings/agent/directory-agent.
 */
class GetDirectoryAgentsRequest extends ListRequest
{
    protected ?string $dto = DirectoryAgent::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent';
    }
}
