<?php

namespace spkm\FortiNac\Requests\Dynamic\FirewallSession;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a single record by ID: POST /dynamic/dynamic-connection/{id}/delete.
 */
class DeleteFirewallSessionViaPostRequest extends ActionRequest
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
        return '/dynamic/dynamic-connection/'.$this->id.'/delete';
    }
}
