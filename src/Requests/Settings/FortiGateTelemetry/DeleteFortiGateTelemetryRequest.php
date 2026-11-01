<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use spkm\FortiNac\Requests\DeleteRequest;

/**
 * Deletes a single Security Fabric Connection source by ID: DELETE /settings/security-fabric/{id}.
 */
class DeleteFortiGateTelemetryRequest extends DeleteRequest
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
        return '/settings/security-fabric/'.$this->id;
    }
}
