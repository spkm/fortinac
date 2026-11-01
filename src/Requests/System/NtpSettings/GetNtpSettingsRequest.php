<?php

namespace spkm\FortiNac\Requests\System\NtpSettings;

use spkm\FortiNac\Requests\ItemRequest;

/**
 * Gets the NTP configuration to use for this appliance: GET /system/ntp.
 *
 * Parameters: ip.
 */
class GetNtpSettingsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options: ip
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/system/ntp';
    }
}
