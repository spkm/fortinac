<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Directory Agent Configuration record by ID: POST /settings/agent/directory-agent/{id}/delete.
 */
class DeleteDirectoryAgentViaPostRequest extends ActionRequest
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
        return '/settings/agent/directory-agent/'.$this->id.'/delete';
    }
}
