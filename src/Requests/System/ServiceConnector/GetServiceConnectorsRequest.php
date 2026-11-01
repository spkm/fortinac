<?php

namespace spkm\FortiNac\Requests\System\ServiceConnector;

use spkm\FortiNac\Data\System\ServiceConnector;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns a summary of all configured Service Connectors: GET /system/service-connector.
 */
class GetServiceConnectorsRequest extends ListRequest
{
    protected ?string $dto = ServiceConnector::class;

    public function resolveEndpoint(): string
    {
        return '/system/service-connector';
    }
}
