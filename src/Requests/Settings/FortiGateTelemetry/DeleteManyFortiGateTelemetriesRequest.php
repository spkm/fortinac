<?php

namespace spkm\FortiNac\Requests\Settings\FortiGateTelemetry;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Deletes a list of Security Fabric Connection sources supplied under the id parameter: POST /settings/security-fabric/delete.
 *
 * Parameters: id.
 */
class DeleteManyFortiGateTelemetriesRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/security-fabric/delete';
    }
}
