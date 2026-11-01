<?php

namespace spkm\FortiNac\Requests\System\LocalProperties;

use spkm\FortiNac\Data\System\LocalPropertiesCluster;
use spkm\FortiNac\Requests\ListRequest;

/**
 * Returns all of the servers in the local cluster, composed of the Control/Application pair and any High Availability servers: GET /system/local-properties/cluster.
 */
class GetLocalPropertiesClusterRequest extends ListRequest
{
    protected ?string $dto = LocalPropertiesCluster::class;

    public function resolveEndpoint(): string
    {
        return '/system/local-properties/cluster';
    }
}
