<?php

namespace spkm\FortiNac\Requests\Host\DeviceIdentity;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Confirms a rule in Profiled Devices view: POST /host/device-identity/confirm-rule.
 *
 * Parameters: id.
 */
class ConfirmDeviceIdentityRuleRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/device-identity/confirm-rule';
    }
}
