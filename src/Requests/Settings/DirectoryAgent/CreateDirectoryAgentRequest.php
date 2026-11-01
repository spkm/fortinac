<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Data\Settings\DirectoryAgent;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Creates a new Directory Agent Configurations records, updating instead if the supplied profile has a DBID of one that already exists: POST /settings/agent/directory-agent.
 */
class CreateDirectoryAgentRequest extends WriteRequest
{
    protected ?string $dto = DirectoryAgent::class;

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent';
    }
}
