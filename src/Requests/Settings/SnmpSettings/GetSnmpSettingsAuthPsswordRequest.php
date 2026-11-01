<?php

namespace spkm\FortiNac\Requests\Settings\SnmpSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured SNMP Authorization Password: GET /settings/integration/SNMP/auth-pssword.
 */
class GetSnmpSettingsAuthPsswordRequest extends ItemRequest
{
    protected string $responseShape = self::RAW;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/SNMP/auth-pssword';
    }
}
