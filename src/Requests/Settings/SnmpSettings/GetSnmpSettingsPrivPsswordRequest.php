<?php

namespace spkm\FortiNac\Requests\Settings\SnmpSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured SNMP Private Password: GET /settings/integration/SNMP/priv-pssword.
 */
class GetSnmpSettingsPrivPsswordRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/SNMP/priv-pssword';
    }
}
