<?php

namespace spkm\FortiNac\Resources\Portal;

use spkm\FortiNac\Data\Portal\PortalSslSettings;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Portal\PortalSslSettings\GetPortalSslSettingsRequest;
use spkm\FortiNac\Requests\Portal\PortalSslSettings\UpdatePortalSslSettingsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * Portal Settings, from FortiNac::portalSettings().
 *
 * @extends SingletonResource<PortalSslSettings>
 */
class PortalSslSettingsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, PortalSslSettings::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetPortalSslSettingsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdatePortalSslSettingsRequest($body, $options);
    }
}
