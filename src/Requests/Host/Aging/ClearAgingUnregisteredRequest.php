<?php

namespace spkm\FortiNac\Requests\Host\Aging;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Clear Aging values for all unregistered(rogue) hosts: POST /host/aging/clear-unregistered.
 */
class ClearAgingUnregisteredRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/aging/clear-unregistered';
    }
}
