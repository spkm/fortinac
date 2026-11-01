<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\ProxySettings;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\ProxySettings\GetProxySettingsRequest;
use spkm\FortiNac\Requests\Settings\ProxySettings\UpdateProxySettingsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Proxy, from FortiNac::settings()->proxy().
 *
 * @extends SingletonResource<ProxySettings>
 */
class ProxySettingsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, ProxySettings::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetProxySettingsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateProxySettingsRequest([...$body, ...$options]);
    }
}
