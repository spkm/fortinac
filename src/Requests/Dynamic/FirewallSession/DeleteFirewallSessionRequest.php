<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single record by ID: DELETE /dynamic/dynamic-connection/{id}.
 */
class DeleteFirewallSessionRequest extends DeleteRequest
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
        return '/dynamic/dynamic-connection/'.$this->id;
    }
}
