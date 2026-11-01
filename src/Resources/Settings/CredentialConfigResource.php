<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\CredentialConfig;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\CredentialConfig\GetCredentialConfigRequest;
use spkm\FortiNac\Requests\Settings\CredentialConfig\UpdateCredentialConfigRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Credential Config, from FortiNac::settings()->credentialConfig().
 *
 * @extends SingletonResource<CredentialConfig>
 */
class CredentialConfigResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, CredentialConfig::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetCredentialConfigRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateCredentialConfigRequest($body, $options);
    }
}
