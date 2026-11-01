<?php

namespace spkm\FortiNac\Requests\Settings\FirewallTag;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single Firewall Tag record by ID: POST /settings/integration/firewall-tag/{id}/delete.
 */
class DeleteFirewallTagViaPostRequest extends ActionRequest
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
        return '/settings/integration/firewall-tag/'.$this->id.'/delete';
    }
}
