<?php

namespace spkm\FortiNac\Requests\System\NtpSettings;

use spkm\FortiNac\Requests\ListRequest;

/**
 * Gets the servers available for NTP configuration: GET /system/ntp/servers.
 */
class GetNtpSettingsServersRequest extends ListRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/ntp/servers';
    }
}
