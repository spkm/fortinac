<?php

namespace spkm\FortiNac\Requests\Settings\SnmpSettings;

use spkm\FortiNac\Data\Settings\SnmpSettings;
use spkm\FortiNac\Requests\ItemRequest;

/**
 * Returns the currently configured SNMP Settings: GET /settings/integration/SNMP.
 */
class GetSnmpSettingsRequest extends ItemRequest
{
    protected ?string $dto = SnmpSettings::class;

    public function resolveEndpoint(): string
    {
        return '/settings/integration/SNMP';
    }
}
