<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Delete a single Firewall Tag record by ID: DELETE /settings/integration/firewall-tag/{id}.
 */
class DeleteFirewallTagRequest extends DeleteRequest
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
        return '/settings/integration/firewall-tag/'.$this->id;
    }
}
