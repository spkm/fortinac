<?php

namespace spkm\FortiNac\Requests\Settings\SnmpSettings;

use spkm\FortiNac\Data\Settings\SnmpSettings;
use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the snmp settings: POST /settings/integration/SNMP.
 *
 * Parameters: snmpProto, authProto, username, security, authPasswd, privPasswd, privProto, hostsArray, snmpProtocol, authProtocol, authPassword, privPassword, privProtocol, mgmtHosts, Request Body.
 */
class UpdateSnmpSettingsRequest extends ActionRequest
{
    protected ?string $dto = SnmpSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/SNMP';
    }
}
