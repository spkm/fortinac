<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\AllowedDomains;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\AllowedDomains\GetAllowedDomainsRequest;
use spkm\FortiNac\Requests\Settings\AllowedDomains\ResetAllowedDomainsRequest;
use spkm\FortiNac\Requests\Settings\AllowedDomains\UpdateAllowedDomainsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Allowed Domains, from FortiNac::settings()->allowedDomains().
 *
 * @extends SingletonResource<AllowedDomains>
 */
class AllowedDomainsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, AllowedDomains::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetAllowedDomainsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateAllowedDomainsRequest($body, $options);
    }

    /**
     * Resets Allowed Domains to Default: POST /settings/device/allowed-domains/reset.
     *
     * @param  array<string, mixed>  $options
     */
    public function reset(array $options = []): bool
    {
        return $this->perform(new ResetAllowedDomainsRequest($options));
    }
}
