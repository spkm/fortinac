<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Data\Settings\DirectoryAgent;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of Directory Agent Configuration records matching the supplied filter: GET /settings/agent/directory-agent/{id}.
 */
class GetDirectoryAgentRequest extends ItemRequest
{
    protected ?string $dto = DirectoryAgent::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/'.$this->id;
    }
}
