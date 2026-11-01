<?php

namespace spkm\FortiNac\Requests\Host\Aging;

use spkm\FortiNac\Requests\ActionRequest;

/**
 * Clear Aging values for all registered and guest hosts: POST /host/aging/clear-registered.
 */
class ClearAgingRegisteredRequest extends ActionRequest
{
    public function resolveEndpoint(): string
    {
        return '/host/aging/clear-registered';
    }
}
