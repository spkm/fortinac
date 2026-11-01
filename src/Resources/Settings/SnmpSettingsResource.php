<?php

namespace spkm\FortiNac\Resources\Settings;

use spkm\FortiNac\Data\Settings\SnmpSettings;
use spkm\FortiNac\FortiNacConnector;
use spkm\FortiNac\Requests\FortiNacRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\GetSnmpSettingsAuthPsswordRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\GetSnmpSettingsPrivPsswordRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\GetSnmpSettingsRequest;
use spkm\FortiNac\Requests\Settings\SnmpSettings\UpdateSnmpSettingsRequest;
use spkm\FortiNac\Resources\SingletonResource;

/**
 * SNMP, from FortiNac::settings()->snmp().
 *
 * @extends SingletonResource<SnmpSettings>
 */
class SnmpSettingsResource extends SingletonResource
{
    public function __construct(FortiNacConnector $connector)
    {
        parent::__construct($connector, SnmpSettings::class);
    }

    protected function getRequest(array $options): FortiNacRequest
    {
        return new GetSnmpSettingsRequest;
    }

    protected function updateRequest(array $body, array $options): FortiNacRequest
    {
        return new UpdateSnmpSettingsRequest([...$body, ...$options]);
    }

    /**
     * Returns the currently configured SNMP Authorization Password: GET /settings/integration/SNMP/auth-pssword.
     */
    public function authPssword(): mixed
    {
        return $this->fetch(new GetSnmpSettingsAuthPsswordRequest);
    }

    /**
     * Returns the currently configured SNMP Private Password: GET /settings/integration/SNMP/priv-pssword.
     */
    public function privPssword(): mixed
    {
        return $this->fetch(new GetSnmpSettingsPrivPsswordRequest);
    }
}
