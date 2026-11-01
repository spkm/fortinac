<?php

namespace spkm\FortiNac\Requests\Settings\Quarantine;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Sets all the hosts from Risk State to Safe: POST /settings/device/quarantine/mark-all-hosts-safe.
 */
class MarkQuarantineAllHostsSafeRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/settings/device/quarantine/mark-all-hosts-safe';
    }
}
