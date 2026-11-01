<?php

namespace spkm\FortiNac\Requests\Settings\TlsServiceConfiguration;

use spkm\FortiNac\Data\Settings\TlsServiceConfigurationAliases;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the list of aliases available to the certificate manager: GET /settings/tls-service-configuration/aliases.
 *
 * Parameters: type.
 */
class GetTlsServiceConfigurationAliasesRequest extends ItemRequest
{
    protected ?string $dto = TlsServiceConfigurationAliases::class;

    /**
     * @param  array<string, mixed>  $options  Query options: type
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/settings/tls-service-configuration/aliases';
    }
}
