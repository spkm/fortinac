<?php

namespace spkm\FortiNac\Requests\Settings\DirectoryAgent;

use JsonSerializable;
use spkm\FortiNac\Data\Settings\DirectoryAgent;
use spkm\FortiNac\Requests\WriteRequest;

/**
 * Updates an Directory Agent Configurations record: POST /settings/agent/directory-agent/{id}.
 */
class UpdateDirectoryAgentRequest extends WriteRequest
{
    protected ?string $dto = DirectoryAgent::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/settings/agent/directory-agent/'.$this->id;
    }
}
