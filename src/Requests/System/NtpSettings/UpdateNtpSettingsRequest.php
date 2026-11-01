<?php

namespace spkm\FortiNac\Requests\System\NtpSettings;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets the NTP configuration to use for this appliance: POST /system/ntp.
 *
 * Parameters: timezone, NTPAddr, IPParam.
 */
class UpdateNtpSettingsRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/system/ntp';
    }
}
