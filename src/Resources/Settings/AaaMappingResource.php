<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\Data\Settings\AaaMappingSwapAaaMapping;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Settings\AaaMapping\CreateAaaMappingRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\DeleteManyAaaMappingsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\GetAaaMappingDefaultsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\GetAaaMappingLocalDomainsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\GetAaaMappingRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\PostAaaMappingDefaultsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\PostAaaMappingLocalDomainsDeleteRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\PostAaaMappingLocalDomainsRequest;
use spkm\FortiNac\Requests\Settings\AaaMapping\SwapAaaMappingRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * AAA Server, from FortiNac::settings()->aaaMappings().
 *
 * @extends BaseResource<Data>
 */
class AaaMappingResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns all RADIUS Domain Mappings: GET /settings/integration/aaa-mappings.
     */
    public function get(): mixed
    {
        return $this->fetch(new GetAaaMappingRequest);
    }

    /**
     * Returns the set of domains configured for roaming guests: GET /settings/integration/aaa-mappings/local-domains.
     */
    public function localDomains(): mixed
    {
        return $this->fetch(new GetAaaMappingLocalDomainsRequest);
    }

    /**
     * Deletes one or more domains from the list of local domains: POST /settings/integration/aaa-mappings/local-domains/delete.
     *
     * @param  array<string, mixed>  $options  Query options: domain
     */
    public function localDomainsDelete(array $options = []): bool
    {
        return $this->perform(new PostAaaMappingLocalDomainsDeleteRequest($options));
    }

    /**
     * Returns the default RADIUS servers, primary and secondary, to use if there are no mappings: GET /settings/integration/aaa-mappings/defaults.
     */
    public function defaults(): mixed
    {
        return $this->fetch(new GetAaaMappingDefaultsRequest);
    }

    /**
     * Adds a new local domain for roaming guests: POST /settings/integration/aaa-mappings/local-domains.
     *
     * @param  array<string, mixed>  $options
     */
    public function localDomains2(array $options = []): bool
    {
        return $this->perform(new PostAaaMappingLocalDomainsRequest($options));
    }

    /**
     * Adds a new RADIUS Domain Mapping: POST /settings/integration/aaa-mappings.
     *
     * @param  array<string, mixed>  $options  Query options: radiusServer, domainName
     */
    public function create(array $options = []): bool
    {
        return $this->perform(new CreateAaaMappingRequest($options));
    }

    /**
     * Saves the Primary and Secondary RADIUS servers to use as defaults: POST /settings/integration/aaa-mappings/defaults.
     *
     * @param  array<string, mixed>  $options  Query options: pimaryRadiusServer, secondaryRadiusServer, radiusProxyAuthEnabled, radiusProxyAcctEnabled, radiusProxyAuthPort, radiusProxyAcctPort
     */
    public function defaults2(array $options = []): bool
    {
        return $this->perform(new PostAaaMappingDefaultsRequest($options));
    }

    /**
     * Deletes one or more RADIUS Domain Mappings: POST /settings/integration/aaa-mappings/delete.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteMany(array|Data $attributes = [], array $options = []): bool
    {
        return $this->perform(new DeleteManyAaaMappingsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Swaps the priority of two RADIUS Domain Mappings: POST /settings/integration/aaa-mappings/swap.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function swap(array|Data $attributes = [], array $options = []): ?AaaMappingSwapAaaMapping
    {
        return $this->fetch(new SwapAaaMappingRequest($this->payloadOf($attributes), $options));
    }
}
