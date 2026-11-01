<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Data;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\Settings\GoogleSettings\GetGoogleSettingsClientIdRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\GetGoogleSettingsDomainsRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsClientIdRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsByIdRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsDeleteRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsRequest;
use spkm\FortiNac\Requests\Settings\GoogleSettings\PostGoogleSettingsDomainsSetRequest;
use spkm\FortiNac\Resources\BaseResource;

/**
 * Google, from FortiNac::settings()->google().
 *
 * @extends BaseResource<Data>
 */
class GoogleSettingsResource extends BaseResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the list of domains configured to work with Google directory: GET /settings/integration/google/domains.
     */
    public function domains(): mixed
    {
        return $this->fetch(new GetGoogleSettingsDomainsRequest);
    }

    /**
     * Returns the configured Google Client ID, Project Number, and API Key: GET /settings/integration/google/client-id.
     */
    public function clientId(): bool
    {
        return $this->perform(new GetGoogleSettingsClientIdRequest);
    }

    /**
     * Sets the configured Google authentication domains to the list supplied, removing any that are not in that list: POST /settings/integration/google/domains/set.
     *
     * @param  array<string, mixed>  $options  Query options: domainName
     */
    public function domainsSet(array $options = []): bool
    {
        return $this->perform(new PostGoogleSettingsDomainsSetRequest($options));
    }

    /**
     * Sets the Google Client ID, Project Number, and API Key: POST /settings/integration/google/client-id.
     *
     * @param  array<string, mixed>  $options  Query options: clientID, senderID, apiKey
     */
    public function clientId2(array $options = []): bool
    {
        return $this->perform(new PostGoogleSettingsClientIdRequest($options));
    }

    /**
     * Modifies an existing Google authentication domain: POST /settings/integration/google/domains/{id}.
     *
     * @param  array<string, mixed>  $options  Query options: domainName
     */
    public function domainsById(int $id, array $options = []): bool
    {
        return $this->perform(new PostGoogleSettingsDomainsByIdRequest($id, $options));
    }

    /**
     * Deletes one or more Google authentication domains: POST /settings/integration/google/domains/delete.
     *
     * @param  array<string, mixed>  $options  Query options: id
     */
    public function domainsDelete(array $options = []): bool
    {
        return $this->perform(new PostGoogleSettingsDomainsDeleteRequest($options));
    }

    /**
     * Adds a new Google authentication domain: POST /settings/integration/google/domains.
     *
     * @param  array<string, mixed>  $options  Query options: domainName
     */
    public function domains2(array $options = []): bool
    {
        return $this->perform(new PostGoogleSettingsDomainsRequest($options));
    }
}
