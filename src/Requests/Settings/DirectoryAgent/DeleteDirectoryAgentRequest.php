<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Directory Agent Configuration record by ID: DELETE /settings/agent/directory-agent/{id}.
 */
class DeleteDirectoryAgentRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/'.$this->id;
    }
}
