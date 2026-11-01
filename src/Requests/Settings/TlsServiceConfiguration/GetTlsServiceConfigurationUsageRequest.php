<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of TLS Service Configuration records that reference this record: GET /settings/tls-service-configuration/{id}/usage.
 */
class GetTlsServiceConfigurationUsageRequest extends ItemRequest
{
    protected string $responseShape = self::LIST;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration/'.$this->id.'/usage';
    }
}
