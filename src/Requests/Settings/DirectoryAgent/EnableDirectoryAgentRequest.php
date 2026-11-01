<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Enables the supplied Directory Agent Configuration: POST /settings/agent/directory-agent/{id}/enable.
 */
class EnableDirectoryAgentRequest extends ActionRequest
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
        return '/settings/agent/directory-agent/'.$this->id.'/enable';
    }
}
