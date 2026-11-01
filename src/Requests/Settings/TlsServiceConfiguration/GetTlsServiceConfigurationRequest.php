<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Data\Settings\TlsServiceConfiguration;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns a list of TLS service Configuration records matching the supplied filter: GET /settings/tls-service-configuration/{id}.
 */
class GetTlsServiceConfigurationRequest extends ItemRequest
{
    protected ?string $dto = TlsServiceConfiguration::class;

    public function __construct(protected int $id) {}

    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration/'.$this->id;
    }
}
